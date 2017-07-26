<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Vitaliy Likhachev <make.it.git@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Customer Model
 *
 * Details on writable properties for Customer:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Customer
 */
class Customer extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Customer';

    /**
     * @var array $fields
     */
    protected $fields = [
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'category' => [
            'type' => 'CustomerCategory',
            'nullable' => false,
            'readonly' => false,
        ],
        'salesRepresentativeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'salesRepresentative' => [
            'type' => 'SalesRepresentative',
            'nullable' => true,
            'readonly' => false,
        ],
        'taxReference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'contactName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'telephone' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'fax' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'mobile' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'email' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'validate' => FILTER_VALIDATE_EMAIL,
        ],
        'webAddress' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'active' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'balance' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'creditLimit' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'communicationMethod' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
            'min' => 0,
            'max' => 3,
        ],
        'postalAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'deliveryAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'deliveryAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'deliveryAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'deliveryAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'deliveryAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'autoAllocateToOldestInvoice' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'enableCustomerZone' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'customerZoneGuid' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'cashSale' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'textField1' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'textField2' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'textField3' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'numericField1' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'numericField2' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'numericField3' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'yesNoField1' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'yesNoField2' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'yesNoField3' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'dateField1' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'dateField2' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'dateField3' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'defaultPriceListId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'defaultPriceList' => [
            'type' => 'AdditionalPriceList',
            'nullable' => false,
            'readonly' => false,
        ],
        'defaultPriceListName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'acceptsElectronicInvoices' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => true,
        ],
        'businessRegistrationNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxStatusVerified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'currencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'currencySymbol' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'hasActivity' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'defaultDiscountPercentage' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'defaultTaxTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'defaultTaxType' => [
            'type' => 'TaxType',
            'nullable' => false,
            'readonly' => false,
        ],
        'dueDateMethodId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
            'min' => 0,
            'max' => 4
        ],
        'dueDateMethodValue' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
    ];

    /**
     * @var array $features
     * TODO https://accounting.sageone.co.za/api/1.1.2/Help/Api/GET-Customer-Get_includeSalesRepDetails
     * all() supports query parameter includeSalesRepDetails which is false by default
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true
    ];
}
