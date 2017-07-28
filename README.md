# sage-one-php

![Travis Build Status](https://travis-ci.org/darrynten/sage-one-php.svg?branch=dev)
![StyleCI Status](https://styleci.io/repos/95722049/shield?branch=dev)
[![codecov](https://codecov.io/gh/darrynten/sage-one-php/branch/dev/graph/badge.svg)](https://codecov.io/gh/darrynten/sage-one-php)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/c7241610533c472e950b4fb4385b712c)](https://www.codacy.com/app/darrynten/sage-one-php?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=darrynten/sage-one-php&amp;utm_campaign=Badge_Grade)
[![Code Climate](https://codeclimate.com/github/darrynten/sage-one-php/badges/gpa.svg)](https://codeclimate.com/github/darrynten/sage-one-php)
[![Issue Count](https://codeclimate.com/github/darrynten/sage-one-php/badges/issue_count.svg)](https://codeclimate.com/github/darrynten/sage-one-php)
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

Some models' methods are unimplemented as they were inconsistent with other similar models, these methods will throw a LibraryException with the location of the method stub.

If you require these methods, please add them with updated tests.

### Definitions

# TODO

## Features

This is the basic outline of the project and is a work in progress.

Checkboxes have been placed at each section, please check them off
in this readme when submitting a pull request for the features you
have covered.

### Basic ORM-style mapping

Related models are auto-loaded and are all queryable, mutable, and persistable where possible.

I'm sure there will be a recursion issue because of this at some point!

Some examples

```php
$account = new Account($config);

// get
$account->all(); // fetches ALL
$account->get($id); // fetches that ID

// If model supports some query parameters, we can pass it
$company = new Company($config);
$company->all(['includeStatus' => true]);
// Currently get() does not support any query parameters but this might be required in future

// related models
echo $account->category->id;

// dates
echo $account->defaultTaxType->modified->format('Y-m-d');

// assign
$account->name = 'New Name';

// save, delete
$account->save(); // incomplete
$account->category->save(); // saving a child does not save the parent and vice-versa
$account->delete();
```

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

# NB the project is evolving quickly

## This might be outdated

### If it is and you fix it please update this document

#### The best place to look is the example model

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

    // The name of the endpoint (same as filename), protected
    protected $endpoint = 'Account';

    /**
     * Field definitions
     * 
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's readonly, or default, required, min, max, or regex
     *
     * - nullable is `true` if the word 'nullable' is in the 'type' column
     * - readonly is `true` if the word 'Read-Only/System Generated' is in the Additional Info column otherwise it is `false`
     * - Type has the following rules
     *   - `date` becomes "DateTime"
     *   - `nullable` is removed, i.e. "nullable integer" is only "integer"
     *   - Multiword linked terms are concatenated, eg:
     *     - "Account Category" becomes "AccountCategory"
     *     - "Tax Type" becomes "TaxType"
     *   - `min` / `max` always come together
     *   - `default` is when it's indicated in the docs
     *   - `regex` is generally used with email address fields
     *   - `enum` is for enumerated lists
     *   - `optional` is true when this field can be omitted in SageOne response
     *     - Example is Company's model all() method
     *       By default when we execute all() it is the same as all(['includeStatus' = false])
     *       So `status` field is not returned in response
     *
     * Details on writable properties for Account:
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'enum' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
            // $enumList would need to be a property of this model
            'enum' => 'enumList',
        ],
        'category' => [
            'type' => 'AccountCategory',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'reportingGroupId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
            'regex' => '/someregex/',
        ],
        'isTaxLocked' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'status' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
            'optional' => true,
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

    /**
     * Features HTTP methods
     * Not all models follow same conventions like GET for all()
     * Example AccountBalance all() requires POST method
     * or SupplierStatement get() requires POST method
     * @var array $featureMethods
     */
    protected $featureMethods = [
        'all' => 'GET',
        'get' => 'GET',
        'save' => 'POST',
        'delete' => 'DELETE'
    ];

    /**
     * Specifies what get() returns
     * 'this' means current class
     * any other type must exist under src/Models/
     * 'collection' is true when get() returns collection (very rare case, but SageOne's API works this way)
     * @var array $featureGetReturns
     */
    protected $featureGetReturns = [
        'type' => 'this',
        'collection' => false
    ];

    // Construct (if you need to modify construction)
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

There is *also* an example test (ExampleModelTest.php) and an example mock
folder to help you get going quickly.

A lot of the heavy testing is handled by the BaseModelTest class, and you
can look into the Example test for insight into the convention. It makes
testing and getting good defensive coverage quite trivial for most things.

# NB initial delivery consists of only these models:

Models marked with an asterix are pure CRUD models

- [x] Base
- [x] Exception Handling
- [x] CRUD
- [ ] Save Call
- [ ] Real CRUD Response Mocks
- [ ] Pagination
- [ ] Rate Limiting
- [ ] Models
  - [x] Account
    - [x] Account Balance
    - [x] Account Category *
    - [x] Account Note *
    - [x] Accountant Task Recurrence *
    - [x] Account Note Attachment
    - [x] Account Opening Balance *
    - [x] Account Payment *
    - [x] Account Receipt *
  - [x] Additional Item Price *
  - [x] Analysis Category
  - [x] Analysis Type
  - [x] Asset Note *
  - [x] Company
    - [x] Company Entity Type *
    - [x] Company Note
  - [x] Currency *
  - [x] Exchange Rates
  - [x] Supplier *
    - [x] Supplier Additional Contact Detail
    - [x] Supplier Adjustment
    - [x] Supplier Ageing
    - [x] Supplier Bank Detail *
    - [x] Supplier Category *
    - [ ] Supplier Invoice
    - [ ] Supplier Invoice Attachment
    - [x] Supplier Note *
    - [ ] Supplier Note Attachment
    - [x] Supplier Opening Balance *
    - [ ] Supplier Payment
    - [x] Supplier Purchase History
    - [ ] Supplier Return
    - [ ] Supplier Return Attachment
    - [x] Supplier Statement *
    - [ ] Supplier Transaction Listing
  - [x] Tax Type *

And any related models not listed, so if ExampleModel has a reference to ExampleCategory but that is not on the list above it too must get processed

# ==== END OF INITIAL DELIVERY ====

## Deliverables

* 100% Test Coverage
* Full, extensive, verbose, and defensive unit tests
* Mocks if there are none for the model in the `tests/mocks` directory (convention
can be inferred from the existing names in the folders)

### Future Planned Roadmap, as and when needed

Please feel free to open PRs for any of the following :)

- [ ] Accountant Event
- [ ] Accountant Note
- [ ] Accountant Task
- [ ] Accountant Task Recurrence
- [x] Additional Price List
- [ ] Allocation
- [x] Asset
- [x] Asset Category
- [x] Asset Location
- [ ] Attachment
- [ ] Bank Account
- [ ] Bank Account Category
- [ ] Bank Account Note
- [ ] Bank Account Note Attachment
- [x] Bank Account Opening Balance
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
- [x] Currency
- [x] Customer
- [ ] Customer Additional Contact Detail
- [ ] Customer Adjustment
- [ ] Customer Ageing
- [x] Customer Category
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
- [x] Date Format
- [ ] Detailed Ledger Transaction
- [ ] Developer Data
- [ ] Document File Attachment
- [ ] Document Header Note
- [ ] Document History
- [ ] Document Message
- [ ] Document User Defined Fields
- [ ] Email Signature Template
- [x] Email Template Place Holder
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
- [x] Sales Representative
- [ ] Sales Representative Note
- [ ] Schedule Frequency
- [ ] Secretarial Company Role
- [ ] Secretarial Share Class
- [ ] Secretarial Shareholder
- [ ] Secretarial Stake Holder
- [ ] Support Login Audit
- [ ] Take On Balance
- [x] Tax Invoice
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
* [Vitaliy Likhachev](https://github.com/make-it-git)
* [Igor Sergiichuk](https://github.com/igorsergiichuk)
* [Fergus Strangways-Dixon](https://github.com/fergusdixon)
* [Brian Maiyo](https://github.com/kiproping)
