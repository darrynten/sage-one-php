<?php
/**
 * SageOne Library
 * @category Library
 * @package  SageOne
 * @author   Ihor Sergiichuk <igorsergiichuk@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;
use DarrynTen\SageOne\Models\ModelCollection;

/**
 * Supplier Model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_Supplier
 */
class Supplier extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Supplier';

    /**
     * Defines all possible fields.
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'category' => [
            'type' => 'SupplierCategory',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxReference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'contactName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'telephone' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'fax' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'mobile' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'email' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'webAddress' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
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
        'postalAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'deliveryAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'deliveryAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'deliveryAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'deliveryAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'deliveryAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'autoAllocateToOldestInvoice' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'textField1' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'textField2' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'textField3' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
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
        'RMCDApprovalNumber' => [
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
        ],
        'dueDateMethodValue' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
    ];

    /**
     * Features supported by the endpoind
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];
}
