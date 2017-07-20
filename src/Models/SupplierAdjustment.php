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

/**
 * Supplier Model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_SupplierAdjustment
 */
class SupplierAdjustment extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierAdjustment';
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
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'supplierId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'reference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'exclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'tax' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'total' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'contraAccountId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'memo' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'supplier' => [
            'type' => 'Supplier',
            'nullable' => false,
            'readonly' => false,
        ],
        'accountName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'analysisCategoryId1' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryId2' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryId3' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'account' => [
            'type' => 'Account',
            'nullable' => false,
            'readonly' => true,
        ],
        'locked' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'taxPeriodId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => true,
        ],
        'totalOutstanding' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'inclusive' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'supplier_CurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'supplier_ExchangeRate' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ]
    ];

    /**
     * Calculates the specified Tax Invoice total fields.
     *
     * @return stdClass
     */
    public function calculate()
    {
        return $this->request->request(
            'POST',
            $this->endpoint,
            'Calculate',
            $this->toArray()
        );
    }

    /**
     * Features supported by the endpoint
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => false,
    ];
}
