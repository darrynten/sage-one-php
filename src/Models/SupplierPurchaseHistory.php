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
 * Supplier Purchase History Model
 *
 * Details on writable properties for Supplier Purchase History:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierPurchaseHistory
 */
class SupplierPurchaseHistory extends BaseModel
{
    /**
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierPurchaseHistory';

    /**
     * @var array $fields
     */
    protected $fields = [
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'supplier' => [
            'type' => 'Supplier',
            'nullable' => false,
            'readonly' => false,
        ],
        'exclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => false,
        'save' => false,
        'delete' => false
    ];

    /**
     * @var array $featureMethods
     */
    protected $featureMethods = [
        'all' => 'POST',
        'get' => false,
        'save' => false,
        'delete' => false
    ];
}
