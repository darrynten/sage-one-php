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
            'persistable' => true,
        ],
        'accountId' => [
            'type' => 'integer',
            'nullable' => false,
            'persistable' => true,
        ],
        'userId' => [
            'type' => 'integer',
            'nullable' => true,
            'persistable' => true,
        ],
        'subject' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'entryDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'persistable' => true,
        ],
        'actionDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'persistable' => true,
        ],
        'status' => [
            'type' => 'boolean',
            'nullable' => true,
            'persistable' => true,
        ],
        'note' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
            'nullable' => true,
            'persistable' => true,
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
