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
use DarrynTen\SageOne\Models\ModelCollection;

/**
 * SupplierAdditionalContactDetails Model
 *
 */
class SupplierAdditionalContactDetail extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierAdditionalContactDetail';

    /**
     * Defines all possible fields.
     *
     * This maps to all the public properties you added above
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'supplierId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'contactName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'designation' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 50,
        ],
        'telephone' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'fax' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'mobile' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'email' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
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
        'delete' => true,
    ];
}
