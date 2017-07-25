<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   VIgor Sergiichuk <igorsergiichuk@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Bank Account Opening Balance model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=ABankAccountOpeningBalance
 */
class BankAccountOpeningBalance extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'BankAccountOpeningBalance';

    /**
     * @var array $fields
     */
    protected $fields = [
        'bankAccountId' => [
            'type' => 'integer',
            'nullable' => false,
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
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'balance' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'reason' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
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
        'delete' => false,
    ];
}
