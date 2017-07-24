<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Fergus Strangways-Dixon <fergusdixon@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Asset Model
 *
 * Details on writable properties for Asset:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Asset
 */
class Asset extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Asset';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 500,
        ],
        'category' => [
            'type' => 'AssetCategory',
            'nullable' => false,
            'readonly' => false,
        ],
        'location' => [
            'type' => 'AssetLocation',
            'nullable' => false,
            'readonly' => false,
        ],
        'datePurchased' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'serialNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'boughtFrom' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'purchasePrice' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'currentValue' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'replacementValue' => [
            'type' => 'double',
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
