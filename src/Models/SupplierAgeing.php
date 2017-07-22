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
use DarrynTen\SageOne\Models\SupplierAgeingRequest;


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
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'ageingTransactions' =>[
            'type' => 'AgeingTransaction',
            'nullable' => false,
            'readonly' => false,
            'collection' => true,
        ],
        'total' =>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'current' =>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days30' =>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days60' =>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days90' =>[
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days120Plus' =>[
            'type' => 'double',
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

    /**
     * Gets the specified Supplier Ageing Summary statement based on the request.
     *
     * @param SupplierAgeingRequest model
     * @return Supplier Ageing model
     * @link https://accounting.sageone.co.za/api/1.1.2/Help/Api/POST-SupplierAgeing-GetSummary
     */
    public function getSummary($supplierAgeingRequest)
    {
        $result = $this->request->request('POST', $this->endpoint, 'GetSummary', $supplierAgeingRequest);
        return $this->loadResult($result);
    }
}
