<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Account Note Model
 *
 * Details on writable properties for Account Note:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AccountNote
 */
class AccountNote extends BaseModel
{
    /**
     * @var string $endpoint
     */
    protected $endpoint = 'AccountNote';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'optional' => true,
        ],
        'accountId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'optional' => true,
        ],
        'userId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
            'optional' => true,
        ],
        'subject' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'entryDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
            'optional' => true,
        ],
        'actionDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'status' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
            'optional' => true,
        ],
        'note' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'optional' => true,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
            'optional' => true,
        ]
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
