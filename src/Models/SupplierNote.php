<?php
/**
 * SageOne Library
 *
 * Official Method Documentation:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierNote
 *
 * @category Library
 * @package  SageOne
 * @author   Fergus Strangways-Dixon <fergusdixon@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */
namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

class SupplierNote extends BaseModel
{
    /*
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierNote';

    /**
    * @var array $fields
    */
    protected $fields = [
        'supplierId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'userId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'priority' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'noteCategoryId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'notifyAssignee' => [
            'type' => 'boolean',
            'nullable' => true,
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
            'min' => 0,
            'max' => 100,
            'required' => true,
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
