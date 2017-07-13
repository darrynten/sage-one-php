<?php
/**
 * SageOne Library
 *
 * Official Method Documentation:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=ExampleCategory
 *
 * @category Library
 * @package  SageOne
 * @author   Vitaliy Likachev <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Example Category Model
 *
 * Details on writable properties for Example Category:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=ExampleCategory
 */
class ExampleCategory extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'ExampleCategory';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];
}
