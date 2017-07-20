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
 * SupplierAgeing Model
 *
 * Details on Supplier Ageing model:
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_SupplierAgeing
 */
class SupplierAgeing extends BaseModel
{
	/**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierAgeing';

    /**
     * @var array $fields
     */
    protected $fields = [
        'supplier' =>[
            'type' => 'Supplier',
            'nullable' => false,
            'readonly' => false,
        ],
        'date' =>[
            'type' => 'dateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'ageingTransactions' =>[
            'type' => 'AgeingTransactions',
            'nullable' => true,
            'readonly' => true,
            'collection' => true,
        ],
        'total' =>[
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'current' =>[
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'days30' =>[
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'days60' =>[
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'days90' =>[
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ],
        'days120Plus' =>[
            'type' => 'double',
            'nullable' => true,
            'readonly' => true,
        ]
    ];
}

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => true,
        'save' => false,
        'delete' => false,
    ];