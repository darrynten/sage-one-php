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
 * Supplier Payment Model
 *
 * Details on writable properties for Supplier Payment:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=SupplierPayment
 */
class SupplierPayment extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'SupplierPayment';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'supplierId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'payee' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 8000,
        ],
        'documentNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'reference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'comments' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 8000,
        ],
        'total' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'discount' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'totalUnallocated' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'reconciled' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankAccountId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'paymentMethod' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 1,
            'max' => 4,
        ],
        'taxPeriodId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => true,
        ],
        'editable' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'accepted' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'locked' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'analysisCategoryId1' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryId2' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryId3' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'printed' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'bankUniqueIdentifier' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'importTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankImportMappingId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankAccount_CurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'bankAccount_ExchangeRate' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'supplier_CurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'supplier_ExchangeRate' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'supplier' => [
            'type' => 'Supplier',
            'nullable' => false,
            'readonly' => false,
        ],
        'bankAccount' => [
            'type' => 'BankAccount',
            'nullable' => true,
            'readonly' => false,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => true,
        ]
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];

    /**
     * Gets a Supplier Payments generated as a PDF. 
     *
     * @param string $id
     * @return binary string
     */
    public function export($id)
    {
        $response = $this->request->requestRaw(
            'GET',
            $this->endpoint,
            sprintf('Export/%s', $id)
        );
        return $response->getBody()->getContents();
    }

    /**
     * Saves the list of Supplier Payments.
     *
     * @param array $list
     * @return ModelCollection
     */
    public function saveBatch(array $list)
    {
        $response = $this->request->request(
            'POST',
            $this->endpoint,
            'SaveBatch',
            $list
        );

        $count = count($response);

        $collection = new \stdClass;
        $collection->TotalResults = $count;
        $collection->ReturnedResults = $count;
        $collection->Results = $response;

        return new ModelCollection(SupplierPayment::class, $this->config, $collection);
    }
}
