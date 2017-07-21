<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Brian Maiyo <kiproping@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * AgeingTransaction Model
 *
 * Details on AgeingTransaction model:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AgeingTransaction
 */
class AgeingTransaction extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AgeingTransaction';

    /**
     * @var array $fields
     */
    protected $fields = [
        'documentHeaderId'=>[
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentTypeId'=>[
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentNumber'=>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'reference'=>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentType '=>[
            'type' => 'DocumentType',
            'nullable' => false,
            'readonly' => false,
        ],
        'comment'=>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'date'=>[
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'dueDate'=>[
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'total'=>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'current'=>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days30'=>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days60'=>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days90'=>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days120Plus'=>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
    ];

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];
}
