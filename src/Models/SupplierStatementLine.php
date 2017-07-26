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
 * Supplier Statement Line Model
 *
 * Details on writable properties for SupplierStatementLine:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierStatementLine
 */
class SupplierStatementLine extends BaseModel
{
    /**
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierStatementLine';

    /**
     * @var array $fields
     */
    protected $fields = [
        'documentHeaderId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'documentTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'documentNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'reference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'comment' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'debit' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'credit' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
    ];
}
