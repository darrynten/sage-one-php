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
 * Bank Feed Account Group Model
 *
 * Details on writable properties for Bank Feed Account Group:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=BankFeedAccountGroup
 */
class BankFeedAccountGroup extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'BankFeedAccountGroup';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankFeedProviderId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankFeedProviderTypeId' => [
            'type' => 'integer',
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
        'requiresAdditionalAuthentication' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'lastRefreshStatusId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
    ];
}
