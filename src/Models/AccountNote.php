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
     * The ID of the account note
     *
     * @var int $id
     */
    protected $id;

    /**
     * User id of the account note
     *
     * Nullable
     *
     * @var int $userId
     */
    protected $userId = null;

    /**
     * Account id of the account note
     *
     * @var int $accountId
     */
    protected $accountId;

    /**
     * Subject
     *
     * @var string $subject
     */
    protected $subject;

    /**
     * Entry date
     *
     * Nullable
     *
     * @var DateTime $entryDate
     */
    protected $entryDate = null;

    /**
     * Action date
     *
     * @var DateTime $actionDate
     */
    protected $actionDate;

    /**
     * Status
     *
     * Nullable
     *
     * @var bool $status
     */
    protected $status = null;

    /**
     * Note
     *
     * @var string $note
     */
    protected $note;

    /**
     * Has attachments
     *
     * Nullable
     *
     * @var bool $hasAttachments
     */
    protected $hasAttachments = null;

    /**
     * The API Endpoint
     *
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
        ],
        'accountId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'userId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
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
