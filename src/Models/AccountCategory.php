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

class AccountCategory extends BaseModel
{
    /**
     * The ID of the account
     *
     * @var int $id
     */
    public $id;

    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AccountCategory';

    /**
     * A comment on the AccountCategory
     *
     * @var string $comment
     */
    public $comment;

    /**
     * The order
     *
     * @var integer $order
     */
    public $order;

    /**
     * The description
     *
     * @var string $description
     */
    public $description;

    /**
     * Date the account category was created
     *
     * READ ONLY
     *
     * @var DateTime $created
     */
    public $created = null;

    /**
     * Date the account category was modified
     *
     * READ ONLY
     *
     * @var DateTime $created
     */
    public $modified = null;

    /**
     * Defines all possible fields.
     *
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's persistable.
     *
     * NB: Naming convention for keys is to lowercase the first character of the
     * field returned by Sage (they use PascalCase and we use camelCase)
     *
     * `ID` is automatically converted to `id`
     *
     * Details on writable properties for Account:
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AccountCategory
     *
     * TODO check why/if ID is truly writable!
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'persistable' => true,
        ],
        'comment' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'order' => [
            'type' => 'integer',
            'nullable' => false,
            'persistable' => true,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'persistable' => false,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => true,
            'persistable' => false,
        ],
    ];

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => false,
        'delete' => false,
    ];
}
