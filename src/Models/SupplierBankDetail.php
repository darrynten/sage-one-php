<?php
/**
 * SageOne Library
 *
 * Official Method Documentation:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierBankDetail
 *
 * @category Library
 * @package  SageOne
 * @author   Fergus Strangways-Dixon <fergusdixon@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */
namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

class SupplierBankDetail extends BaseModel
{
    /*
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierBankDetail';

    /**
    * @var array $fields
    */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'supplierId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankAccountHolder' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankAccountNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankBranchCode' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankAccountType' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];
}
