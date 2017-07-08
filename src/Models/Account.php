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
 * Account Model
 *
 * Details on writable properties for Account:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
 */
class Account extends BaseModel
{
    /**
     * The ID of the account
     *
     * @var int $id
     */
    public $id;

    /**
     * The name of the account
     *
     * @var string $name
     */
    public $name;

    /**
     * The category of the account
     *
     * @var AccountCategory $category
     */
    public $category;

    /**
     * Active flag
     *
     * @var bool $active
     */
    public $active;

    /**
     * Balance
     *
     * READ ONLY
     *
     * @var double $balance
     */
    protected $balance;

    /**
     * Description of the account
     *
     * @var string $description
     */
    public $description;

    /**
     * Reporting group ID
     *
     * Nullable
     *
     * @var int $reportingGroupId
     */
    public $reportingGroupId = null;

    /**
     * Unallocated account flag
     *
     * READ ONLY
     *
     * @var boolean $unallocatedAccount
     */
    protected $unallocatedAccount;

    /**
     * Tax locked flag
     *
     * READ ONLY
     *
     * @var boolean $isTaxLocked
     */
    protected $isTaxLocked;

    /**
     * Date the account was last modified
     *
     * READ ONLY
     *
     * Nullable
     *
     * @var DateTime $modified
     */
    protected $modified = null;

    /**
     * Date the account was created
     *
     * READ ONLY
     *
     * @var DateTime $created
     */
    protected $created;

    /**
     * The account type reference
     *
     * READ ONLY
     *
     * @var int $accountType
     */
    protected $accountType;

    /**
     * Account activity flag
     *
     * READ ONLY
     *
     * @var boolean $hasActivity
     */
    protected $hasActivity;

    /**
     * Default tax type ID reference
     *
     * @var int $defaultTaxTypeId
     */
    public $defaultTaxTypeId = null;

    /**
     * Actual model of the default tax type
     *
     * @var TaxType $defaultTaxType
     */
    public $defaultTaxType = null;

    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Account';

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
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
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
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'category' => [
            'type' => 'AccountCategory',
            'nullable' => false,
            'persistable' => true,
        ],
        'active' => [
            'type' => 'boolean',
            'nullable' => false,
            'persistable' => true,
        ],
        'balance' => [
            'type' => 'double',
            'nullable' => false,
            'persistable' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'reportingGroupId' => [
            'type' => 'integer',
            'nullable' => true,
            'persistable' => true,
        ],
        'unallocatedAccount' => [
            'type' => 'boolean',
            'nullable' => false,
            'persistable' => false,
        ],
        'isTaxLocked' => [
            'type' => 'boolean',
            'nullable' => false,
            'persistable' => false,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'persistable' => false,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'persistable' => false,
        ],
        'accountType' => [
            'type' => 'integer',
            'nullable' => false,
            'persistable' => false,
        ],
        'hasActivity' => [
            'type' => 'boolean',
            'nullable' => false,
            'persistable' => false,
        ],
        'defaultTaxTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'persistable' => true,
        ],
        'defaultTaxType' => [
            'type' => 'TaxType',
            'nullable' => true,
            'persistable' => true,
        ]
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
        'save' => true,
        'delete' => true,
    ];
}
