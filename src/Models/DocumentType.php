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

use DarrynTen\SageOne\BasicEnum;

/**
 * DocumentType Model
 *
 * Details on Document Type model:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=DocumentType
 */
class DocumentType extends BasicEnum
{
    const Ignored = -1;
    const CustomerOpeningBalance = 0;
    const Quote = 1;
    const TaxInvoice = 2;
    const CustomerReturn = 3;
    const Receipt = 4;
    const WriteOff = 5;
    const CustomerDiscount = 6;
    const RecurringTaxInvoice = 7;
    const DraftTaxInvoice = 8;
    const CustomerJournal = 9;
    const CustomerBadDebtRelief = 11;
    const CustomerBadDebtRecovered = 12;
    const DeliveryNote = 52;
    const CustomerDocumentTemplate = 58;
    const SupplierOpeningBalance 100;
    const PurchaseOrder = 101;
    const SupplierInvoice = 102;
    const SupplierReturn = 103;
    const Payment = 104;
    const SupplierDiscount = 106;
    const SupplierJournal = 109;
    const SupplierAdditionalCost = 110;
    const SupplierBadDebtRelief = 111;
    const SupplierBadDebtRecovered = 112;
    const ItemOpeningBalance = 200;
    const ItemAdjustment = 201;
    const AccountOpeningBalance = 300;
    const CashbookReceipt = 301;
    const CashbookPayment = 302;
    const JournalEntry = 303;
    const BankAccountOpeningBalance = 400;
    const BankAccountTransferFrom = 401;
    const BankAccountTransferTo = 402;
    const SplitCashbookPayment = 403;
    const SplitCashbookReceipt = 404;
    const SplitPayment = 405;
    const SplitReceipt = 406;
    const TaxPayment = 501;
    const TaxRefund = 502;
    const InputTaxAdjustment = 503;
    const OutputTaxAdjustment = 504;
    const InputTaxProvisionAdjustment = 505;
    const OutputTaxProvisionAdjustment = 506;
}