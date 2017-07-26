<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountReceipt;
use DarrynTen\SageOne\Models\TaxInvoice;
use DarrynTen\SageOne\Models\Customer;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\CustomerCategory;
use DarrynTen\SageOne\Models\SalesRepresentative;
use DarrynTen\SageOne\Models\AdditionalPriceList;
use DarrynTen\SageOne\Models\CommercialDocumentLine;
use DarrynTen\SageOne\Models\ModelCollection;

class AccountReceiptModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AccountReceipt::class, 'accountId');
    }

    public function testCanNullifyBankImportMappingId()
    {
        $this->verifyCanNullify(AccountReceipt::class, 'bankImportMappingId');
    }

    public function testCanNullifyParentId()
    {
        $this->verifyCanNullify(AccountReceipt::class, 'parentId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AccountReceipt::class, 'accountId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AccountReceipt::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'accountId' => [
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
                'max' => 8000
            ],
            'description' => [
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
            ],
            'taxTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'comments' => [
                'type' => 'string',
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
            'total' => [
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
            'parentId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false
            ],
            'accepted' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
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
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AccountReceipt::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AccountReceipt::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(2, $results[0]->accountId);
            $this->assertEquals('2017-07-13', $results[0]->date->format('Y-m-d'));
            $this->assertEquals('sample string 4', $results[0]->payee);
            $this->assertEquals('sample string 5', $results[0]->description);
            $this->assertEquals('sample string 6', $results[0]->reference);
            $this->assertEquals(7, $results[0]->taxTypeId);
            $this->assertEquals('sample string 8', $results[0]->comments);
            $this->assertEquals(9.0, $results[0]->exclusive);
            $this->assertEquals(10.0, $results[0]->tax);
            $this->assertEquals(11.0, $results[0]->total);
            $this->assertEquals(true, $results[0]->reconciled);
            $this->assertEquals(13, $results[0]->bankAccountId);
            $this->assertEquals(1, $results[0]->analysisCategoryId1);
            $this->assertEquals(1, $results[0]->analysisCategoryId2);
            $this->assertEquals(1, $results[0]->analysisCategoryId3);
            $this->assertEquals(1, $results[0]->parentId);
            $this->assertEquals(true, $results[0]->accepted);
            $this->assertEquals('sample string 15', $results[0]->bankUniqueIdentifier);
            $this->assertEquals(1, $results[0]->importTypeId);
            $this->assertEquals(1, $results[0]->bankImportMappingId);
            $this->assertEquals(1, $results[0]->bankAccount_CurrencyId);
            $this->assertEquals(1.0, $results[0]->bankAccount_ExchangeRate);
            $this->assertEquals('2017-07-13', $results[0]->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $results[0]->created->format('Y-m-d'));

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(2, $results[0]->accountId);
            $this->assertEquals('2017-07-13', $results[0]->date->format('Y-m-d'));
            $this->assertEquals('sample string 4', $results[0]->payee);
            $this->assertEquals('sample string 5', $results[0]->description);
            $this->assertEquals('sample string 6', $results[0]->reference);
            $this->assertEquals(7, $results[0]->taxTypeId);
            $this->assertEquals('sample string 8', $results[0]->comments);
            $this->assertEquals(9.0, $results[0]->exclusive);
            $this->assertEquals(10.0, $results[0]->tax);
            $this->assertEquals(11.0, $results[0]->total);
            $this->assertEquals(true, $results[0]->reconciled);
            $this->assertEquals(13, $results[0]->bankAccountId);
            $this->assertEquals(1, $results[0]->analysisCategoryId1);
            $this->assertEquals(1, $results[0]->analysisCategoryId2);
            $this->assertEquals(1, $results[0]->analysisCategoryId3);
            $this->assertEquals(1, $results[0]->parentId);
            $this->assertEquals(true, $results[0]->accepted);
            $this->assertEquals('sample string 15', $results[0]->bankUniqueIdentifier);
            $this->assertEquals(1, $results[0]->importTypeId);
            $this->assertEquals(1, $results[0]->bankImportMappingId);
            $this->assertEquals(1, $results[0]->bankAccount_CurrencyId);
            $this->assertEquals(1.0, $results[0]->bankAccount_ExchangeRate);
            $this->assertEquals('2017-07-13', $results[0]->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $results[0]->created->format('Y-m-d'));

            $this->assertCount(25, json_decode($results[0]->toJson(), true));
            $this->assertCount(25, json_decode($results[1]->toJson(), true));
        });
    }

    public function testSave()
    {
        $this->verifySave(AccountReceipt::class, function ($model) {
            $model->accountId = 2;
            $model->date = "2017-07-12";
            $model->payee = "sample string 4 updated";
            $model->description = "sample string 5 updated";
            $model->reference = "sample string 6 updated";
            $model->taxTypeId = 7;
            $model->comments = "sample string 8 updated";
            $model->exclusive = 9.0;
            $model->tax = 10.0;
            $model->total = 11.0;
            $model->reconciled = true;
            $model->bankAccountId = 13;
            $model->analysisCategoryId1 = 1;
            $model->analysisCategoryId2 = 1;
            $model->analysisCategoryId3 = 1;
            $model->accepted = true;
            $model->bankUniqueIdentifier = "sample string 15";
            $model->importTypeId = 1;
            $model->bankImportMappingId = 1;
            $model->bankAccount_CurrencyId = 1;
            $model->bankAccount_ExchangeRate = 1.0;
        }, function ($savedModel) {
            $this->assertInstanceOf(TaxInvoice::class, $savedModel);
            $this->assertEquals('2017-07-13', $savedModel->dueDate->format('Y-m-d'));
            $this->assertEquals('sample string 1', $savedModel->fromDocument);
            $this->assertEquals(1, $savedModel->fromDocumentId);
            $this->assertEquals(1, $savedModel->fromDocumentTypeId);
            $this->assertEquals(true, $savedModel->allowOnlinePayment);
            $this->assertEquals(true, $savedModel->paid);
            $this->assertEquals('Paid', $savedModel->status);
            $this->assertEquals(true, $savedModel->locked);
            $this->assertEquals(3, $savedModel->customerId);
            $this->assertEquals('sample string 4', $savedModel->customerName);
            $this->assertEquals(1, $savedModel->statusId);
            $this->assertEquals('2017-07-13', $savedModel->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->created->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->customer_CurrencyId);
            $this->assertEquals(1.0, $savedModel->customer_ExchangeRate);
            $this->assertEquals(6, $savedModel->id);
            $this->assertEquals('2017-07-13', $savedModel->date->format('Y-m-d'));
            $this->assertEquals(true, $savedModel->inclusive);
            $this->assertEquals(8.1, $savedModel->discountPercentage);
            $this->assertEquals('sample string 9', $savedModel->taxReference);
            $this->assertEquals('sample string 10', $savedModel->documentNumber);
            $this->assertEquals('sample string 11', $savedModel->reference);
            $this->assertEquals('sample string 12', $savedModel->message);
            $this->assertEquals(13.0, $savedModel->discount);
            $this->assertEquals(14.0, $savedModel->exclusive);
            $this->assertEquals(15.0, $savedModel->tax);
            $this->assertEquals(16.0, $savedModel->rounding);
            $this->assertEquals(17.0, $savedModel->total);
            $this->assertEquals(18.0, $savedModel->amountDue);
            $this->assertEquals('sample string 19', $savedModel->postalAddress01);
            $this->assertEquals('sample string 20', $savedModel->postalAddress02);
            $this->assertEquals('sample string 21', $savedModel->postalAddress03);
            $this->assertEquals('sample string 22', $savedModel->postalAddress04);
            $this->assertEquals('sample string 23', $savedModel->postalAddress05);
            $this->assertEquals('sample string 24', $savedModel->deliveryAddress01);
            $this->assertEquals('sample string 25', $savedModel->deliveryAddress02);
            $this->assertEquals('sample string 26', $savedModel->deliveryAddress03);
            $this->assertEquals('sample string 27', $savedModel->deliveryAddress04);
            $this->assertEquals('sample string 28', $savedModel->deliveryAddress05);
            $this->assertEquals(true, $savedModel->printed);
            $this->assertEquals(1, $savedModel->taxPeriodId);
            $this->assertEquals(true, $savedModel->editable);
            $this->assertEquals(true, $savedModel->hasAttachments);
            $this->assertEquals(true, $savedModel->hasNotes);
            $this->assertEquals(true, $savedModel->hasAnticipatedDate);
            $this->assertEquals('2017-07-13', $savedModel->anticipatedDate->format('Y-m-d'));
            $this->assertEquals('sample string 32', $savedModel->externalReference);

            $this->assertInstanceOf(Customer::class, $savedModel->customer);
            $this->assertInstanceOf(CustomerCategory::class, $savedModel->customer->category);
            $this->assertInstanceOf(SalesRepresentative::class, $savedModel->customer->salesRepresentative);
            $this->assertInstanceOf(AdditionalPriceList::class, $savedModel->customer->defaultPriceList);
            $this->assertInstanceOf(TaxType::class, $savedModel->customer->defaultTaxType);

            $this->assertEquals('sample string 1', $savedModel->customer->name);
            $this->assertEquals(1, $savedModel->customer->salesRepresentativeId);
            $this->assertEquals('sample string 2', $savedModel->customer->taxReference);
            $this->assertEquals('sample string 3', $savedModel->customer->contactName);
            $this->assertEquals('sample string 4', $savedModel->customer->telephone);
            $this->assertEquals('sample string 5', $savedModel->customer->fax);
            $this->assertEquals('sample string 6', $savedModel->customer->mobile);
            $this->assertEquals('user@example.com', $savedModel->customer->email);
            $this->assertEquals('sample string 8', $savedModel->customer->webAddress);
            $this->assertEquals(true, $savedModel->customer->active);
            $this->assertEquals(10.0, $savedModel->customer->balance);
            $this->assertEquals(11.0, $savedModel->customer->creditLimit);
            $this->assertEquals(1, $savedModel->customer->communicationMethod);
            $this->assertEquals('sample string 12', $savedModel->customer->postalAddress01);
            $this->assertEquals('sample string 13', $savedModel->customer->postalAddress02);
            $this->assertEquals('sample string 14', $savedModel->customer->postalAddress03);
            $this->assertEquals('sample string 15', $savedModel->customer->postalAddress04);
            $this->assertEquals('sample string 16', $savedModel->customer->postalAddress05);
            $this->assertEquals('sample string 17', $savedModel->customer->deliveryAddress01);
            $this->assertEquals('sample string 18', $savedModel->customer->deliveryAddress02);
            $this->assertEquals('sample string 19', $savedModel->customer->deliveryAddress03);
            $this->assertEquals('sample string 20', $savedModel->customer->deliveryAddress04);
            $this->assertEquals('sample string 21', $savedModel->customer->deliveryAddress05);
            $this->assertEquals(true, $savedModel->customer->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $savedModel->customer->enableCustomerZone);
            $this->assertEquals('20d2d110-eac2-45b2-b8f7-b4fbfd9eee81', $savedModel->customer->customerZoneGuid);
            $this->assertEquals(true, $savedModel->customer->cashSale);
            $this->assertEquals('sample string 24', $savedModel->customer->textField1);
            $this->assertEquals('sample string 25', $savedModel->customer->textField2);
            $this->assertEquals('sample string 26', $savedModel->customer->textField3);
            $this->assertEquals(1.0, $savedModel->customer->numericField1);
            $this->assertEquals(1.0, $savedModel->customer->numericField2);
            $this->assertEquals(1.0, $savedModel->customer->numericField3);
            $this->assertEquals(true, $savedModel->customer->yesNoField1);
            $this->assertEquals(true, $savedModel->customer->yesNoField2);
            $this->assertEquals(true, $savedModel->customer->yesNoField3);
            $this->assertEquals('2017-07-13', $savedModel->customer->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->customer->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->customer->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->customer->defaultPriceListId);
            $this->assertEquals("sample string 2", $savedModel->customer->defaultPriceListName);
            $this->assertEquals(true, $savedModel->customer->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-13', $savedModel->customer->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->customer->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $savedModel->customer->businessRegistrationNumber);
            $this->assertEquals('2017-07-13', $savedModel->customer->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->customer->currencyId);
            $this->assertEquals('sample string 34', $savedModel->customer->currencySymbol);
            $this->assertEquals(true, $savedModel->customer->hasActivity);
            $this->assertEquals(1.0, $savedModel->customer->defaultDiscountPercentage);
            $this->assertEquals(1, $savedModel->customer->defaultTaxTypeId);
            $this->assertEquals(1, $savedModel->customer->dueDateMethodId);
            $this->assertEquals(1, $savedModel->customer->dueDateMethodValue);
            $this->assertEquals(36, $savedModel->customer->id);

            $this->assertInstanceOf(SalesRepresentative::class, $savedModel->salesRepresentative);
            $this->assertInstanceOf(ModelCollection::class, $savedModel->lines);
            $this->assertInstanceOf(CommercialDocumentLine::class, $savedModel->lines->results[0]);
            $this->assertInstanceOf(CommercialDocumentLine::class, $savedModel->lines->results[1]);
            $this->assertEquals(2, count($savedModel->lines->results));
            $this->assertEquals(2, $savedModel->lines->totalResults);
            $this->assertEquals(2, $savedModel->lines->returnedResults);

            $this->assertEquals(1, $savedModel->salesRepresentative->id);
            $this->assertEquals('sample string 2', $savedModel->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $savedModel->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $savedModel->salesRepresentative->name);
            $this->assertEquals(true, $savedModel->salesRepresentative->active);
            $this->assertEquals('sample string 6', $savedModel->salesRepresentative->email);
            $this->assertEquals('sample string 7', $savedModel->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $savedModel->salesRepresentative->telephone);
            $this->assertEquals('2017-07-13', $savedModel->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->salesRepresentative->modified->format('Y-m-d'));

            $this->assertEquals(1, $savedModel->customer->defaultTaxType->id);
            $this->assertEquals('sample string 2', $savedModel->customer->defaultTaxType->name);
            $this->assertEquals(3.1, $savedModel->customer->defaultTaxType->percentage);
            $this->assertEquals(true, $savedModel->customer->defaultTaxType->isDefault);
            $this->assertEquals(true, $savedModel->customer->defaultTaxType->hasActivity);
            $this->assertEquals(true, $savedModel->customer->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-13', $savedModel->customer->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->customer->defaultTaxType->modified->format('Y-m-d'));

            $this->assertEquals('sample string 1', $savedModel->customer->category->description);
            $this->assertEquals(2, $savedModel->customer->category->id);
            $this->assertEquals('2017-07-13', $savedModel->customer->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-13', $savedModel->customer->category->created->format('Y-m-d'));

            $line1 = $savedModel->lines->results[0];
            $line2 = $savedModel->lines->results[1];

            $this->assertEquals(1, $line1->selectionId);
            $this->assertEquals(1, $line1->taxTypeId);
            $this->assertEquals(1, $line1->id);
            $this->assertEquals('sample string 2', $line1->description);
            $this->assertEquals(0, $line1->lineType);
            $this->assertEquals(1.0, $line1->quantity);
            $this->assertEquals(3.0, $line1->unitPriceExclusive);
            $this->assertEquals('sample string 4', $line1->unit);
            $this->assertEquals(5.0, $line1->unitPriceInclusive);
            $this->assertEquals(6.1, $line1->taxPercentage);
            $this->assertEquals(7.1, $line1->discountPercentage);
            $this->assertEquals(8.0, $line1->exclusive);
            $this->assertEquals(9.0, $line1->discount);
            $this->assertEquals(10.0, $line1->tax);
            $this->assertEquals(11.0, $line1->total);
            $this->assertEquals('sample string 12', $line1->comments);
            $this->assertEquals(1, $line1->analysisCategoryId1);
            $this->assertEquals(1, $line1->analysisCategoryId2);
            $this->assertEquals(1, $line1->analysisCategoryId3);
            $trackingCode = '$trackingCode'; // TODO is there a better way?
            $this->assertEquals('sample string 13', $line1->$trackingCode);
            $this->assertEquals(1, $line1->currencyId);
            $this->assertEquals(1.0, $line1->unitCost);

            $this->assertEquals(1, $line2->selectionId);
            $this->assertEquals(1, $line2->taxTypeId);
            $this->assertEquals(1, $line2->id);
            $this->assertEquals('sample string 2', $line2->description);
            $this->assertEquals(0, $line2->lineType);
            $this->assertEquals(1.0, $line2->quantity);
            $this->assertEquals(3.0, $line2->unitPriceExclusive);
            $this->assertEquals('sample string 4', $line2->unit);
            $this->assertEquals(5.0, $line2->unitPriceInclusive);
            $this->assertEquals(6.1, $line2->taxPercentage);
            $this->assertEquals(7.1, $line2->discountPercentage);
            $this->assertEquals(8.0, $line2->exclusive);
            $this->assertEquals(9.0, $line2->discount);
            $this->assertEquals(10.0, $line2->tax);
            $this->assertEquals(11.0, $line2->total);
            $this->assertEquals('sample string 12', $line2->comments);
            $this->assertEquals(1, $line2->analysisCategoryId1);
            $this->assertEquals(1, $line2->analysisCategoryId2);
            $this->assertEquals(1, $line2->analysisCategoryId3);
            $trackingCode = '$trackingCode'; // TODO is there a better way?
            $this->assertEquals('sample string 13', $line2->$trackingCode);
            $this->assertEquals(1, $line2->currencyId);
            $this->assertEquals(1.0, $line2->unitCost);
        }, TaxInvoice::class);
    }
}
