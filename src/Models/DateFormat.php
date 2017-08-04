<?php
/**
 * SageOne Library
 * @category Library
 * @package  SageOne
 * @author   Ihor Sergiichuk <igorsergiichuk@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * DateFormat Model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_DateFormat
 */
class DateFormat extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'DateFormat';

    /**
     * Defines all possible fields.
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'displayAs' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'dotNetFormat' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'dotNetAltFormats' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'JSFormat' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'JSAltFormats' => [
            'type' => 'string',
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
        'delete' => false,
    ];
}
