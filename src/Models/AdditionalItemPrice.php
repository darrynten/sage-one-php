<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Igor Sergiichuk <igorsergiichuk@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Additional Item Price
 *
 * Details on writable properties for Additional Item Price:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AdditionalItemPrice
 */
class AdditionalItemPrice extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AdditionalItemPrice';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'itemId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'priceInclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'priceExclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'additionalPriceListId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
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
}
