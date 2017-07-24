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
 * Supplier Statement Model
 *
 * Details on writable properties for SupplierStatement:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierStatement
 */
class SupplierStatement extends BaseModel
{
    /**
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierStatement';

    /**
     * @var array $fields
     */
    protected $fields = [
        'supplier' => [
            'type' => 'Supplier',
            'nullable' => false,
            'readonly' => true,
        ],
        'statementLines' => [
            'type' => 'SupplierStatementLine',
            'nullable' => false,
            'readonly' => true,
            'collection' => true,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => true,
        ],
        'totalDue' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'totalPaid' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'current' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'days30' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'days60' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'days90' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'days120Plus' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];

    /**
     * @var array $featureMethods
     */
    protected $featureMethods = [
        'all' => 'POST',
        'get' => 'GET',
        'save' => 'POST',
        'delete' => 'DELETE',
    ];
}
