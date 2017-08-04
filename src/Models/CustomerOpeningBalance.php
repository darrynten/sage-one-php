<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Igor Sergiichuk <igorsergiichuk@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Customer Opening Balance Model
 *
 * Details on writable properties for Customer Opening Balance:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=CustomerOpeningBalance
 */
class CustomerOpeningBalance extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'CustomerOpeningBalance';

    /**
     * @var array $fields
     */
    protected $fields = [
        'customerId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'customer_CurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'customer_ExchangeRate' => [
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
