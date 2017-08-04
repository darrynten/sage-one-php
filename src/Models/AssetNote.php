<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Igor Sergiichuk <igorsergiichuk@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * AssetNote Model
 *
 * Details on writable properties for AssetNote:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AssetNote
 */
class AssetNote extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AssetNote';

    /**
     * @var array $fields
     */
    protected $fields = [
        'assetId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'subject' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
            'min' => 0,
            'max' => 100,
        ],
        'entryDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'actionDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'status' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'note' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
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
