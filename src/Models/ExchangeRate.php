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
 * Exchange Rate model
 */
class ExchangeRate extends BaseModel
{
    /**
     * @var string $endpoint
     */
    protected $endpoint = 'ExchangeRate';

    /**
     * @var array $fields
     */
    protected $fields = [
        'isBaseCurrency' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'baseCurrencyCode' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'currencyCode' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'currencyDescription' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'currencySymbol' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'hasActivity' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'isFutureRate' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'rateInverse' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'originalRateInverse' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'groupId' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'rateDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => true,
        ],
        'exchangeRateId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'currencyId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'rate' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'originalRate' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'hasManualRate' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'note' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];
}
