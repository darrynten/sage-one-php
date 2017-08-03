<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierReturn;
use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\CommercialDocumentLine;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierReturnModelTest extends BaseModelTest
{
    public function testAttributes()
    {
        $this->verifyAttributes(SupplierReturn::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'fromDocument' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'locked' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'supplierId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'supplierName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'supplier' => [
                'type' => 'Supplier',
                'nullable' => false,
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
        $this->verifyFeatures(SupplierReturn::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testAll()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierReturn::class,
            'SupplierReturn/Get',
            'SupplierReturn/GET_SupplierReturn_Get_includeDetail.json',
            null,
            ['includeDetail' => true]
        );

        $response = $model->all(['includeDetail' => true]);
        $this->assertInstanceOf(ModelCollection::class, $response);
        $this->assertCount(2, $response->results);
        $model1 = $response->results[0];
        $model2 = $response->results[1];

        $this->assertEquals('sample string 1', $model1->fromDocument);
        $this->assertEquals(true, $model1->locked);
        $this->assertEquals(3, $model1->supplierId);
        $this->assertEquals('sample string 4', $model1->supplierName);
        $this->assertInstanceOf(Supplier::class, $model1->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $model1->supplier->category);
        $this->assertEquals('sample string 1', $model1->supplier->category->description);
        $this->assertEquals(2, $model1->supplier->category->id);
        $this->assertEquals('2017-08-02', $model1->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model1->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 1', $model1->supplier->name);
        $this->assertEquals('sample string 2', $model1->supplier->taxReference);
        $this->assertEquals('sample string 3', $model1->supplier->contactName);
        $this->assertEquals('sample string 4', $model1->supplier->telephone);
        $this->assertEquals('sample string 5', $model1->supplier->fax);
        $this->assertEquals('sample string 6', $model1->supplier->mobile);
        $this->assertEquals('sample string 7', $model1->supplier->email);
        $this->assertEquals('sample string 8', $model1->supplier->webAddress);
        $this->assertEquals(true, $model1->supplier->active);
        $this->assertEquals(10.0, $model1->supplier->balance);
        $this->assertEquals(11.0, $model1->supplier->creditLimit);
        $this->assertEquals('sample string 12', $model1->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $model1->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $model1->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $model1->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $model1->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $model1->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $model1->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $model1->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $model1->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $model1->supplier->deliveryAddress05);
        $this->assertEquals(true, $model1->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $model1->supplier->textField1);
        $this->assertEquals('sample string 23', $model1->supplier->textField2);
        $this->assertEquals('sample string 24', $model1->supplier->textField3);
        $this->assertEquals(1.0, $model1->supplier->numericField1);
        $this->assertEquals(1.0, $model1->supplier->numericField2);
        $this->assertEquals(1.0, $model1->supplier->numericField3);
        $this->assertEquals(true, $model1->supplier->yesNoField1);
        $this->assertEquals(true, $model1->supplier->yesNoField2);
        $this->assertEquals(true, $model1->supplier->yesNoField3);
        $this->assertEquals('2017-08-02', $model1->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model1->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model1->supplier->dateField3->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model1->supplier->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model1->supplier->created->format('Y-m-d'));
        $this->assertEquals('sample string 29', $model1->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $model1->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-08-02', $model1->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $model1->supplier->currencyId);
        $this->assertEquals('sample string 31', $model1->supplier->currencySymbol);
        $this->assertEquals(true, $model1->supplier->hasActivity);
        $this->assertEquals(1.0, $model1->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $model1->supplier->defaultTaxTypeId);
        $this->assertEquals(1, $model1->supplier->dueDateMethodId);
        $this->assertEquals(1, $model1->supplier->dueDateMethodValue);
        $this->assertEquals(33, $model1->supplier->id);
        $this->assertInstanceOf(TaxType::class, $model1->supplier->defaultTaxType);
        $this->assertEquals(1, $model1->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $model1->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $model1->supplier->defaultTaxType->percentage);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-08-02', $model1->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model1->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $model1->supplier_CurrencyId);
        $this->assertEquals(1.0, $model1->supplier_ExchangeRate);
        $this->assertEquals(6, $model1->id);
        $this->assertEquals('2017-08-02', $model1->date->format('Y-m-d'));
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
        $this->assertEquals(1, $model1->taxPeriodId);
        $this->assertEquals(true, $model1->editable);
        $this->assertEquals(true, $model1->hasAttachments);
        $this->assertEquals(true, $model1->hasNotes);
        $this->assertEquals(true, $model1->hasAnticipatedDate);
        $this->assertEquals('2017-08-02', $model1->anticipatedDate->format('Y-m-d'));
        $this->assertEquals('sample string 32', $model1->externalReference);
        $this->assertInstanceOf(ModelCollection::class, $model1->lines);
        $this->assertCount(2, $model1->lines->results);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model1->lines->results[0]);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model1->lines->results[1]);
        $this->assertEquals(1, $model1->lines->results[0]->selectionId);
        $this->assertEquals(1, $model1->lines->results[0]->taxTypeId);
        $this->assertEquals(1, $model1->lines->results[0]->id);
        $this->assertEquals('sample string 2', $model1->lines->results[0]->description);
        $this->assertEquals(0, $model1->lines->results[0]->lineType);
        $this->assertEquals(1.0, $model1->lines->results[0]->quantity);
        $this->assertEquals(3.0, $model1->lines->results[0]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model1->lines->results[0]->unit);
        $this->assertEquals(5.0, $model1->lines->results[0]->unitPriceInclusive);
        $this->assertEquals(6.1, $model1->lines->results[0]->taxPercentage);
        $this->assertEquals(7.1, $model1->lines->results[0]->discountPercentage);
        $this->assertEquals(8.0, $model1->lines->results[0]->exclusive);
        $this->assertEquals(9.0, $model1->lines->results[0]->discount);
        $this->assertEquals(10.0, $model1->lines->results[0]->tax);
        $this->assertEquals(11.0, $model1->lines->results[0]->total);
        $this->assertEquals('sample string 12', $model1->lines->results[0]->comments);
        $this->assertEquals(1, $model1->lines->results[0]->analysisCategoryId1);
        $this->assertEquals(1, $model1->lines->results[0]->analysisCategoryId2);
        $this->assertEquals(1, $model1->lines->results[0]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model1->lines->results[0]->$key);
        $this->assertEquals(1, $model1->lines->results[0]->currencyId);
        $this->assertEquals(1.0, $model1->lines->results[0]->unitCost);
        $this->assertEquals(1, $model1->lines->results[0]->selectionId);
        $this->assertEquals(1, $model1->lines->results[1]->taxTypeId);
        $this->assertEquals(1, $model1->lines->results[1]->id);
        $this->assertEquals('sample string 2', $model1->lines->results[1]->description);
        $this->assertEquals(0, $model1->lines->results[1]->lineType);
        $this->assertEquals(1.0, $model1->lines->results[1]->quantity);
        $this->assertEquals(3.0, $model1->lines->results[1]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model1->lines->results[1]->unit);
        $this->assertEquals(5.0, $model1->lines->results[1]->unitPriceInclusive);
        $this->assertEquals(6.1, $model1->lines->results[1]->taxPercentage);
        $this->assertEquals(7.1, $model1->lines->results[1]->discountPercentage);
        $this->assertEquals(8.0, $model1->lines->results[1]->exclusive);
        $this->assertEquals(9.0, $model1->lines->results[1]->discount);
        $this->assertEquals(10.0, $model1->lines->results[1]->tax);
        $this->assertEquals(11.0, $model1->lines->results[1]->total);
        $this->assertEquals('sample string 12', $model1->lines->results[1]->comments);
        $this->assertEquals(1, $model1->lines->results[1]->analysisCategoryId1);
        $this->assertEquals(1, $model1->lines->results[1]->analysisCategoryId2);
        $this->assertEquals(1, $model1->lines->results[1]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model1->lines->results[1]->$key);
        $this->assertEquals(1, $model1->lines->results[1]->currencyId);
        $this->assertEquals(1.0, $model1->lines->results[1]->unitCost);

        $this->assertEquals('sample string 1', $model2->fromDocument);
        $this->assertEquals(true, $model2->locked);
        $this->assertEquals(3, $model2->supplierId);
        $this->assertEquals('sample string 4', $model2->supplierName);
        $this->assertInstanceOf(Supplier::class, $model2->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $model2->supplier->category);
        $this->assertEquals('sample string 1', $model2->supplier->category->description);
        $this->assertEquals(2, $model2->supplier->category->id);
        $this->assertEquals('2017-08-02', $model2->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model2->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 1', $model2->supplier->name);
        $this->assertEquals('sample string 2', $model2->supplier->taxReference);
        $this->assertEquals('sample string 3', $model2->supplier->contactName);
        $this->assertEquals('sample string 4', $model2->supplier->telephone);
        $this->assertEquals('sample string 5', $model2->supplier->fax);
        $this->assertEquals('sample string 6', $model2->supplier->mobile);
        $this->assertEquals('sample string 7', $model2->supplier->email);
        $this->assertEquals('sample string 8', $model2->supplier->webAddress);
        $this->assertEquals(true, $model2->supplier->active);
        $this->assertEquals(10.0, $model2->supplier->balance);
        $this->assertEquals(11.0, $model2->supplier->creditLimit);
        $this->assertEquals('sample string 12', $model2->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $model2->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $model2->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $model2->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $model2->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $model2->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $model2->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $model2->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $model2->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $model2->supplier->deliveryAddress05);
        $this->assertEquals(true, $model2->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $model2->supplier->textField1);
        $this->assertEquals('sample string 23', $model2->supplier->textField2);
        $this->assertEquals('sample string 24', $model2->supplier->textField3);
        $this->assertEquals(1.0, $model2->supplier->numericField1);
        $this->assertEquals(1.0, $model2->supplier->numericField2);
        $this->assertEquals(1.0, $model2->supplier->numericField3);
        $this->assertEquals(true, $model2->supplier->yesNoField1);
        $this->assertEquals(true, $model2->supplier->yesNoField2);
        $this->assertEquals(true, $model2->supplier->yesNoField3);
        $this->assertEquals('2017-08-02', $model2->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model2->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model2->supplier->dateField3->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model2->supplier->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model2->supplier->created->format('Y-m-d'));
        $this->assertEquals('sample string 29', $model2->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $model2->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-08-02', $model2->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $model2->supplier->currencyId);
        $this->assertEquals('sample string 31', $model2->supplier->currencySymbol);
        $this->assertEquals(true, $model2->supplier->hasActivity);
        $this->assertEquals(1.0, $model2->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $model2->supplier->defaultTaxTypeId);
        $this->assertEquals(1, $model2->supplier->dueDateMethodId);
        $this->assertEquals(1, $model2->supplier->dueDateMethodValue);
        $this->assertEquals(33, $model2->supplier->id);
        $this->assertInstanceOf(TaxType::class, $model2->supplier->defaultTaxType);
        $this->assertEquals(1, $model2->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $model2->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $model2->supplier->defaultTaxType->percentage);
        $this->assertEquals(true, $model2->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model2->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model2->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-08-02', $model2->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model2->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $model2->supplier_CurrencyId);
        $this->assertEquals(1.0, $model2->supplier_ExchangeRate);
        $this->assertEquals(6, $model2->id);
        $this->assertEquals('2017-08-02', $model2->date->format('Y-m-d'));
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
        $this->assertEquals(1, $model2->taxPeriodId);
        $this->assertEquals(true, $model2->editable);
        $this->assertEquals(true, $model2->hasAttachments);
        $this->assertEquals(true, $model2->hasNotes);
        $this->assertEquals(true, $model2->hasAnticipatedDate);
        $this->assertEquals('2017-08-02', $model2->anticipatedDate->format('Y-m-d'));
        $this->assertEquals('sample string 32', $model2->externalReference);
        $this->assertInstanceOf(ModelCollection::class, $model2->lines);
        $this->assertCount(2, $model2->lines->results);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model2->lines->results[0]);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model2->lines->results[1]);
        $this->assertEquals(1, $model2->lines->results[0]->selectionId);
        $this->assertEquals(1, $model2->lines->results[0]->taxTypeId);
        $this->assertEquals(1, $model2->lines->results[0]->id);
        $this->assertEquals('sample string 2', $model2->lines->results[0]->description);
        $this->assertEquals(0, $model2->lines->results[0]->lineType);
        $this->assertEquals(1.0, $model2->lines->results[0]->quantity);
        $this->assertEquals(3.0, $model2->lines->results[0]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model2->lines->results[0]->unit);
        $this->assertEquals(5.0, $model2->lines->results[0]->unitPriceInclusive);
        $this->assertEquals(6.1, $model2->lines->results[0]->taxPercentage);
        $this->assertEquals(7.1, $model2->lines->results[0]->discountPercentage);
        $this->assertEquals(8.0, $model2->lines->results[0]->exclusive);
        $this->assertEquals(9.0, $model2->lines->results[0]->discount);
        $this->assertEquals(10.0, $model2->lines->results[0]->tax);
        $this->assertEquals(11.0, $model2->lines->results[0]->total);
        $this->assertEquals('sample string 12', $model2->lines->results[0]->comments);
        $this->assertEquals(1, $model2->lines->results[0]->analysisCategoryId1);
        $this->assertEquals(1, $model2->lines->results[0]->analysisCategoryId2);
        $this->assertEquals(1, $model2->lines->results[0]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model2->lines->results[0]->$key);
        $this->assertEquals(1, $model2->lines->results[0]->currencyId);
        $this->assertEquals(1.0, $model2->lines->results[0]->unitCost);
        $this->assertEquals(1, $model2->lines->results[0]->selectionId);
        $this->assertEquals(1, $model2->lines->results[1]->taxTypeId);
        $this->assertEquals(1, $model2->lines->results[1]->id);
        $this->assertEquals('sample string 2', $model2->lines->results[1]->description);
        $this->assertEquals(0, $model2->lines->results[1]->lineType);
        $this->assertEquals(1.0, $model2->lines->results[1]->quantity);
        $this->assertEquals(3.0, $model2->lines->results[1]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model2->lines->results[1]->unit);
        $this->assertEquals(5.0, $model2->lines->results[1]->unitPriceInclusive);
        $this->assertEquals(6.1, $model2->lines->results[1]->taxPercentage);
        $this->assertEquals(7.1, $model2->lines->results[1]->discountPercentage);
        $this->assertEquals(8.0, $model2->lines->results[1]->exclusive);
        $this->assertEquals(9.0, $model2->lines->results[1]->discount);
        $this->assertEquals(10.0, $model2->lines->results[1]->tax);
        $this->assertEquals(11.0, $model2->lines->results[1]->total);
        $this->assertEquals('sample string 12', $model2->lines->results[1]->comments);
        $this->assertEquals(1, $model2->lines->results[1]->analysisCategoryId1);
        $this->assertEquals(1, $model2->lines->results[1]->analysisCategoryId2);
        $this->assertEquals(1, $model2->lines->results[1]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model2->lines->results[1]->$key);
        $this->assertEquals(1, $model2->lines->results[1]->currencyId);
        $this->assertEquals(1.0, $model2->lines->results[1]->unitCost);
    }

    public function testGetId()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierReturn::class,
            'SupplierReturn/Get/6',
            'SupplierReturn/GET_SupplierReturn_Get_xx.json'
        );

        $model = $model->get(6);
        $this->assertEquals('sample string 1', $model->fromDocument);
        $this->assertEquals(true, $model->locked);
        $this->assertEquals(3, $model->supplierId);
        $this->assertEquals('sample string 4', $model->supplierName);
        $this->assertInstanceOf(Supplier::class, $model->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $model->supplier->category);
        $this->assertEquals('sample string 1', $model->supplier->category->description);
        $this->assertEquals(2, $model->supplier->category->id);
        $this->assertEquals('2017-08-02', $model->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 1', $model->supplier->name);
        $this->assertEquals('sample string 2', $model->supplier->taxReference);
        $this->assertEquals('sample string 3', $model->supplier->contactName);
        $this->assertEquals('sample string 4', $model->supplier->telephone);
        $this->assertEquals('sample string 5', $model->supplier->fax);
        $this->assertEquals('sample string 6', $model->supplier->mobile);
        $this->assertEquals('sample string 7', $model->supplier->email);
        $this->assertEquals('sample string 8', $model->supplier->webAddress);
        $this->assertEquals(true, $model->supplier->active);
        $this->assertEquals(10.0, $model->supplier->balance);
        $this->assertEquals(11.0, $model->supplier->creditLimit);
        $this->assertEquals('sample string 12', $model->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $model->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $model->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $model->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $model->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $model->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $model->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $model->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $model->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $model->supplier->deliveryAddress05);
        $this->assertEquals(true, $model->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $model->supplier->textField1);
        $this->assertEquals('sample string 23', $model->supplier->textField2);
        $this->assertEquals('sample string 24', $model->supplier->textField3);
        $this->assertEquals(1.0, $model->supplier->numericField1);
        $this->assertEquals(1.0, $model->supplier->numericField2);
        $this->assertEquals(1.0, $model->supplier->numericField3);
        $this->assertEquals(true, $model->supplier->yesNoField1);
        $this->assertEquals(true, $model->supplier->yesNoField2);
        $this->assertEquals(true, $model->supplier->yesNoField3);
        $this->assertEquals('2017-08-02', $model->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->dateField3->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->created->format('Y-m-d'));
        $this->assertEquals('sample string 29', $model->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $model->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-08-02', $model->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $model->supplier->currencyId);
        $this->assertEquals('sample string 31', $model->supplier->currencySymbol);
        $this->assertEquals(true, $model->supplier->hasActivity);
        $this->assertEquals(1.0, $model->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $model->supplier->defaultTaxTypeId);
        $this->assertEquals(1, $model->supplier->dueDateMethodId);
        $this->assertEquals(1, $model->supplier->dueDateMethodValue);
        $this->assertEquals(33, $model->supplier->id);
        $this->assertInstanceOf(TaxType::class, $model->supplier->defaultTaxType);
        $this->assertEquals(1, $model->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $model->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $model->supplier->defaultTaxType->percentage);
        $this->assertEquals(true, $model->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-08-02', $model->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $model->supplier_CurrencyId);
        $this->assertEquals(1.0, $model->supplier_ExchangeRate);
        $this->assertEquals(6, $model->id);
        $this->assertEquals('2017-08-02', $model->date->format('Y-m-d'));
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
        $this->assertEquals(1, $model->taxPeriodId);
        $this->assertEquals(true, $model->editable);
        $this->assertEquals(true, $model->hasAttachments);
        $this->assertEquals(true, $model->hasNotes);
        $this->assertEquals(true, $model->hasAnticipatedDate);
        $this->assertEquals('2017-08-02', $model->anticipatedDate->format('Y-m-d'));
        $this->assertEquals('sample string 32', $model->externalReference);
        $this->assertInstanceOf(ModelCollection::class, $model->lines);
        $this->assertCount(2, $model->lines->results);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model->lines->results[0]);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model->lines->results[1]);
        $this->assertEquals(1, $model->lines->results[0]->selectionId);
        $this->assertEquals(1, $model->lines->results[0]->taxTypeId);
        $this->assertEquals(1, $model->lines->results[0]->id);
        $this->assertEquals('sample string 2', $model->lines->results[0]->description);
        $this->assertEquals(0, $model->lines->results[0]->lineType);
        $this->assertEquals(1.0, $model->lines->results[0]->quantity);
        $this->assertEquals(3.0, $model->lines->results[0]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model->lines->results[0]->unit);
        $this->assertEquals(5.0, $model->lines->results[0]->unitPriceInclusive);
        $this->assertEquals(6.1, $model->lines->results[0]->taxPercentage);
        $this->assertEquals(7.1, $model->lines->results[0]->discountPercentage);
        $this->assertEquals(8.0, $model->lines->results[0]->exclusive);
        $this->assertEquals(9.0, $model->lines->results[0]->discount);
        $this->assertEquals(10.0, $model->lines->results[0]->tax);
        $this->assertEquals(11.0, $model->lines->results[0]->total);
        $this->assertEquals('sample string 12', $model->lines->results[0]->comments);
        $this->assertEquals(1, $model->lines->results[0]->analysisCategoryId1);
        $this->assertEquals(1, $model->lines->results[0]->analysisCategoryId2);
        $this->assertEquals(1, $model->lines->results[0]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model->lines->results[0]->$key);
        $this->assertEquals(1, $model->lines->results[0]->currencyId);
        $this->assertEquals(1.0, $model->lines->results[0]->unitCost);
        $this->assertEquals(1, $model->lines->results[0]->selectionId);
        $this->assertEquals(1, $model->lines->results[1]->taxTypeId);
        $this->assertEquals(1, $model->lines->results[1]->id);
        $this->assertEquals('sample string 2', $model->lines->results[1]->description);
        $this->assertEquals(0, $model->lines->results[1]->lineType);
        $this->assertEquals(1.0, $model->lines->results[1]->quantity);
        $this->assertEquals(3.0, $model->lines->results[1]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model->lines->results[1]->unit);
        $this->assertEquals(5.0, $model->lines->results[1]->unitPriceInclusive);
        $this->assertEquals(6.1, $model->lines->results[1]->taxPercentage);
        $this->assertEquals(7.1, $model->lines->results[1]->discountPercentage);
        $this->assertEquals(8.0, $model->lines->results[1]->exclusive);
        $this->assertEquals(9.0, $model->lines->results[1]->discount);
        $this->assertEquals(10.0, $model->lines->results[1]->tax);
        $this->assertEquals(11.0, $model->lines->results[1]->total);
        $this->assertEquals('sample string 12', $model->lines->results[1]->comments);
        $this->assertEquals(1, $model->lines->results[1]->analysisCategoryId1);
        $this->assertEquals(1, $model->lines->results[1]->analysisCategoryId2);
        $this->assertEquals(1, $model->lines->results[1]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model->lines->results[1]->$key);
        $this->assertEquals(1, $model->lines->results[1]->currencyId);
        $this->assertEquals(1.0, $model->lines->results[1]->unitCost);
    }

    public function testSave()
    {
        $model = $this->setUpRequestMock(
            'POST',
            SupplierReturn::class,
            'SupplierReturn/Save',
            'SupplierReturn/POST_SupplierReturn_Save_useSystemDocumentNumber_RESP.json',
            'SupplierReturn/POST_SupplierReturn_Save_useSystemDocumentNumber_REQ.json',
            ['useSystemDocumentNumber' => true]
        );

        $model->loadResult(
            json_decode(
                file_get_contents(
                    __DIR__ . '/../../mocks/SupplierReturn/POST_SupplierReturn_Save_useSystemDocumentNumber_REQ.json'
                )
            )
        );

        $response = $model->save(['useSystemDocumentNumber' => true]);
        $model = new SupplierReturn($this->config);
        $model->loadResult($response);

        $this->assertEquals('sample string 1', $model->fromDocument);
        $this->assertEquals(true, $model->locked);
        $this->assertEquals(3, $model->supplierId);
        $this->assertEquals('sample string 4', $model->supplierName);
        $this->assertInstanceOf(Supplier::class, $model->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $model->supplier->category);
        $this->assertEquals('sample string 1', $model->supplier->category->description);
        $this->assertEquals(2, $model->supplier->category->id);
        $this->assertEquals('2017-08-02', $model->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 1', $model->supplier->name);
        $this->assertEquals('sample string 2', $model->supplier->taxReference);
        $this->assertEquals('sample string 3', $model->supplier->contactName);
        $this->assertEquals('sample string 4', $model->supplier->telephone);
        $this->assertEquals('sample string 5', $model->supplier->fax);
        $this->assertEquals('sample string 6', $model->supplier->mobile);
        $this->assertEquals('sample string 7', $model->supplier->email);
        $this->assertEquals('sample string 8', $model->supplier->webAddress);
        $this->assertEquals(true, $model->supplier->active);
        $this->assertEquals(10.0, $model->supplier->balance);
        $this->assertEquals(11.0, $model->supplier->creditLimit);
        $this->assertEquals('sample string 12', $model->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $model->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $model->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $model->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $model->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $model->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $model->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $model->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $model->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $model->supplier->deliveryAddress05);
        $this->assertEquals(true, $model->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $model->supplier->textField1);
        $this->assertEquals('sample string 23', $model->supplier->textField2);
        $this->assertEquals('sample string 24', $model->supplier->textField3);
        $this->assertEquals(1.0, $model->supplier->numericField1);
        $this->assertEquals(1.0, $model->supplier->numericField2);
        $this->assertEquals(1.0, $model->supplier->numericField3);
        $this->assertEquals(true, $model->supplier->yesNoField1);
        $this->assertEquals(true, $model->supplier->yesNoField2);
        $this->assertEquals(true, $model->supplier->yesNoField3);
        $this->assertEquals('2017-08-02', $model->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->dateField3->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->created->format('Y-m-d'));
        $this->assertEquals('sample string 29', $model->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $model->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-08-02', $model->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $model->supplier->currencyId);
        $this->assertEquals('sample string 31', $model->supplier->currencySymbol);
        $this->assertEquals(true, $model->supplier->hasActivity);
        $this->assertEquals(1.0, $model->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $model->supplier->defaultTaxTypeId);
        $this->assertEquals(1, $model->supplier->dueDateMethodId);
        $this->assertEquals(1, $model->supplier->dueDateMethodValue);
        $this->assertEquals(33, $model->supplier->id);
        $this->assertInstanceOf(TaxType::class, $model->supplier->defaultTaxType);
        $this->assertEquals(1, $model->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $model->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $model->supplier->defaultTaxType->percentage);
        $this->assertEquals(true, $model->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-08-02', $model->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $model->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $model->supplier_CurrencyId);
        $this->assertEquals(1.0, $model->supplier_ExchangeRate);
        $this->assertEquals(6, $model->id);
        $this->assertEquals('2017-08-02', $model->date->format('Y-m-d'));
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
        $this->assertEquals(1, $model->taxPeriodId);
        $this->assertEquals(true, $model->editable);
        $this->assertEquals(true, $model->hasAttachments);
        $this->assertEquals(true, $model->hasNotes);
        $this->assertEquals(true, $model->hasAnticipatedDate);
        $this->assertEquals('2017-08-02', $model->anticipatedDate->format('Y-m-d'));
        $this->assertEquals('sample string 32', $model->externalReference);
        $this->assertInstanceOf(ModelCollection::class, $model->lines);
        $this->assertCount(2, $model->lines->results);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model->lines->results[0]);
        $this->assertInstanceOf(CommercialDocumentLine::class, $model->lines->results[1]);
        $this->assertEquals(1, $model->lines->results[0]->selectionId);
        $this->assertEquals(1, $model->lines->results[0]->taxTypeId);
        $this->assertEquals(1, $model->lines->results[0]->id);
        $this->assertEquals('sample string 2', $model->lines->results[0]->description);
        $this->assertEquals(0, $model->lines->results[0]->lineType);
        $this->assertEquals(1.0, $model->lines->results[0]->quantity);
        $this->assertEquals(3.0, $model->lines->results[0]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model->lines->results[0]->unit);
        $this->assertEquals(5.0, $model->lines->results[0]->unitPriceInclusive);
        $this->assertEquals(6.1, $model->lines->results[0]->taxPercentage);
        $this->assertEquals(7.1, $model->lines->results[0]->discountPercentage);
        $this->assertEquals(8.0, $model->lines->results[0]->exclusive);
        $this->assertEquals(9.0, $model->lines->results[0]->discount);
        $this->assertEquals(10.0, $model->lines->results[0]->tax);
        $this->assertEquals(11.0, $model->lines->results[0]->total);
        $this->assertEquals('sample string 12', $model->lines->results[0]->comments);
        $this->assertEquals(1, $model->lines->results[0]->analysisCategoryId1);
        $this->assertEquals(1, $model->lines->results[0]->analysisCategoryId2);
        $this->assertEquals(1, $model->lines->results[0]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model->lines->results[0]->$key);
        $this->assertEquals(1, $model->lines->results[0]->currencyId);
        $this->assertEquals(1.0, $model->lines->results[0]->unitCost);
        $this->assertEquals(1, $model->lines->results[0]->selectionId);
        $this->assertEquals(1, $model->lines->results[1]->taxTypeId);
        $this->assertEquals(1, $model->lines->results[1]->id);
        $this->assertEquals('sample string 2', $model->lines->results[1]->description);
        $this->assertEquals(0, $model->lines->results[1]->lineType);
        $this->assertEquals(1.0, $model->lines->results[1]->quantity);
        $this->assertEquals(3.0, $model->lines->results[1]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $model->lines->results[1]->unit);
        $this->assertEquals(5.0, $model->lines->results[1]->unitPriceInclusive);
        $this->assertEquals(6.1, $model->lines->results[1]->taxPercentage);
        $this->assertEquals(7.1, $model->lines->results[1]->discountPercentage);
        $this->assertEquals(8.0, $model->lines->results[1]->exclusive);
        $this->assertEquals(9.0, $model->lines->results[1]->discount);
        $this->assertEquals(10.0, $model->lines->results[1]->tax);
        $this->assertEquals(11.0, $model->lines->results[1]->total);
        $this->assertEquals('sample string 12', $model->lines->results[1]->comments);
        $this->assertEquals(1, $model->lines->results[1]->analysisCategoryId1);
        $this->assertEquals(1, $model->lines->results[1]->analysisCategoryId2);
        $this->assertEquals(1, $model->lines->results[1]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $model->lines->results[1]->$key);
        $this->assertEquals(1, $model->lines->results[1]->currencyId);
        $this->assertEquals(1.0, $model->lines->results[1]->unitCost);
    }

    public function testCalculate()
    {
        $model = $this->setUpRequestMock(
            'POST',
            SupplierReturn::class,
            'SupplierReturn/Calculate',
            'SupplierReturn/POST_SupplierReturn_Calculate_RESP.json',
            'SupplierReturn/POST_SupplierReturn_Calculate_REQ.json'
        );

        $data = json_decode(
            file_get_contents(__DIR__ . '/../../mocks/SupplierReturn/POST_SupplierReturn_Calculate_REQ.json')
        );
        $model->loadResult($data);

        $calculatedModel = $model->calculate();

        $this->assertEquals('sample string 1', $calculatedModel->fromDocument);
        $this->assertEquals(true, $calculatedModel->locked);
        $this->assertEquals(3, $calculatedModel->supplierId);
        $this->assertEquals('sample string 4', $calculatedModel->supplierName);
        $this->assertInstanceOf(Supplier::class, $calculatedModel->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $calculatedModel->supplier->category);
        $this->assertEquals('sample string 1', $calculatedModel->supplier->category->description);
        $this->assertEquals(2, $calculatedModel->supplier->category->id);
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 1', $calculatedModel->supplier->name);
        $this->assertEquals('sample string 2', $calculatedModel->supplier->taxReference);
        $this->assertEquals('sample string 3', $calculatedModel->supplier->contactName);
        $this->assertEquals('sample string 4', $calculatedModel->supplier->telephone);
        $this->assertEquals('sample string 5', $calculatedModel->supplier->fax);
        $this->assertEquals('sample string 6', $calculatedModel->supplier->mobile);
        $this->assertEquals('sample string 7', $calculatedModel->supplier->email);
        $this->assertEquals('sample string 8', $calculatedModel->supplier->webAddress);
        $this->assertEquals(true, $calculatedModel->supplier->active);
        $this->assertEquals(10.0, $calculatedModel->supplier->balance);
        $this->assertEquals(11.0, $calculatedModel->supplier->creditLimit);
        $this->assertEquals('sample string 12', $calculatedModel->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $calculatedModel->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $calculatedModel->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $calculatedModel->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $calculatedModel->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $calculatedModel->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $calculatedModel->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $calculatedModel->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $calculatedModel->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $calculatedModel->supplier->deliveryAddress05);
        $this->assertEquals(true, $calculatedModel->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $calculatedModel->supplier->textField1);
        $this->assertEquals('sample string 23', $calculatedModel->supplier->textField2);
        $this->assertEquals('sample string 24', $calculatedModel->supplier->textField3);
        $this->assertEquals(1.0, $calculatedModel->supplier->numericField1);
        $this->assertEquals(1.0, $calculatedModel->supplier->numericField2);
        $this->assertEquals(1.0, $calculatedModel->supplier->numericField3);
        $this->assertEquals(true, $calculatedModel->supplier->yesNoField1);
        $this->assertEquals(true, $calculatedModel->supplier->yesNoField2);
        $this->assertEquals(true, $calculatedModel->supplier->yesNoField3);
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->dateField3->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->modified->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->created->format('Y-m-d'));
        $this->assertEquals('sample string 29', $calculatedModel->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $calculatedModel->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $calculatedModel->supplier->currencyId);
        $this->assertEquals('sample string 31', $calculatedModel->supplier->currencySymbol);
        $this->assertEquals(true, $calculatedModel->supplier->hasActivity);
        $this->assertEquals(1.0, $calculatedModel->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $calculatedModel->supplier->defaultTaxTypeId);
        $this->assertEquals(1, $calculatedModel->supplier->dueDateMethodId);
        $this->assertEquals(1, $calculatedModel->supplier->dueDateMethodValue);
        $this->assertEquals(33, $calculatedModel->supplier->id);
        $this->assertInstanceOf(TaxType::class, $calculatedModel->supplier->defaultTaxType);
        $this->assertEquals(1, $calculatedModel->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $calculatedModel->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $calculatedModel->supplier->defaultTaxType->percentage);
        $this->assertEquals(true, $calculatedModel->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $calculatedModel->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $calculatedModel->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-08-02', $calculatedModel->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $calculatedModel->supplier_CurrencyId);
        $this->assertEquals(1.0, $calculatedModel->supplier_ExchangeRate);
        $this->assertEquals(6, $calculatedModel->id);
        $this->assertEquals('2017-08-02', $calculatedModel->date->format('Y-m-d'));
        $this->assertEquals(true, $calculatedModel->inclusive);
        $this->assertEquals(8.1, $calculatedModel->discountPercentage);
        $this->assertEquals('sample string 9', $calculatedModel->taxReference);
        $this->assertEquals('sample string 10', $calculatedModel->documentNumber);
        $this->assertEquals('sample string 11', $calculatedModel->reference);
        $this->assertEquals('sample string 12', $calculatedModel->message);
        $this->assertEquals(13.0, $calculatedModel->discount);
        $this->assertEquals(14.0, $calculatedModel->exclusive);
        $this->assertEquals(15.0, $calculatedModel->tax);
        $this->assertEquals(16.0, $calculatedModel->rounding);
        $this->assertEquals(17.0, $calculatedModel->total);
        $this->assertEquals(18.0, $calculatedModel->amountDue);
        $this->assertEquals('sample string 19', $calculatedModel->postalAddress01);
        $this->assertEquals('sample string 20', $calculatedModel->postalAddress02);
        $this->assertEquals('sample string 21', $calculatedModel->postalAddress03);
        $this->assertEquals('sample string 22', $calculatedModel->postalAddress04);
        $this->assertEquals('sample string 23', $calculatedModel->postalAddress05);
        $this->assertEquals('sample string 24', $calculatedModel->deliveryAddress01);
        $this->assertEquals('sample string 25', $calculatedModel->deliveryAddress02);
        $this->assertEquals('sample string 26', $calculatedModel->deliveryAddress03);
        $this->assertEquals('sample string 27', $calculatedModel->deliveryAddress04);
        $this->assertEquals('sample string 28', $calculatedModel->deliveryAddress05);
        $this->assertEquals(1, $calculatedModel->taxPeriodId);
        $this->assertEquals(true, $calculatedModel->editable);
        $this->assertEquals(true, $calculatedModel->hasAttachments);
        $this->assertEquals(true, $calculatedModel->hasNotes);
        $this->assertEquals(true, $calculatedModel->hasAnticipatedDate);
        $this->assertEquals('2017-08-02', $calculatedModel->anticipatedDate->format('Y-m-d'));
        $this->assertEquals('sample string 32', $calculatedModel->externalReference);
        $this->assertInstanceOf(ModelCollection::class, $calculatedModel->lines);
        $this->assertCount(2, $calculatedModel->lines->results);
        $this->assertInstanceOf(CommercialDocumentLine::class, $calculatedModel->lines->results[0]);
        $this->assertInstanceOf(CommercialDocumentLine::class, $calculatedModel->lines->results[1]);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->selectionId);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->taxTypeId);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->id);
        $this->assertEquals('sample string 2', $calculatedModel->lines->results[0]->description);
        $this->assertEquals(0, $calculatedModel->lines->results[0]->lineType);
        $this->assertEquals(1.0, $calculatedModel->lines->results[0]->quantity);
        $this->assertEquals(3.0, $calculatedModel->lines->results[0]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $calculatedModel->lines->results[0]->unit);
        $this->assertEquals(5.0, $calculatedModel->lines->results[0]->unitPriceInclusive);
        $this->assertEquals(6.1, $calculatedModel->lines->results[0]->taxPercentage);
        $this->assertEquals(7.1, $calculatedModel->lines->results[0]->discountPercentage);
        $this->assertEquals(8.0, $calculatedModel->lines->results[0]->exclusive);
        $this->assertEquals(9.0, $calculatedModel->lines->results[0]->discount);
        $this->assertEquals(10.0, $calculatedModel->lines->results[0]->tax);
        $this->assertEquals(11.0, $calculatedModel->lines->results[0]->total);
        $this->assertEquals('sample string 12', $calculatedModel->lines->results[0]->comments);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->analysisCategoryId1);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->analysisCategoryId2);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $calculatedModel->lines->results[0]->$key);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->currencyId);
        $this->assertEquals(1.0, $calculatedModel->lines->results[0]->unitCost);
        $this->assertEquals(1, $calculatedModel->lines->results[0]->selectionId);
        $this->assertEquals(1, $calculatedModel->lines->results[1]->taxTypeId);
        $this->assertEquals(1, $calculatedModel->lines->results[1]->id);
        $this->assertEquals('sample string 2', $calculatedModel->lines->results[1]->description);
        $this->assertEquals(0, $calculatedModel->lines->results[1]->lineType);
        $this->assertEquals(1.0, $calculatedModel->lines->results[1]->quantity);
        $this->assertEquals(3.0, $calculatedModel->lines->results[1]->unitPriceExclusive);
        $this->assertEquals('sample string 4', $calculatedModel->lines->results[1]->unit);
        $this->assertEquals(5.0, $calculatedModel->lines->results[1]->unitPriceInclusive);
        $this->assertEquals(6.1, $calculatedModel->lines->results[1]->taxPercentage);
        $this->assertEquals(7.1, $calculatedModel->lines->results[1]->discountPercentage);
        $this->assertEquals(8.0, $calculatedModel->lines->results[1]->exclusive);
        $this->assertEquals(9.0, $calculatedModel->lines->results[1]->discount);
        $this->assertEquals(10.0, $calculatedModel->lines->results[1]->tax);
        $this->assertEquals(11.0, $calculatedModel->lines->results[1]->total);
        $this->assertEquals('sample string 12', $calculatedModel->lines->results[1]->comments);
        $this->assertEquals(1, $calculatedModel->lines->results[1]->analysisCategoryId1);
        $this->assertEquals(1, $calculatedModel->lines->results[1]->analysisCategoryId2);
        $this->assertEquals(1, $calculatedModel->lines->results[1]->analysisCategoryId3);
        $key = '$trackingCode';
        $this->assertEquals('sample string 13', $calculatedModel->lines->results[1]->$key);
        $this->assertEquals(1, $calculatedModel->lines->results[1]->currencyId);
        $this->assertEquals(1.0, $calculatedModel->lines->results[1]->unitCost);
    }

    public function testEmail()
    {
        $model = $this->setUpRequestMock(
            'POST',
            SupplierReturn::class,
            'SupplierReturn/Email',
            'SupplierReturn/POST_SupplierReturn_Email.json'
        );

        $data = json_decode(
            file_get_contents(__DIR__ . '/../../mocks/SupplierReturn/POST_SupplierReturn_Email.json'),
            true
        );

        $this->assertEquals(null, $model->email($data));
    }

    public function testExport()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierReturn::class,
            'SupplierReturn/Export/1',
            'files/test.pdf'
        );

        $fileContent = $model->export('1');
        $tmpFile = tmpfile();
        fwrite($tmpFile, $fileContent);

        $tmpFilePath = stream_get_meta_data($tmpFile)['uri'];
        $savedFileMD5 = md5_file($tmpFilePath);
        $originalFileMD5 = md5_file(__DIR__ . '/../../mocks/files/test.pdf');
        $this->assertEquals($savedFileMD5, $originalFileMD5);

        fclose($tmpFile);
    }
}
