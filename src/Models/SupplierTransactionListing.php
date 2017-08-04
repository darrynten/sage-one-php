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
 * Supplier Transaction Listing model
 *
 * Details on writable properties for Supplier Transaction Listing:
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_SupplierTransactionListing
 */
class SupplierTransactionListing extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierTransactionListing';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'currencySymbol' => [
            'type' => 'string',
            'nullable' => true,
            'readonly' => false,
        ],
        'openingBalanceDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'openingBalance' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'closingBalanceDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'closingBalance' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'transactions' => [
            'type' => 'TransactionListingDetail',
            'nullable' => false,
            'readonly' => false,
            'collection' => true,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];

    /**
     * Gets the specified Supplier Supplier Transaction Listing Reporting Detail based on the request.
     *
     * @param SupplierTransactionListingRequest model
     * @return Collection of Transaction Listing
     * @link https://accounting.sageone.co.za/api/1.1.2/Help/Api/POST-SupplierTransactionListing-GetSupplierTransactionListingReportingDetail
     */
    public function getSupplierTransactionListingReportingDetail($requestModel)
    {
        $results = $this->request->request(
            'POST',
            $this->endpoint,
            'GetSupplierTransactionListingReportingDetail',
            $requestModel->toArray()
        );
        return new ModelCollection(SupplierTransactionListing::class, $this->config, $results);
    }
}
