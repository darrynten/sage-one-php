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
 * Document Header Note Model
 *
 * Details on writable properties
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_DocumentHeaderNote
 */
class DocumentHeaderNote extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'DocumentHeaderNote';

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
        'companyId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentHeaderId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'noteTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'userId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'username' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'actionDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'note' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'completed' => [
            'type' => 'boolean',
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
        'save' => true,
        'delete' => false,
    ];
}
