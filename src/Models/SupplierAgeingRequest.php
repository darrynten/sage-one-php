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
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierAgeingRequest';

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
            'nullable' => false,
            'readonly' => false,
        ],
        'ageingPeriod' =>[
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'fromSupplier' =>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'toSupplier' =>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'fromCategory' =>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'toCategory' =>[
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'includeActive' =>[
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'includeInactive' =>[
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'basedOnDueDate' =>[
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'excludeZeroBalance' =>[
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'useForeignCurrency' =>[
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
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
