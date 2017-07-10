<?php
/**
 * SageOne Library
 *
 * Official Method Documentation:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=CurrencyResponse
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

class Currency extends BaseModel
{
    /**
     * The ID of the currency
     *
     * @var int $id
     */
    protected $id;

    /**
     * @var string $code
     */
    protected $code;

    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var string $symbol
     */
    protected $symbol;

    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Currency';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'code' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'symbol' => [
            'type' => 'string',
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
        'save' => false,
        'delete' => false,
    ];
}
