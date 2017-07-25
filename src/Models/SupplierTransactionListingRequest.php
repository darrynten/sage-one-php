<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Brian Maiyo <kipropbrian@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Supplier Transaction Listing Request model
 *
 * Details on writable properties for Supplier Transaction Request Listing:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierTransactionListingRequestModel
 */
class SupplierTransactionListingRequest extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierTransactionListingRequest';

    /**
     * @var array $fields
     */
    protected $fields = [
        'fromSupplier' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'toSupplier' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'fromCategory' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'toCategory' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'fromDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'toDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'includeActive' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'includeInactive' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'transactionType' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'showOpeningBalance' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'useForeignCurrency' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ]
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
