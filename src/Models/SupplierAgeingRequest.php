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
 * SupplierAgeingRequest Model
 *
 * Details on Supplier Ageing Request model:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierAgeingRequestModel
 */
class SupplierAgeingRequest extends BaseModel
{
    /**
     * @var array $fields
     */
    protected $fields = [
        'supplierId' =>[
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'toDate' =>[
            'type' => 'dateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'summary' =>[
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'ageingPeriod' =>[
            'type' => 'integer',
            'nullable' => true,
            'readonly' => true,
        ],
        'fromSupplier' =>[
            'type' => 'string',
            'nullable' => true,
            'readonly' => true,
        ],
        'toSupplier' =>[
            'type' => 'string',
            'nullable' => true,
            'readonly' => true,
        ],
        'fromCategory' =>[
            'type' => 'string',
            'nullable' => true,
            'readonly' => true,
        ],
        'toCategory' =>[
            'type' => 'string',
            'nullable' => true,
            'readonly' => true,
        ],
        'includeActive' =>[
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'includeInactive' =>[
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'basedOnDueDate' =>[
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'excludeZeroBalance' =>[
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'useForeignCurrency' =>[
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ]
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
