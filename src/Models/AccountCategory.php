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
 * Account Category
 *
 * Details on writable properties for Account:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AccountCategory
 */
class AccountCategory extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AccountCategory';

    /**
     * Defines all possible fields.
     *
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's readonly.
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
            'readonly' => false,
            'required' => true,
        ],
        'comment' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'order' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
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
