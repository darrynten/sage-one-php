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
 * AssetCategory Model
 *
 * Details on writable properties for AssetCategory:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AssetCategory
 */
class AssetLocation extends BaseModel{
	/**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AssetLocation';

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
