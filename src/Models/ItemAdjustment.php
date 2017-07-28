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
 * ItemAdjustment Model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_ItemAdjustment
 */
class ItemAdjustment extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'ItemAdjustment';

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
        ],
        'itemId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'averageCost' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'quantity' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'reason' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
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
