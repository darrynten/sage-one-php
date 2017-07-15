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
 * Commercial Document Line Model
 *
 * Details on writable properties for Commercial Document Line:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=CommercialDocumentLine
 */
class CommercialDocumentLine extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'CommercialDocumentLine';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false
        ],
        'selectionId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'required' => true
        ],
        'taxTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'lineType' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 5
        ],
        'quantity' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
            'required' => true
        ],
        'unitPriceExclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'unit' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'unitPriceInclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxPercentage' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'discountPercentage' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'exclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'discount' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'tax' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'total' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'comments' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'analysisCategoryId1' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryId2' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryId3' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        '$trackingCode' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'currencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'unitCost' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false
    ];
}
