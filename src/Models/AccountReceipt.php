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
 * Account Receipt Model
 *
 * Details on writable properties for Account Receipt:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AccountReceipt
 */
class AccountReceipt extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AccountReceipt';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'accountId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'payee' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 8000
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'reference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'comments' => [
            'type' => 'string',
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
        'reconciled' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankAccountId' => [
            'type' => 'integer',
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
        'parentId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false
        ],
        'accepted' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankUniqueIdentifier' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'importTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankImportMappingId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankAccount_CurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankAccount_ExchangeRate' => [
            'type' => 'double',
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
        ]
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => false,
        'save' => true,
        'delete' => false
    ];
}
