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
 * CustomerNote Model
 *
 * Details on writable properties for CustomerNote:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=CustomerNote
 */
class CustomerNote extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'CustomerNote';

    /**
     * @var array $fields
     */
    protected $fields = [
        'customerId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'customerName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'notePriority' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'noteType' => [
            'type' => 'integer',
            'nullable' => true,
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
            'nullable' =>  true,
            'readonly' => false,
        ],
        'note' => [
            'type' => 'string',
            'nullable' =>  false,
            'readonly' => false,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
            'nullable' =>  true,
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
        'delete' => true
    ];
}
