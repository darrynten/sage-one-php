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
 * Tax Invoce Model
 *
 * Details on writable properties for Tax Invoice:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=TaxInvoice
 */
class TaxInvoice extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'TaxInvoice';

    /**
     * @var array $fields
     */
    protected $fields = [
        'dueDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'fromDocument' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'fromDocumentId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => true,
        ],
        'fromDocumentTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => true,
        ],
        'allowOnlinePayment' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'paid' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'status' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'locked' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'customerId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'customerName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'customer' => [
            'type' => 'Customer',
            'nullable' => false,
            'readonly' => false,
        ],
        'salesRepresentativeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'salesRepresentative' => [
            'type' => 'SalesRepresentative',
            'nullable' => false,
            'readonly' => false,
        ],
        'statusId' => [
            'type' => 'integer',
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
            'nullable' => true,
            'readonly' => true,
        ],
        'customer_CurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'customer_ExchangeRate' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'inclusive' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'discountPercentage' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxReference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30
        ],
        'documentNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'reference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'message' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 8000
        ],
        'discount' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'exclusive' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'tax' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'rounding' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'total' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'amountDue' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'postalAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'postalAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'postalAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'postalAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'deliveryAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'deliveryAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'deliveryAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'deliveryAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100
        ],
        'deliveryAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'taxPeriodId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => true,
        ],
        /**
         * TODO Find out what is 'printed',
         * see https://accounting.sageone.co.za/api/1.1.2/Help/Api/POST-AccountReceipt-Save
         * Response has it, but TaxInvoice does not
         */
        'printed' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'editable' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'hasNotes' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'hasAnticipatedDate' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => true,
        ],
        'anticipatedDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'externalReference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'lines' => [
            'type' => 'CommercialDocumentLine',
            'collection' => true,
            'nullable' => false,
            'readonly' => false,
        ]
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => false
    ];

    /**
     * Calculates the specified Tax Invoice total fields.
     *
     * @return stdClass
     */
    public function calculate()
    {
        return $this->request->request('POST', $this->endpoint, 'Calculate');
    }

    /**
     * Emails the specified Tax Invoice.
     * @param array $parameters
     */
    public function email(array $parameters)
    {
        $this->request->request('POST', $this->endpoint, 'Email', $parameters);
    }

    /**
     * Emails the delivery note for a specific Tax Invoice
     * @param array $parameters
     */
    public function emailDeliveryNote(array $parameters)
    {
        $this->request->request('POST', $this->endpoint, 'EmailDeliveryNote', $parameters);
    }
}
