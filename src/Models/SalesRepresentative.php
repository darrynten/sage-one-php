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
 * Sales Representative Model
 *
 * Details on writable properties for Sales Representative
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SalesRepresentative
 */
class SalesRepresentative extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SalesRepresentative';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'firstName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
            'min' => 0,
            'max' => 50,
        ],
        'lastName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
            'min' => 0,
            'max' => 50,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'active' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'email' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'mobile' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'telephone' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => true,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true
    ];

    /**
     * Determines whether the specified Sales Representative has activity.
     *
     * @param string $id
     * @return boolean
     */
    public function hasActivity($id)
    {
        return $this->request->request(
            'GET',
            $this->endpoint,
            sprintf('HasActivity/%s', $id)
        );
    }
}
