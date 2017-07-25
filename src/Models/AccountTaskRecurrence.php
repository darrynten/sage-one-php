<?php
/**
 * SageOne Library
 * @category Library
 * @package  SageOne
 * @author   Ihor Sergiichuk <igorsergiichuk@ggithub.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * AccountTaskRecurrence Model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_AccountTaskRecurrence
 */
class AccountTaskRecurrence extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AccountTaskRecurrence';

    /**
     * Defines all possible fields.
     *
     * @var array $fields
     */
    protected $fields = [
        'companyId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'frequencyType' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'frequencyInterval' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'frequencyRelativeInterval' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'frequencyRecurrenceFactor' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'frequencyYearlyMonth' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'recurrenceRangeType' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'startDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'endDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'numberOfOccurrences' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'taskDuration' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
    ];

    /**
     * Features supported by the endpoint
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => false,
        'delete' => true,
    ];
}
