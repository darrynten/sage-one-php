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
     * @var float $balance
     */
    private $balance;

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
     * @var bool $unallocatedAccount
     */
    private $unallocatedAccount;

    /**
     * Tax locked flag
     *
     * READ ONLY
     *
     * @var bool $isTaxLocked
     */
    private $isTaxLocked;

    /**
     * Date the account was last modified
     *
     * READ ONLY
     *
     * Nullable
     *
     * @var date $modified
     */
    private $modified = null;

    /**
     * Date the account was created
     *
     * READ ONLY
     *
     * @var date $created
     */
    private $created;

    /**
     * The account type reference
     *
     * READ ONLY
     *
     * @var int $accountType
     */
    public $accountType;

    /**
     * Account activity flag
     *
     * READ ONLY
     *
     * @var bool $hasActivity
     */
    private $hasActivity;

    /**
     * Default tax type ID reference
     *
     * @var int $defaultTaxTypeId
     */
    public $defaultTaxTypeId;

    /**
     * Actual model of the default tax type
     *
     * @var TaxType $defaultTaxType
     */
    public $defaultTaxType;

    public function __construct()
    {
        parent::__construct();
    }
}
