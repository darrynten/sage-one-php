<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Vitaliy Likhachev <make.it.git@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Bank Feed Account Model
 *
 * Details on writable properties for Bank Feed Account:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=BankFeedAccount
 */
class BankFeedAccount extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'BankFeedAccount';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankFeedAccountGroupId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankFeedAccountGroup' => [
            'type' => 'BankFeedAccountGroup',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'identifier' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'lastRefreshDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'firstImportDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'balance' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankAccountId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankAccountName' => [
            'type' => 'string',
            'nullable' => true,
            'readonly' => false,
        ],
        'lastRefreshStatusId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
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
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];
}
