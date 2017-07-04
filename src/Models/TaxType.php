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

class TaxType extends BaseModel
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
    protected $endpoint = 'TaxType';

    public $name;

    public $percentage;

    public $isDefault;

    public $hasActivity;

    public $isManualTax;

    public $created;

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
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
     *
     * TODO check why/if ID is truly writable!
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => integer,
            'nullable' => false,
            'persistable' => true,
        ],
        'name' => [
            'type' => string,
            'nullable' => false,
            'persistable' => true,
        ],
        'percentage' => [
            'type' => double,
            'nullable' => false,
            'persistable' => true,
        ],
        'isDefault' => [
            'type' => boolean,
            'nullable' => false,
            'persistable' => true,
        ],
        'hasActivity' => [
            'type' => boolean,
            'nullable' => false,
            'persistable' => false,
        ],
        'isManualTax' => [
            'type' => boolean,
            'nullable' => false,
            'persistable' => true,
        ],
        'created' => [
            'type' => DateTime,
            'nullable' => false,
            'persistable' => false,
        ],
        'modified' => [
            'type' => DateTime,
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
        'save' => true,
        'delete' => true,
    ];
}
