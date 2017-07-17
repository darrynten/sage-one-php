<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\TaxInvoice;
use DarrynTen\SageOne\Models\Customer;
use DarrynTen\SageOne\Models\CustomerCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\AdditionalPriceList;
use DarrynTen\SageOne\Models\SalesRepresentative;
use DarrynTen\SageOne\Models\CommercialDocumentLine;
use DarrynTen\SageOne\Models\ModelCollection;

class TaxInvoiceModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(TaxInvoice::class, 'date');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(TaxInvoice::class, 'customer_CurrencyId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(TaxInvoice::class, 'dueDate');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(TaxInvoice::class, [
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
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(TaxInvoice::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(TaxInvoice::class, function ($results) {
            $this->assertCount(2, $results);

            $model1 = $results[0];
            $model2 = $results[1];

            $this->assertEquals('2017-07-17', $model1->dueDate->format('Y-m-d'));
            $this->assertEquals('sample string 1', $model1->fromDocument);
            $this->assertEquals(1, $model1->fromDocumentId);
            $this->assertEquals(1, $model1->fromDocumentTypeId);
            $this->assertEquals(true, $model1->allowOnlinePayment);
            $this->assertEquals(true, $model1->paid);
            $this->assertEquals('Paid', $model1->status);
            $this->assertEquals(true, $model1->locked);
            $this->assertEquals(3, $model1->customerId);
            $this->assertEquals('sample string 4', $model1->customerName);
            $this->assertEquals(1, $model1->statusId);
            $this->assertEquals('2017-07-17', $model1->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->created->format('Y-m-d'));
            $this->assertEquals(1, $model1->customer_CurrencyId);
            $this->assertEquals(1.0, $model1->customer_ExchangeRate);
            $this->assertEquals(6, $model1->id);
            $this->assertEquals('2017-07-17', $model1->date->format('Y-m-d'));
            $this->assertEquals(true, $model1->inclusive);
            $this->assertEquals(8.1, $model1->discountPercentage);
            $this->assertEquals('sample string 9', $model1->taxReference);
            $this->assertEquals('sample string 10', $model1->documentNumber);
            $this->assertEquals('sample string 11', $model1->reference);
            $this->assertEquals('sample string 12', $model1->message);
            $this->assertEquals(13.0, $model1->discount);
            $this->assertEquals(14.0, $model1->exclusive);
            $this->assertEquals(15.0, $model1->tax);
            $this->assertEquals(16.0, $model1->rounding);
            $this->assertEquals(17.0, $model1->total);
            $this->assertEquals(18.0, $model1->amountDue);
            $this->assertEquals('sample string 19', $model1->postalAddress01);
            $this->assertEquals('sample string 20', $model1->postalAddress02);
            $this->assertEquals('sample string 21', $model1->postalAddress03);
            $this->assertEquals('sample string 22', $model1->postalAddress04);
            $this->assertEquals('sample string 23', $model1->postalAddress05);
            $this->assertEquals('sample string 24', $model1->deliveryAddress01);
            $this->assertEquals('sample string 25', $model1->deliveryAddress02);
            $this->assertEquals('sample string 26', $model1->deliveryAddress03);
            $this->assertEquals('sample string 27', $model1->deliveryAddress04);
            $this->assertEquals('sample string 28', $model1->deliveryAddress05);
            $this->assertEquals(true, $model1->printed);
            $this->assertEquals(1, $model1->taxPeriodId);
            $this->assertEquals(true, $model1->editable);
            $this->assertEquals(true, $model1->hasAttachments);
            $this->assertEquals(true, $model1->hasNotes);
            $this->assertEquals(true, $model1->hasAnticipatedDate);
            $this->assertEquals('2017-07-17', $model1->anticipatedDate->format('Y-m-d'));
            $this->assertEquals('sample string 32', $model1->externalReference);

            $this->assertInstanceOf(Customer::class, $model1->customer);
            $this->assertInstanceOf(CustomerCategory::class, $model1->customer->category);
            $this->assertInstanceOf(SalesRepresentative::class, $model1->customer->salesRepresentative);
            $this->assertInstanceOf(AdditionalPriceList::class, $model1->customer->defaultPriceList);
            $this->assertInstanceOf(TaxType::class, $model1->customer->defaultTaxType);

            $this->assertEquals('sample string 1', $model1->customer->name);
            $this->assertEquals(1, $model1->customer->salesRepresentativeId);
            $this->assertEquals('sample string 2', $model1->customer->taxReference);
            $this->assertEquals('sample string 3', $model1->customer->contactName);
            $this->assertEquals('sample string 4', $model1->customer->telephone);
            $this->assertEquals('sample string 5', $model1->customer->fax);
            $this->assertEquals('sample string 6', $model1->customer->mobile);
            $this->assertEquals('sample string 7', $model1->customer->email);
            $this->assertEquals('sample string 8', $model1->customer->webAddress);
            $this->assertEquals(true, $model1->customer->active);
            $this->assertEquals(10.0, $model1->customer->balance);
            $this->assertEquals(11.0, $model1->customer->creditLimit);
            $this->assertEquals(1, $model1->customer->communicationMethod);
            $this->assertEquals('sample string 12', $model1->customer->postalAddress01);
            $this->assertEquals('sample string 13', $model1->customer->postalAddress02);
            $this->assertEquals('sample string 14', $model1->customer->postalAddress03);
            $this->assertEquals('sample string 15', $model1->customer->postalAddress04);
            $this->assertEquals('sample string 16', $model1->customer->postalAddress05);
            $this->assertEquals('sample string 17', $model1->customer->deliveryAddress01);
            $this->assertEquals('sample string 18', $model1->customer->deliveryAddress02);
            $this->assertEquals('sample string 19', $model1->customer->deliveryAddress03);
            $this->assertEquals('sample string 20', $model1->customer->deliveryAddress04);
            $this->assertEquals('sample string 21', $model1->customer->deliveryAddress05);
            $this->assertEquals(true, $model1->customer->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $model1->customer->enableCustomerZone);
            $this->assertEquals('38408c80-c431-4d00-b45b-06a4b5a6dd10', $model1->customer->customerZoneGuid);
            $this->assertEquals(true, $model1->customer->cashSale);
            $this->assertEquals('sample string 24', $model1->customer->textField1);
            $this->assertEquals('sample string 25', $model1->customer->textField2);
            $this->assertEquals('sample string 26', $model1->customer->textField3);
            $this->assertEquals(1.0, $model1->customer->numericField1);
            $this->assertEquals(1.0, $model1->customer->numericField2);
            $this->assertEquals(1.0, $model1->customer->numericField3);
            $this->assertEquals(true, $model1->customer->yesNoField1);
            $this->assertEquals(true, $model1->customer->yesNoField2);
            $this->assertEquals(true, $model1->customer->yesNoField3);
            $this->assertEquals('2017-07-17', $model1->customer->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->customer->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->customer->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $model1->customer->defaultPriceListId);
            $this->assertEquals("sample string 2", $model1->customer->defaultPriceListName);
            $this->assertEquals(true, $model1->customer->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-17', $model1->customer->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->customer->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $model1->customer->businessRegistrationNumber);
            $this->assertEquals('2017-07-17', $model1->customer->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $model1->customer->currencyId);
            $this->assertEquals('sample string 34', $model1->customer->currencySymbol);
            $this->assertEquals(true, $model1->customer->hasActivity);
            $this->assertEquals(1.0, $model1->customer->defaultDiscountPercentage);
            $this->assertEquals(1, $model1->customer->defaultTaxTypeId);
            $this->assertEquals(1, $model1->customer->dueDateMethodId);
            $this->assertEquals(1, $model1->customer->dueDateMethodValue);
            $this->assertEquals(36, $model1->customer->id);

            $this->assertInstanceOf(SalesRepresentative::class, $model1->salesRepresentative);
            $this->assertInstanceOf(ModelCollection::class, $model1->lines);
            $this->assertInstanceOf(CommercialDocumentLine::class, $model1->lines->results[0]);
            $this->assertInstanceOf(CommercialDocumentLine::class, $model1->lines->results[1]);
            $this->assertEquals(2, count($model1->lines->results));
            $this->assertEquals(2, $model1->lines->totalResults);
            $this->assertEquals(2, $model1->lines->returnedResults);

            $this->assertEquals(1, $model1->salesRepresentative->id);
            $this->assertEquals('sample string 2', $model1->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $model1->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model1->salesRepresentative->name);
            $this->assertEquals(true, $model1->salesRepresentative->active);
            $this->assertEquals('sample string 6', $model1->salesRepresentative->email);
            $this->assertEquals('sample string 7', $model1->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $model1->salesRepresentative->telephone);
            $this->assertEquals('2017-07-17', $model1->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->salesRepresentative->modified->format('Y-m-d'));

            $this->assertEquals(1, $model1->customer->defaultTaxType->id);
            $this->assertEquals('sample string 2', $model1->customer->defaultTaxType->name);
            $this->assertEquals(3.1, $model1->customer->defaultTaxType->percentage);
            $this->assertEquals(true, $model1->customer->defaultTaxType->isDefault);
            $this->assertEquals(true, $model1->customer->defaultTaxType->hasActivity);
            $this->assertEquals(true, $model1->customer->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-17', $model1->customer->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->customer->defaultTaxType->modified->format('Y-m-d'));

            $this->assertEquals('sample string 1', $model1->customer->category->description);
            $this->assertEquals(2, $model1->customer->category->id);
            $this->assertEquals('2017-07-17', $model1->customer->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model1->customer->category->created->format('Y-m-d'));

            $line1 = $model1->lines->results[0];
            $line2 = $model1->lines->results[1];

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

            $this->assertEquals('2017-07-17', $model2->dueDate->format('Y-m-d'));
            $this->assertEquals('sample string 1', $model2->fromDocument);
            $this->assertEquals(1, $model2->fromDocumentId);
            $this->assertEquals(1, $model2->fromDocumentTypeId);
            $this->assertEquals(true, $model2->allowOnlinePayment);
            $this->assertEquals(true, $model2->paid);
            $this->assertEquals('Paid', $model2->status);
            $this->assertEquals(true, $model2->locked);
            $this->assertEquals(3, $model2->customerId);
            $this->assertEquals('sample string 4', $model2->customerName);
            $this->assertEquals(1, $model2->statusId);
            $this->assertEquals('2017-07-17', $model2->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->created->format('Y-m-d'));
            $this->assertEquals(1, $model2->customer_CurrencyId);
            $this->assertEquals(1.0, $model2->customer_ExchangeRate);
            $this->assertEquals(6, $model2->id);
            $this->assertEquals('2017-07-17', $model2->date->format('Y-m-d'));
            $this->assertEquals(true, $model2->inclusive);
            $this->assertEquals(8.1, $model2->discountPercentage);
            $this->assertEquals('sample string 9', $model2->taxReference);
            $this->assertEquals('sample string 10', $model2->documentNumber);
            $this->assertEquals('sample string 11', $model2->reference);
            $this->assertEquals('sample string 12', $model2->message);
            $this->assertEquals(13.0, $model2->discount);
            $this->assertEquals(14.0, $model2->exclusive);
            $this->assertEquals(15.0, $model2->tax);
            $this->assertEquals(16.0, $model2->rounding);
            $this->assertEquals(17.0, $model2->total);
            $this->assertEquals(18.0, $model2->amountDue);
            $this->assertEquals('sample string 19', $model2->postalAddress01);
            $this->assertEquals('sample string 20', $model2->postalAddress02);
            $this->assertEquals('sample string 21', $model2->postalAddress03);
            $this->assertEquals('sample string 22', $model2->postalAddress04);
            $this->assertEquals('sample string 23', $model2->postalAddress05);
            $this->assertEquals('sample string 24', $model2->deliveryAddress01);
            $this->assertEquals('sample string 25', $model2->deliveryAddress02);
            $this->assertEquals('sample string 26', $model2->deliveryAddress03);
            $this->assertEquals('sample string 27', $model2->deliveryAddress04);
            $this->assertEquals('sample string 28', $model2->deliveryAddress05);
            $this->assertEquals(true, $model2->printed);
            $this->assertEquals(1, $model2->taxPeriodId);
            $this->assertEquals(true, $model2->editable);
            $this->assertEquals(true, $model2->hasAttachments);
            $this->assertEquals(true, $model2->hasNotes);
            $this->assertEquals(true, $model2->hasAnticipatedDate);
            $this->assertEquals('2017-07-17', $model2->anticipatedDate->format('Y-m-d'));
            $this->assertEquals('sample string 32', $model2->externalReference);

            $this->assertInstanceOf(Customer::class, $model2->customer);
            $this->assertInstanceOf(CustomerCategory::class, $model2->customer->category);
            $this->assertInstanceOf(SalesRepresentative::class, $model2->customer->salesRepresentative);
            $this->assertInstanceOf(AdditionalPriceList::class, $model2->customer->defaultPriceList);
            $this->assertInstanceOf(TaxType::class, $model2->customer->defaultTaxType);

            $this->assertEquals('sample string 1', $model2->customer->name);
            $this->assertEquals(1, $model2->customer->salesRepresentativeId);
            $this->assertEquals('sample string 2', $model2->customer->taxReference);
            $this->assertEquals('sample string 3', $model2->customer->contactName);
            $this->assertEquals('sample string 4', $model2->customer->telephone);
            $this->assertEquals('sample string 5', $model2->customer->fax);
            $this->assertEquals('sample string 6', $model2->customer->mobile);
            $this->assertEquals('sample string 7', $model2->customer->email);
            $this->assertEquals('sample string 8', $model2->customer->webAddress);
            $this->assertEquals(true, $model2->customer->active);
            $this->assertEquals(10.0, $model2->customer->balance);
            $this->assertEquals(11.0, $model2->customer->creditLimit);
            $this->assertEquals(1, $model2->customer->communicationMethod);
            $this->assertEquals('sample string 12', $model2->customer->postalAddress01);
            $this->assertEquals('sample string 13', $model2->customer->postalAddress02);
            $this->assertEquals('sample string 14', $model2->customer->postalAddress03);
            $this->assertEquals('sample string 15', $model2->customer->postalAddress04);
            $this->assertEquals('sample string 16', $model2->customer->postalAddress05);
            $this->assertEquals('sample string 17', $model2->customer->deliveryAddress01);
            $this->assertEquals('sample string 18', $model2->customer->deliveryAddress02);
            $this->assertEquals('sample string 19', $model2->customer->deliveryAddress03);
            $this->assertEquals('sample string 20', $model2->customer->deliveryAddress04);
            $this->assertEquals('sample string 21', $model2->customer->deliveryAddress05);
            $this->assertEquals(true, $model2->customer->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $model2->customer->enableCustomerZone);
            $this->assertEquals('38408c80-c431-4d00-b45b-06a4b5a6dd10', $model2->customer->customerZoneGuid);
            $this->assertEquals(true, $model2->customer->cashSale);
            $this->assertEquals('sample string 24', $model2->customer->textField1);
            $this->assertEquals('sample string 25', $model2->customer->textField2);
            $this->assertEquals('sample string 26', $model2->customer->textField3);
            $this->assertEquals(1.0, $model2->customer->numericField1);
            $this->assertEquals(1.0, $model2->customer->numericField2);
            $this->assertEquals(1.0, $model2->customer->numericField3);
            $this->assertEquals(true, $model2->customer->yesNoField1);
            $this->assertEquals(true, $model2->customer->yesNoField2);
            $this->assertEquals(true, $model2->customer->yesNoField3);
            $this->assertEquals('2017-07-17', $model2->customer->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->customer->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->customer->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $model2->customer->defaultPriceListId);
            $this->assertEquals("sample string 2", $model2->customer->defaultPriceListName);
            $this->assertEquals(true, $model2->customer->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-17', $model2->customer->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->customer->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $model2->customer->businessRegistrationNumber);
            $this->assertEquals('2017-07-17', $model2->customer->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $model2->customer->currencyId);
            $this->assertEquals('sample string 34', $model2->customer->currencySymbol);
            $this->assertEquals(true, $model2->customer->hasActivity);
            $this->assertEquals(1.0, $model2->customer->defaultDiscountPercentage);
            $this->assertEquals(1, $model2->customer->defaultTaxTypeId);
            $this->assertEquals(1, $model2->customer->dueDateMethodId);
            $this->assertEquals(1, $model2->customer->dueDateMethodValue);
            $this->assertEquals(36, $model2->customer->id);

            $this->assertInstanceOf(SalesRepresentative::class, $model2->salesRepresentative);
            $this->assertInstanceOf(ModelCollection::class, $model2->lines);
            $this->assertInstanceOf(CommercialDocumentLine::class, $model2->lines->results[0]);
            $this->assertInstanceOf(CommercialDocumentLine::class, $model2->lines->results[1]);
            $this->assertEquals(2, count($model2->lines->results));
            $this->assertEquals(2, $model2->lines->totalResults);
            $this->assertEquals(2, $model2->lines->returnedResults);

            $this->assertEquals(1, $model2->salesRepresentative->id);
            $this->assertEquals('sample string 2', $model2->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $model2->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model2->salesRepresentative->name);
            $this->assertEquals(true, $model2->salesRepresentative->active);
            $this->assertEquals('sample string 6', $model2->salesRepresentative->email);
            $this->assertEquals('sample string 7', $model2->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $model2->salesRepresentative->telephone);
            $this->assertEquals('2017-07-17', $model2->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->salesRepresentative->modified->format('Y-m-d'));

            $this->assertEquals(1, $model2->customer->defaultTaxType->id);
            $this->assertEquals('sample string 2', $model2->customer->defaultTaxType->name);
            $this->assertEquals(3.1, $model2->customer->defaultTaxType->percentage);
            $this->assertEquals(true, $model2->customer->defaultTaxType->isDefault);
            $this->assertEquals(true, $model2->customer->defaultTaxType->hasActivity);
            $this->assertEquals(true, $model2->customer->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-17', $model2->customer->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->customer->defaultTaxType->modified->format('Y-m-d'));

            $this->assertEquals('sample string 1', $model2->customer->category->description);
            $this->assertEquals(2, $model2->customer->category->id);
            $this->assertEquals('2017-07-17', $model2->customer->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model2->customer->category->created->format('Y-m-d'));

            $line1 = $model2->lines->results[0];
            $line2 = $model2->lines->results[1];

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
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(TaxInvoice::class, 36, function ($model) {
            $this->assertInstanceOf(TaxInvoice::class, $model);
            $this->assertEquals('2017-07-17', $model->dueDate->format('Y-m-d'));
            $this->assertEquals('sample string 1', $model->fromDocument);
            $this->assertEquals(1, $model->fromDocumentId);
            $this->assertEquals(1, $model->fromDocumentTypeId);
            $this->assertEquals(true, $model->allowOnlinePayment);
            $this->assertEquals(true, $model->paid);
            $this->assertEquals('Paid', $model->status);
            $this->assertEquals(true, $model->locked);
            $this->assertEquals(3, $model->customerId);
            $this->assertEquals('sample string 4', $model->customerName);
            $this->assertEquals(1, $model->statusId);
            $this->assertEquals('2017-07-17', $model->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->created->format('Y-m-d'));
            $this->assertEquals(1, $model->customer_CurrencyId);
            $this->assertEquals(1.0, $model->customer_ExchangeRate);
            $this->assertEquals(6, $model->id);
            $this->assertEquals('2017-07-17', $model->date->format('Y-m-d'));
            $this->assertEquals(true, $model->inclusive);
            $this->assertEquals(8.1, $model->discountPercentage);
            $this->assertEquals('sample string 9', $model->taxReference);
            $this->assertEquals('sample string 10', $model->documentNumber);
            $this->assertEquals('sample string 11', $model->reference);
            $this->assertEquals('sample string 12', $model->message);
            $this->assertEquals(13.0, $model->discount);
            $this->assertEquals(14.0, $model->exclusive);
            $this->assertEquals(15.0, $model->tax);
            $this->assertEquals(16.0, $model->rounding);
            $this->assertEquals(17.0, $model->total);
            $this->assertEquals(18.0, $model->amountDue);
            $this->assertEquals('sample string 19', $model->postalAddress01);
            $this->assertEquals('sample string 20', $model->postalAddress02);
            $this->assertEquals('sample string 21', $model->postalAddress03);
            $this->assertEquals('sample string 22', $model->postalAddress04);
            $this->assertEquals('sample string 23', $model->postalAddress05);
            $this->assertEquals('sample string 24', $model->deliveryAddress01);
            $this->assertEquals('sample string 25', $model->deliveryAddress02);
            $this->assertEquals('sample string 26', $model->deliveryAddress03);
            $this->assertEquals('sample string 27', $model->deliveryAddress04);
            $this->assertEquals('sample string 28', $model->deliveryAddress05);
            $this->assertEquals(true, $model->printed);
            $this->assertEquals(1, $model->taxPeriodId);
            $this->assertEquals(true, $model->editable);
            $this->assertEquals(true, $model->hasAttachments);
            $this->assertEquals(true, $model->hasNotes);
            $this->assertEquals(true, $model->hasAnticipatedDate);
            $this->assertEquals('2017-07-17', $model->anticipatedDate->format('Y-m-d'));
            $this->assertEquals('sample string 32', $model->externalReference);

            $this->assertInstanceOf(Customer::class, $model->customer);
            $this->assertInstanceOf(CustomerCategory::class, $model->customer->category);
            $this->assertInstanceOf(SalesRepresentative::class, $model->customer->salesRepresentative);
            $this->assertInstanceOf(AdditionalPriceList::class, $model->customer->defaultPriceList);
            $this->assertInstanceOf(TaxType::class, $model->customer->defaultTaxType);

            $this->assertEquals('sample string 1', $model->customer->name);
            $this->assertEquals(1, $model->customer->salesRepresentativeId);
            $this->assertEquals('sample string 2', $model->customer->taxReference);
            $this->assertEquals('sample string 3', $model->customer->contactName);
            $this->assertEquals('sample string 4', $model->customer->telephone);
            $this->assertEquals('sample string 5', $model->customer->fax);
            $this->assertEquals('sample string 6', $model->customer->mobile);
            $this->assertEquals('sample string 7', $model->customer->email);
            $this->assertEquals('sample string 8', $model->customer->webAddress);
            $this->assertEquals(true, $model->customer->active);
            $this->assertEquals(10.0, $model->customer->balance);
            $this->assertEquals(11.0, $model->customer->creditLimit);
            $this->assertEquals(1, $model->customer->communicationMethod);
            $this->assertEquals('sample string 12', $model->customer->postalAddress01);
            $this->assertEquals('sample string 13', $model->customer->postalAddress02);
            $this->assertEquals('sample string 14', $model->customer->postalAddress03);
            $this->assertEquals('sample string 15', $model->customer->postalAddress04);
            $this->assertEquals('sample string 16', $model->customer->postalAddress05);
            $this->assertEquals('sample string 17', $model->customer->deliveryAddress01);
            $this->assertEquals('sample string 18', $model->customer->deliveryAddress02);
            $this->assertEquals('sample string 19', $model->customer->deliveryAddress03);
            $this->assertEquals('sample string 20', $model->customer->deliveryAddress04);
            $this->assertEquals('sample string 21', $model->customer->deliveryAddress05);
            $this->assertEquals(true, $model->customer->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $model->customer->enableCustomerZone);
            $this->assertEquals('118258bb-a539-40bb-bb74-d08591e0685a', $model->customer->customerZoneGuid);
            $this->assertEquals(true, $model->customer->cashSale);
            $this->assertEquals('sample string 24', $model->customer->textField1);
            $this->assertEquals('sample string 25', $model->customer->textField2);
            $this->assertEquals('sample string 26', $model->customer->textField3);
            $this->assertEquals(1.0, $model->customer->numericField1);
            $this->assertEquals(1.0, $model->customer->numericField2);
            $this->assertEquals(1.0, $model->customer->numericField3);
            $this->assertEquals(true, $model->customer->yesNoField1);
            $this->assertEquals(true, $model->customer->yesNoField2);
            $this->assertEquals(true, $model->customer->yesNoField3);
            $this->assertEquals('2017-07-17', $model->customer->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->customer->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->customer->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $model->customer->defaultPriceListId);
            $this->assertEquals("sample string 2", $model->customer->defaultPriceListName);
            $this->assertEquals(true, $model->customer->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-17', $model->customer->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->customer->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $model->customer->businessRegistrationNumber);
            $this->assertEquals('2017-07-17', $model->customer->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $model->customer->currencyId);
            $this->assertEquals('sample string 34', $model->customer->currencySymbol);
            $this->assertEquals(true, $model->customer->hasActivity);
            $this->assertEquals(1.0, $model->customer->defaultDiscountPercentage);
            $this->assertEquals(1, $model->customer->defaultTaxTypeId);
            $this->assertEquals(1, $model->customer->dueDateMethodId);
            $this->assertEquals(1, $model->customer->dueDateMethodValue);
            $this->assertEquals(36, $model->customer->id);

            $this->assertInstanceOf(SalesRepresentative::class, $model->salesRepresentative);
            $this->assertInstanceOf(ModelCollection::class, $model->lines);
            $this->assertInstanceOf(CommercialDocumentLine::class, $model->lines->results[0]);
            $this->assertInstanceOf(CommercialDocumentLine::class, $model->lines->results[1]);
            $this->assertEquals(2, count($model->lines->results));
            $this->assertEquals(2, $model->lines->totalResults);
            $this->assertEquals(2, $model->lines->returnedResults);

            $this->assertEquals(1, $model->salesRepresentative->id);
            $this->assertEquals('sample string 2', $model->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $model->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model->salesRepresentative->name);
            $this->assertEquals(true, $model->salesRepresentative->active);
            $this->assertEquals('sample string 6', $model->salesRepresentative->email);
            $this->assertEquals('sample string 7', $model->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $model->salesRepresentative->telephone);
            $this->assertEquals('2017-07-17', $model->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->salesRepresentative->modified->format('Y-m-d'));

            $this->assertEquals(1, $model->customer->defaultTaxType->id);
            $this->assertEquals('sample string 2', $model->customer->defaultTaxType->name);
            $this->assertEquals(3.1, $model->customer->defaultTaxType->percentage);
            $this->assertEquals(true, $model->customer->defaultTaxType->isDefault);
            $this->assertEquals(true, $model->customer->defaultTaxType->hasActivity);
            $this->assertEquals(true, $model->customer->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-17', $model->customer->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->customer->defaultTaxType->modified->format('Y-m-d'));

            $this->assertEquals('sample string 1', $model->customer->category->description);
            $this->assertEquals(2, $model->customer->category->id);
            $this->assertEquals('2017-07-17', $model->customer->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->customer->category->created->format('Y-m-d'));

            $line1 = $model->lines->results[0];
            $line2 = $model->lines->results[1];

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
        });
    }

    public function testSave()
    {
        $this->verifySave(TaxInvoice::class, function ($model) {
            $model->dueDate = '2017-07-17';
            $model->fromDocument = 'sample string 1';
            $model->allowOnlinePayment = true;
            $model->customerName = 'sample string 4';
            $model->customer_CurrencyId = 1;
            $model->customer_ExchangeRate = 1.0;
            $model->inclusive = true;
            $model->taxReference = 'sample string 9';
            $model->message = 'sample string 12';
            $model->discountPercentage = 8.1;
        }, function ($savedModel) {
            $this->assertInstanceOf(TaxInvoice::class, $savedModel);
            $this->assertEquals('2017-07-17', $savedModel->dueDate->format('Y-m-d'));
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
            $this->assertEquals('2017-07-17', $savedModel->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->created->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->customer_CurrencyId);
            $this->assertEquals(1.0, $savedModel->customer_ExchangeRate);
            $this->assertEquals(6, $savedModel->id);
            $this->assertEquals('2017-07-17', $savedModel->date->format('Y-m-d'));
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
            $this->assertEquals('2017-07-17', $savedModel->anticipatedDate->format('Y-m-d'));
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
            $this->assertEquals('sample string 7', $savedModel->customer->email);
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
            $this->assertEquals('b260da05-39fc-4129-aa66-e82fd406debc', $savedModel->customer->customerZoneGuid);
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
            $this->assertEquals('2017-07-17', $savedModel->customer->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->customer->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->customer->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->customer->defaultPriceListId);
            $this->assertEquals("sample string 2", $savedModel->customer->defaultPriceListName);
            $this->assertEquals(true, $savedModel->customer->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-17', $savedModel->customer->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->customer->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $savedModel->customer->businessRegistrationNumber);
            $this->assertEquals('2017-07-17', $savedModel->customer->taxStatusVerified->format('Y-m-d'));
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
            $this->assertEquals('2017-07-17', $savedModel->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->salesRepresentative->modified->format('Y-m-d'));

            $this->assertEquals(1, $savedModel->customer->defaultTaxType->id);
            $this->assertEquals('sample string 2', $savedModel->customer->defaultTaxType->name);
            $this->assertEquals(3.1, $savedModel->customer->defaultTaxType->percentage);
            $this->assertEquals(true, $savedModel->customer->defaultTaxType->isDefault);
            $this->assertEquals(true, $savedModel->customer->defaultTaxType->hasActivity);
            $this->assertEquals(true, $savedModel->customer->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-17', $savedModel->customer->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->customer->defaultTaxType->modified->format('Y-m-d'));

            $this->assertEquals('sample string 1', $savedModel->customer->category->description);
            $this->assertEquals(2, $savedModel->customer->category->id);
            $this->assertEquals('2017-07-17', $savedModel->customer->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->customer->category->created->format('Y-m-d'));

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
        });
    }

    public function testEmail()
    {
        $data = json_decode(
            file_get_contents(__DIR__ . "/../../mocks/TaxInvoice/POST_TaxInvoice_Email_REQ.json"),
            true
        );

        $model = $this->setUpRequestMock(
            'POST',
            TaxInvoice::class,
            'TaxInvoice/Email',
            null,
            'TaxInvoice/POST_TaxInvoice_Email_REQ.json',
            $data
        );

        // TODO we need some response
        $this->assertNull($model->email($data));
    }

    public function testEmailDeliveryNote()
    {
        $data = json_decode(
            file_get_contents(__DIR__ . "/../../mocks/TaxInvoice/POST_TaxInvoice_EmailDeliveryNote_REQ.json"),
            true
        );

        $model = $this->setUpRequestMock(
            'POST',
            TaxInvoice::class,
            'TaxInvoice/EmailDeliveryNote',
            null,
            'TaxInvoice/POST_TaxInvoice_EmailDeliveryNote_REQ.json',
            $data
        );

        // TODO we need some response
        $this->assertNull($model->emailDeliveryNote($data));
    }

    public function testCalculate()
    {
        $model = $this->setUpRequestMock(
            'POST',
            TaxInvoice::class,
            'TaxInvoice/Calculate',
            'TaxInvoice/POST_TaxInvoice_Calculate_REQ.json',
            'TaxInvoice/POST_TaxInvoice_Calculate_RESP.json'
        );

        $calculated = $model->calculate();
        $newModel = new TaxInvoice($this->config);
        $newModel->loadResult($calculated);

        $this->assertEquals('2017-07-17', $newModel->dueDate->format('Y-m-d'));
        $this->assertEquals('sample string 1', $newModel->fromDocument);
        $this->assertEquals(1, $newModel->fromDocumentId);
        $this->assertEquals(1, $newModel->fromDocumentTypeId);
        $this->assertEquals(true, $newModel->allowOnlinePayment);
        $this->assertEquals(true, $newModel->paid);
        $this->assertEquals('Paid', $newModel->status);
        $this->assertEquals(true, $newModel->locked);
        $this->assertEquals(3, $newModel->customerId);
        $this->assertEquals('sample string 4', $newModel->customerName);
        $this->assertEquals(1, $newModel->statusId);
        $this->assertEquals('2017-07-17', $newModel->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->created->format('Y-m-d'));
        $this->assertEquals(1, $newModel->customer_CurrencyId);
        $this->assertEquals(1.0, $newModel->customer_ExchangeRate);
        $this->assertEquals(6, $newModel->id);
        $this->assertEquals('2017-07-17', $newModel->date->format('Y-m-d'));
        $this->assertEquals(true, $newModel->inclusive);
        $this->assertEquals(8.1, $newModel->discountPercentage);
        $this->assertEquals('sample string 9', $newModel->taxReference);
        $this->assertEquals('sample string 10', $newModel->documentNumber);
        $this->assertEquals('sample string 11', $newModel->reference);
        $this->assertEquals('sample string 12', $newModel->message);
        $this->assertEquals(13.0, $newModel->discount);
        $this->assertEquals(14.0, $newModel->exclusive);
        $this->assertEquals(15.0, $newModel->tax);
        $this->assertEquals(16.0, $newModel->rounding);
        $this->assertEquals(17.0, $newModel->total);
        $this->assertEquals(18.0, $newModel->amountDue);
        $this->assertEquals('sample string 19', $newModel->postalAddress01);
        $this->assertEquals('sample string 20', $newModel->postalAddress02);
        $this->assertEquals('sample string 21', $newModel->postalAddress03);
        $this->assertEquals('sample string 22', $newModel->postalAddress04);
        $this->assertEquals('sample string 23', $newModel->postalAddress05);
        $this->assertEquals('sample string 24', $newModel->deliveryAddress01);
        $this->assertEquals('sample string 25', $newModel->deliveryAddress02);
        $this->assertEquals('sample string 26', $newModel->deliveryAddress03);
        $this->assertEquals('sample string 27', $newModel->deliveryAddress04);
        $this->assertEquals('sample string 28', $newModel->deliveryAddress05);
        $this->assertEquals(true, $newModel->printed);
        $this->assertEquals(1, $newModel->taxPeriodId);
        $this->assertEquals(true, $newModel->editable);
        $this->assertEquals(true, $newModel->hasAttachments);
        $this->assertEquals(true, $newModel->hasNotes);
        $this->assertEquals(true, $newModel->hasAnticipatedDate);
        $this->assertEquals('2017-07-17', $newModel->anticipatedDate->format('Y-m-d'));
        $this->assertEquals('sample string 32', $newModel->externalReference);

        $this->assertInstanceOf(Customer::class, $newModel->customer);
        $this->assertInstanceOf(CustomerCategory::class, $newModel->customer->category);
        $this->assertInstanceOf(SalesRepresentative::class, $newModel->customer->salesRepresentative);
        $this->assertInstanceOf(AdditionalPriceList::class, $newModel->customer->defaultPriceList);
        $this->assertInstanceOf(TaxType::class, $newModel->customer->defaultTaxType);

        $this->assertEquals('sample string 1', $newModel->customer->name);
        $this->assertEquals(1, $newModel->customer->salesRepresentativeId);
        $this->assertEquals('sample string 2', $newModel->customer->taxReference);
        $this->assertEquals('sample string 3', $newModel->customer->contactName);
        $this->assertEquals('sample string 4', $newModel->customer->telephone);
        $this->assertEquals('sample string 5', $newModel->customer->fax);
        $this->assertEquals('sample string 6', $newModel->customer->mobile);
        $this->assertEquals('sample string 7', $newModel->customer->email);
        $this->assertEquals('sample string 8', $newModel->customer->webAddress);
        $this->assertEquals(true, $newModel->customer->active);
        $this->assertEquals(10.0, $newModel->customer->balance);
        $this->assertEquals(11.0, $newModel->customer->creditLimit);
        $this->assertEquals(1, $newModel->customer->communicationMethod);
        $this->assertEquals('sample string 12', $newModel->customer->postalAddress01);
        $this->assertEquals('sample string 13', $newModel->customer->postalAddress02);
        $this->assertEquals('sample string 14', $newModel->customer->postalAddress03);
        $this->assertEquals('sample string 15', $newModel->customer->postalAddress04);
        $this->assertEquals('sample string 16', $newModel->customer->postalAddress05);
        $this->assertEquals('sample string 17', $newModel->customer->deliveryAddress01);
        $this->assertEquals('sample string 18', $newModel->customer->deliveryAddress02);
        $this->assertEquals('sample string 19', $newModel->customer->deliveryAddress03);
        $this->assertEquals('sample string 20', $newModel->customer->deliveryAddress04);
        $this->assertEquals('sample string 21', $newModel->customer->deliveryAddress05);
        $this->assertEquals(true, $newModel->customer->autoAllocateToOldestInvoice);
        $this->assertEquals(true, $newModel->customer->enableCustomerZone);
        $this->assertEquals('6aa03d78-0ed7-4a94-816c-54fd63878553', $newModel->customer->customerZoneGuid);
        $this->assertEquals(true, $newModel->customer->cashSale);
        $this->assertEquals('sample string 24', $newModel->customer->textField1);
        $this->assertEquals('sample string 25', $newModel->customer->textField2);
        $this->assertEquals('sample string 26', $newModel->customer->textField3);
        $this->assertEquals(1.0, $newModel->customer->numericField1);
        $this->assertEquals(1.0, $newModel->customer->numericField2);
        $this->assertEquals(1.0, $newModel->customer->numericField3);
        $this->assertEquals(true, $newModel->customer->yesNoField1);
        $this->assertEquals(true, $newModel->customer->yesNoField2);
        $this->assertEquals(true, $newModel->customer->yesNoField3);
        $this->assertEquals('2017-07-17', $newModel->customer->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->customer->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->customer->dateField3->format('Y-m-d'));
        $this->assertEquals(1, $newModel->customer->defaultPriceListId);
        $this->assertEquals("sample string 2", $newModel->customer->defaultPriceListName);
        $this->assertEquals(true, $newModel->customer->acceptsElectronicInvoices);
        $this->assertEquals('2017-07-17', $newModel->customer->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->customer->created->format('Y-m-d'));
        $this->assertEquals('sample string 33', $newModel->customer->businessRegistrationNumber);
        $this->assertEquals('2017-07-17', $newModel->customer->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $newModel->customer->currencyId);
        $this->assertEquals('sample string 34', $newModel->customer->currencySymbol);
        $this->assertEquals(true, $newModel->customer->hasActivity);
        $this->assertEquals(1.0, $newModel->customer->defaultDiscountPercentage);
        $this->assertEquals(1, $newModel->customer->defaultTaxTypeId);
        $this->assertEquals(1, $newModel->customer->dueDateMethodId);
        $this->assertEquals(1, $newModel->customer->dueDateMethodValue);
        $this->assertEquals(36, $newModel->customer->id);

        $this->assertInstanceOf(SalesRepresentative::class, $newModel->salesRepresentative);
        $this->assertInstanceOf(ModelCollection::class, $newModel->lines);
        $this->assertInstanceOf(CommercialDocumentLine::class, $newModel->lines->results[0]);
        $this->assertInstanceOf(CommercialDocumentLine::class, $newModel->lines->results[1]);
        $this->assertEquals(2, count($newModel->lines->results));
        $this->assertEquals(2, $newModel->lines->totalResults);
        $this->assertEquals(2, $newModel->lines->returnedResults);

        $this->assertEquals(1, $newModel->salesRepresentative->id);
        $this->assertEquals('sample string 2', $newModel->salesRepresentative->firstName);
        $this->assertEquals('sample string 3', $newModel->salesRepresentative->lastName);
        $this->assertEquals('sample string 2 sample string 3', $newModel->salesRepresentative->name);
        $this->assertEquals(true, $newModel->salesRepresentative->active);
        $this->assertEquals('sample string 6', $newModel->salesRepresentative->email);
        $this->assertEquals('sample string 7', $newModel->salesRepresentative->mobile);
        $this->assertEquals('sample string 8', $newModel->salesRepresentative->telephone);
        $this->assertEquals('2017-07-17', $newModel->salesRepresentative->created->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->salesRepresentative->modified->format('Y-m-d'));

        $this->assertEquals(1, $newModel->customer->defaultTaxType->id);
        $this->assertEquals('sample string 2', $newModel->customer->defaultTaxType->name);
        $this->assertEquals(3.1, $newModel->customer->defaultTaxType->percentage);
        $this->assertEquals(true, $newModel->customer->defaultTaxType->isDefault);
        $this->assertEquals(true, $newModel->customer->defaultTaxType->hasActivity);
        $this->assertEquals(true, $newModel->customer->defaultTaxType->isManualTax);
        $this->assertEquals('2017-07-17', $newModel->customer->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->customer->defaultTaxType->modified->format('Y-m-d'));

        $this->assertEquals('sample string 1', $newModel->customer->category->description);
        $this->assertEquals(2, $newModel->customer->category->id);
        $this->assertEquals('2017-07-17', $newModel->customer->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-17', $newModel->customer->category->created->format('Y-m-d'));

        $line1 = $newModel->lines->results[0];
        $line2 = $newModel->lines->results[1];

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
    }
}
