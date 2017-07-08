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
    public $id;

    /**
     * @var string $code
     */
    public $code;

    /**
     * @var string $description
     */
    public $description;

    /**
     * @var string $symbol
     */
    public $symbol;

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
            'persistable' => true,
        ],
        'code' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'symbol' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
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
