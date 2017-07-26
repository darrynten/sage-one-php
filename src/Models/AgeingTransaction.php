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
     * Enums for DocumentType
     *
     * @link https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=DocumentType
     */
    const IGNORED = -1;
    const CUSTOMEROPENINGBALANCE = 0;
    const QUOTE = 1;
    const TAXINVOICE = 2;
    const CUSTOMERRETURN = 3;
    const RECEIPT = 4;
    const WRITEOFF = 5;
    const CUSTOMERDISCOUNT = 6;
    const RECURRINGTAXINVOICE = 7;
    const DRAFTTAXINVOICE = 8;
    const CUSTOMERJOURNAL = 9;
    const CUSTOMERBADDEBTRELIEF = 11;
    const CUSTOMERBADDEBTRECOVERED = 12;
    const DELIVERYNOTE = 52;
    const CUSTOMERDOCUMENTTEMPLATE = 58;
    const SUPPLIEROPENINGBALANCE = 100;
    const PURCHASEORDER = 101;
    const SUPPLIERINVOICE = 102;
    const SUPPLIERRETURN = 103;
    const PAYMENT = 104;
    const SUPPLIERDISCOUNT = 106;
    const SUPPLIERJOURNAL = 109;
    const SUPPLIERADDITIONALCOST = 110;
    const SUPPLIERBADDEBTRELIEF = 111;
    const SUPPLIERBADDEBTRECOVERED = 112;
    const ITEMOPENINGBALANCE = 200;
    const ITEMADJUSTMENT = 201;
    const ACCOUNTOPENINGBALANCE = 300;
    const CASHBOOKRECEIPT = 301;
    const CASHBOOKPAYMENT = 302;
    const JOURNALENTRY = 303;
    const BANKACCOUNTOPENINGBALANCE = 400;
    const BANKACCOUNTTRANSFERFROM = 401;
    const BANKACCOUNTTRANSFERTO = 402;
    const SPLITCASHBOOKPAYMENT = 403;
    const SPLITCASHBOOKRECEIPT = 404;
    const SPLITPAYMENT = 405;
    const SPLITRECEIPT = 406;
    const TAXPAYMENT = 501;
    const TAXREFUND = 502;
    const INPUTTAXADJUSTMENT = 503;
    const OUTPUTTAXADJUSTMENT = 504;
    const INPUTTAXPROVISIONADJUSTMENT = 505;
    const OUTPUTTAXPROVISIONADJUSTMENT = 506;

    /**
     * Array of document types
     *
     * @var array $documentTypes
     */
    protected $documentTypes = [
        self::IGNORED => 'Ignored',
        self::CUSTOMEROPENINGBALANCE => 'CustomerOpeningBalance',
        self::QUOTE => 'Quote',
        self::TAXINVOICE => 'TaxInvoice',
        self::CUSTOMERRETURN => 'CustomerReturn',
        self::RECEIPT => 'Receipt',
        self::WRITEOFF => 'WriteOff',
        self::CUSTOMERDISCOUNT => 'CustomerDiscount',
        self::RECURRINGTAXINVOICE => 'RecurringTaxInvoice',
        self::DRAFTTAXINVOICE => 'DraftTaxInvoice',
        self::CUSTOMERJOURNAL => 'CustomerJournal',
        self::CUSTOMERBADDEBTRELIEF => 'CustomerBadDebtRelief',
        self::CUSTOMERBADDEBTRECOVERED => 'CustomerBadDebtRecovered',
        self::DELIVERYNOTE => 'DeliveryNote',
        self::CUSTOMERDOCUMENTTEMPLATE => 'CustomerDocumentTemplate',
        self::SUPPLIEROPENINGBALANCE => 'SupplierOpeningBalance',
        self::PURCHASEORDER => 'PurchaseOrder',
        self::SUPPLIERINVOICE => 'SupplierInvoice',
        self::SUPPLIERRETURN => 'SupplierReturn',
        self::PAYMENT => 'Payment',
        self::SUPPLIERDISCOUNT => 'SupplierDiscount',
        self::SUPPLIERJOURNAL => 'SupplierJournal',
        self::SUPPLIERADDITIONALCOST => 'SupplierAdditionalCost',
        self::SUPPLIERBADDEBTRELIEF => 'SupplierBadDebtRelease',
        self::SUPPLIERBADDEBTRECOVERED => 'SupplierBadDebtRecovered',
        self::ITEMOPENINGBALANCE => 'ItemOpeningBalance',
        self::ITEMADJUSTMENT => 'ItemAdjustment',
        self::ACCOUNTOPENINGBALANCE => 'AccountOpeningBalance',
        self::CASHBOOKRECEIPT => 'CashBookReceipt',
        self::CASHBOOKPAYMENT => 'CashBookPayment',
        self::JOURNALENTRY => 'JournalEntry',
        self::BANKACCOUNTOPENINGBALANCE => 'BankAccountOpeningBalance',
        self::BANKACCOUNTTRANSFERFROM => 'BankAccountTransferFrom',
        self::BANKACCOUNTTRANSFERTO => 'BankAccountTransferTo',
        self::SPLITCASHBOOKPAYMENT => 'SplitCashbookPayment',
        self::SPLITCASHBOOKRECEIPT => 'SplitCashbookReceipt',
        self::SPLITPAYMENT => 'SplitPayment',
        self::SPLITRECEIPT => 'SplitReceipt',
        self::TAXPAYMENT => 'TaxPayment',
        self::TAXREFUND => 'TaxRefund',
        self::INPUTTAXADJUSTMENT => 'InputTaxAdjustment',
        self::OUTPUTTAXADJUSTMENT => 'OutputTaxAdjustment',
        self::INPUTTAXPROVISIONADJUSTMENT => 'InputTaxProvisionedAdjustment',
        self::OUTPUTTAXPROVISIONADJUSTMENT => 'OutputTaxProvisionAdjustment',
    ];

    /**
     * @var array $fields
     */
    protected $fields = [
        'documentHeaderId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'enum' => 'documentTypes',
        ],
        'documentNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'reference' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'documentType' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'comment' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'dueDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'total' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'current' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days30' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days60' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days90' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => false,
        ],
        'days120Plus' => [
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
