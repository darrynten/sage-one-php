# sage-one-php

![Travis Build Status](https://travis-ci.org/darrynten/sage-one-php.svg?branch=master)
![StyleCI Status](https://styleci.io/repos/x/shield?branch=master)
[![codecov](https://codecov.io/gh/darrynten/sage-one-php/branch/master/graph/badge.svg)](https://codecov.io/gh/darrynten/sage-one-php)
![Packagist Version](https://img.shields.io/packagist/v/darrynten/sage-one-php.svg)
![MIT License](https://img.shields.io/github/license/darrynten/sage-one-php.svg)

[SageOne API](https://accounting.sageone.co.za/api/1.1.2/Help) client for PHP

This is a 100% fully unit tested and (mostly) fully featured unofficial PHP
client for SageOne

> "Simple Online Accounting & Payroll software"

```bash
composer require darrynten/sage-one-php
```

PHP 7.0+

## Basic use

# TODO

### Definitions

# TODO

## Features

This is the basic outline of the project and is a work in progress.

Checkboxes have been placed at each section, please check them off
in this readme when submitting a pull request for the features you
have covered.

### Application base

* Guzzle is used for the communications (I think we should replace?)
* The library has 100% test coverage
* The library supports framework-agnostic caching so you don't have to
worry about which framework your package that uses this package is going
to end up in.

The client is not 100% complete and is a work in progress, details below.

## Documentation

There are over 100 API endpoints, initial focus is only on a handful of these

This will eventually fully mimic the documentation available on the site.
https://accounting.sageone.co.za/api/1.1.2

Each section must have a short explaination and some example code like on
the API docs page.

Checked off bits are complete.

# Note

The API calls are mostly _very_ generic, so there is a base model in place that
all other models extend off, which covers the following functionalities:

- GET Model/Get
- GET Model/Get/{id}
- DELETE Model/Delete/{id}
- POST Model/Save ** Incomplete **

This means that it's trivial to add new models that only use these calls (or a
combination of any of them) as there is a very simple 'recipe' to constructing
a basic model.

As such we only need to focus on the tricky bits.

### Basic model template

[Account Example Docs](https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account)

There's a table at that link that looks something like this

```
Name             | Type             | Additional Information
-------------------------------------------------------------------
Name             | string           | None.
Category         | AccountCategory  | None.
Balance          | decimal          | Read Only / System Generated
ReportingGroupId | nullable integer | None.
```

We'll be using that for this example (docblocks excluded from example but are
required)

```php
/**
 * The name of the class is the `modelName=` value from the URL
 */
class Account extends BaseModel
{
    /**
     * Properties from the table, public
     *
     * We lowercase the first letter but leave the rest
     */
    public $id;
    public $name;
    public $reportingGroupId;

    // If something is read only we mark it in the docblock:
    /**
     * Balance
     *
     * READ ONLY
     *
     * @var double $balance
     */
    public $balance;

    // rest of properties...

    // The name of the endpoint (same as filename), protected
    protected $endpoint = 'Account';

    /**
     * Field definitions
     * 
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's persistable.
     *
     * - Nullable is `true` if the word 'nullable' is in the 'type' column
     * - Persistable is `true` if the word 'None.' is in the Additional Info column.
     * - Type has the following rules
     *   - `date` becomes "DateTime"
     *   - `nullable` is removed, i.e. "nullable integer" is only "integer"
     *   - Multiword linked terms are concatenated, eg:
     *     - "Account Category" becomes "AccountCategory"
     *     - "Tax Type" becomes "TaxType"
     *
     * Details on writable properties for Account:
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'persistable' => true,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'category' => [
            'type' => 'AccountCategory',
            'nullable' => false,
            'persistable' => true,
        ],
        'reportingGroupId' => [
            'type' => 'integer',
            'nullable' => true,
            'persistable' => true,
        ],
        'isTaxLocked' => [
            'type' => 'boolean',
            'nullable' => false,
            'persistable' => false,
        ],
        // etc etc etc
    ];

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable the CRUD calls based on what is
     * supported by the SageOne API
     *
     * Most models use at least one of these features, with a fair amount
     * using all the functionality.
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];

    // Construct
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    // Add methods for non-standard calls, like:
    // GET Account/GetAccountsByCategoryId/{id}
    public function getAccountsByCategoryId($id)
    {
        // etc ...
    }
}
```

Following that template will very quickly create models for the project.

# NB initial delivery consists of only these models:

Models marked with an asterix are pure CRUD models

- [x] Base
- [x] Exception Handling
- [x] CRUD
- [ ] Pagination
- [ ] Models
  - [x] Account
    - [ ] Account Balance
    - [x] Account Category *
    - [ ] Account Note *
    - [ ] Account Note Attachment
    - [ ] Account Opening Balance *
    - [ ] Account Payment *
    - [ ] Account Receipt *
  - [ ] Analysis Category
  - [ ] Analysis Type
  - [ ] Company
    - [ ] Company Entity Type *
    - [ ] Company Note
  - [ ] Currency *
  - [ ] Exchange Rates
  - [ ] Supplier *
    - [ ] Supplier Additional Contact Detail
    - [ ] Supplier Adjustment
    - [ ] Supplier Ageing
    - [ ] Supplier Bank Detail *
    - [ ] Supplier Category *
    - [ ] Supplier Invoice
    - [ ] Supplier Invoice Attachment
    - [ ] Supplier Note *
    - [ ] Supplier Note Attachment
    - [ ] Supplier Opening Balance *
    - [ ] Supplier Payment
    - [ ] Supplier Purchase History
    - [ ] Supplier Return
    - [ ] Supplier Return Attachment
    - [ ] Supplier Statement *
    - [ ] Supplier Transaction Listing
  - [x] Tax Type *

# ==== END OF INITIAL DELIVERY ====

## Deliverables

* Full, extensive, verbose, and defensive unit tests
* Mocks if there are none for the model in the `tests/mocks` directory (convention
can be inferred from the existing names in the folders)

### Future Planned Roadmap, as and when needed

Please feel free to open PRs for any of the following :)

- [ ] Accountant Event
- [ ] Accountant Note
- [ ] Accountant Task
- [ ] Accountant Task Recurrence
- [ ] Additional Item Price
- [ ] Additional Price List
- [ ] Allocation
- [ ] Asset
- [ ] Asset Category
- [ ] Asset Location
- [ ] Asset Note
- [ ] Attachment
- [ ] Bank Account
- [ ] Bank Account Category
- [ ] Bank Account Note
- [ ] Bank Account Note Attachment
- [ ] Bank Account Opening Balance
- [ ] Bank Account Transaction Listing
- [ ] Bank Import Mapping
- [ ] Bank Statement Transaction
- [ ] Bank Transaction
- [ ] Bank Transaction Attachment
- [ ] BAS Report
- [ ] Budget
- [ ] Cash Movement
- [ ] Core Events
- [ ] Core Tokens
- [ ] CRM Activity
- [ ] CRM Activity Category
- [ ] Currency
- [ ] Customer
- [ ] Customer Additional Contact Detail
- [ ] Customer Adjustment
- [ ] Customer Ageing
- [ ] Customer Category
- [ ] Customer Note
- [ ] Customer Note Attachment
- [ ] Customer Opening Balance
- [ ] Customer Receipt
- [ ] Customer Return
- [ ] Customer Return Attachment
- [ ] Customer Sales History
- [ ] Customer Statement
- [ ] Customer Transaction Listing
- [ ] Customer Write Off
- [ ] Customer Zone
- [ ] Date Format
- [ ] Detailed Ledger Transaction
- [ ] Developer Data
- [ ] Document File Attachment
- [ ] Document Header Note
- [ ] Document History
- [ ] Document Message
- [ ] Document User Defined Fields
- [ ] Email Signature Template
- [ ] Email Template Place Holder
- [ ] Final Accounts
- [ ] Financial Year
- [ ] Income Vs Expense
- [ ] Item
- [ ] Item Adjustment
- [ ] Item Attachment
- [ ] Item Category
- [ ] Item Movement
- [ ] Item Note
- [ ] Item Note Attachment
- [ ] Item Opening Balance
- [ ] Item Report Group
- [ ] Journal Entry
- [ ] Localization
- [ ] Login
- [ ] Outstanding Customer Document
- [ ] Outstanding Supplier Document
- [ ] Price Listing Report
- [ ] Process Bank And Credit Card Mapping
- [ ] Purchase Order
- [ ] Purchase Order Attachment
- [ ] Purchases By Item
- [ ] Quote
- [ ] Quote Attachment
- [ ] Recurring Invoice
- [ ] Reporting Group
- [ ] Sales By Item
- [ ] Sales By Sales Representative
- [ ] Sales Representative
- [ ] Sales Representative Note
- [ ] Schedule Frequency
- [ ] Secretarial Company Role
- [ ] Secretarial Share Class
- [ ] Secretarial Shareholder
- [ ] Secretarial Stake Holder
- [ ] Support Login Audit
- [ ] Take On Balance
- [ ] Tax Invoice
- [ ] Tax Invoice Attachment
- [ ] Tax Period
- [ ] Time Tracking Customer
- [ ] Time Tracking Expense
- [ ] Time Tracking Project
- [ ] Time Tracking Task
- [ ] Time Tracking Timesheet
- [ ] Time Tracking User
- [ ] To Do List
- [ ] Top Customers By Outstanding Balance
- [ ] Top Customers By Sales
- [ ] Top Purchased Items
- [ ] Top Selling Items
- [ ] Top Selling Items By Value On Hand
- [ ] Top Suppliers By Outstanding Balance
- [ ] Top Suppliers By Purchases
- [ ] Trial Balance
- [ ] Trial Balance Export Mapping
- [ ] User Defined Field
- [ ] VAT201 Report

## Caching

### Request Limits

All Sage One companies have a request limit of 5000 API requests per day. A maximum of 100 results will be returned for list methods, regardless of the parameter sent through.

[Details](https://www.sageone.co.za/request-limit-faq/)

Because of this some of them can
benefit from being cached. All caching should be off by default and only
used if explicity set.

No caching has been implemented yet but support is in place

### Details

These run through the `darrynten/any-cache` package, and no extra config
is needed. Please ensure that any features that include caching have it
be optional and initially set to `false` to avoid unexpected behaviour.

### Rate Limiting and Queueing

# TODO

## Contributing and Testing

There is currently 100% test coverage in the project, please ensure that
when contributing you update the tests. For more info see CONTRIBUTING.md

We would love help getting decent documentation going, please get in touch
if you have any ideas.

## Additional Documentation

* [SageOne Developer Zone](https://www.sageone.co.za/developer-zone/)
* [SageOne API Overview](https://www.sageone.co.za/api-overview/)
* [SageOne API Samples](https://www.sageone.co.za/api-samples/)

## Acknowledgements

* [Dmitry Semenov](https://github.com/mxnr)
* [Karolin Gaedeke](https://github.com/KaroZA)
