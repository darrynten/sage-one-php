<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierAgeing;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Models\SupplierAgeingRequest;

class SupplierAgeingModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierAgeing::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierAgeing::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierAgeing::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierAgeing::class, 'supplier');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierAgeing::class, 'supplier');
    }

    public function testInject()
    {
        $supplierAgeing = new SupplierAgeing($this->config);
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/SupplierAgeing/POST_SupplierAgeing_GetSummary_Post_xx.json"));
        $supplierAgeing->loadResult($data);

        $this->assertInstanceOf(Supplier::class, $supplierAgeing->supplier);
        $this->assertEquals(33, $supplierAgeing->supplier->id);
        $this->assertEquals('Supplier 1', $supplierAgeing->supplier->name);
        $this->assertInstanceOf(SupplierCategory::class, $supplierAgeing->supplier->category);
        $this->assertEquals('sample string 1', $supplierAgeing->supplier->category->description);
        $this->assertEquals(2, $supplierAgeing->supplier->category->id);
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 2', $supplierAgeing->supplier->taxReference);
        $this->assertEquals('sample string 3', $supplierAgeing->supplier->contactName);
        $this->assertEquals('sample string 4', $supplierAgeing->supplier->telephone);
        $this->assertEquals('sample string 5', $supplierAgeing->supplier->fax);
        $this->assertEquals('sample string 6', $supplierAgeing->supplier->mobile);
        $this->assertEquals('sample string 7', $supplierAgeing->supplier->email);
        $this->assertEquals('sample string 8', $supplierAgeing->supplier->webAddress);
        $this->assertTrue($supplierAgeing->supplier->active);
        $this->assertEquals(10.0, $supplierAgeing->supplier->balance);
        $this->assertEquals(11.0, $supplierAgeing->supplier->creditLimit);
        $this->assertEquals('sample string 12', $supplierAgeing->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $supplierAgeing->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $supplierAgeing->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $supplierAgeing->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $supplierAgeing->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $supplierAgeing->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $supplierAgeing->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $supplierAgeing->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $supplierAgeing->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $supplierAgeing->supplier->deliveryAddress05);
        $this->assertTrue($supplierAgeing->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $supplierAgeing->supplier->textField1);
        $this->assertEquals('sample string 23', $supplierAgeing->supplier->textField2);
        $this->assertEquals('sample string 24', $supplierAgeing->supplier->textField3);
        $this->assertEquals(1.0, $supplierAgeing->supplier->numericField1);
        $this->assertEquals(1.0, $supplierAgeing->supplier->numericField2);
        $this->assertEquals(1.0, $supplierAgeing->supplier->numericField3);
        $this->assertTrue($supplierAgeing->supplier->yesNoField1);
        $this->assertTrue($supplierAgeing->supplier->yesNoField2);
        $this->assertTrue($supplierAgeing->supplier->yesNoField3);
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->dateField3->format('Y-m-d'));
        $this->assertInstanceOf(\DateTime::class, $supplierAgeing->supplier->modified);
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->modified->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeing->supplier->modified->getTimezone()->getName());
        $this->assertInstanceOf(\DateTime::class, $supplierAgeing->supplier->created);
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->created->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeing->supplier->created->getTimezone()->getName());
        $this->assertEquals('sample string 29', $supplierAgeing->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $supplierAgeing->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-07-22', $supplierAgeing->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeing->supplier->currencyId);
        $this->assertEquals('sample string 31', $supplierAgeing->supplier->currencySymbol);
        $this->assertTrue($supplierAgeing->supplier->hasActivity);
        $this->assertEquals(1.0, $supplierAgeing->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $supplierAgeing->supplier->defaultTaxTypeId);
        $this->assertInstanceOf(TaxType::class, $supplierAgeing->supplier->defaultTaxType);
        $this->assertEquals(1, $supplierAgeing->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $supplierAgeing->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $supplierAgeing->supplier->defaultTaxType->percentage);
        $this->assertTrue($supplierAgeing->supplier->defaultTaxType->isDefault);
        $this->assertTrue($supplierAgeing->supplier->defaultTaxType->hasActivity);
        $this->assertTrue($supplierAgeing->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-07-23', $supplierAgeing->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-07-23', $supplierAgeing->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeing->supplier->dueDateMethodId);
        $this->assertEquals(1, $supplierAgeing->supplier->dueDateMethodValue);
        $this->assertEquals('2017-07-22', $supplierAgeing->date->format('Y-m-d'));
        
        $this->assertEquals(1, $supplierAgeing->ageingTransactions->results[0]->documentHeaderId);
        $this->assertEquals(2, $supplierAgeing->ageingTransactions->results[0]->documentTypeId);
        $this->assertEquals('sample string 3', $supplierAgeing->ageingTransactions->results[0]->documentNumber);
        $this->assertEquals('sample string 4', $supplierAgeing->ageingTransactions->results[0]->reference);
        $this->assertEquals(2, $supplierAgeing->ageingTransactions->results[0]->documentType);
        $this->assertEquals('sample string 5', $supplierAgeing->ageingTransactions->results[0]->comment);
        $this->assertEquals('2017-07-22', $supplierAgeing->ageingTransactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $supplierAgeing->ageingTransactions->results[0]->dueDate->format('Y-m-d'));
        $this->assertEquals(45.0, $supplierAgeing->ageingTransactions->results[0]->total);
        $this->assertEquals(7.0, $supplierAgeing->ageingTransactions->results[0]->current);
        $this->assertEquals(8.0, $supplierAgeing->ageingTransactions->results[0]->days30);
        $this->assertEquals(9.0, $supplierAgeing->ageingTransactions->results[0]->days60);
        $this->assertEquals(10.0, $supplierAgeing->ageingTransactions->results[0]->days90);
        $this->assertEquals(11.0, $supplierAgeing->ageingTransactions->results[0]->days120Plus);

        $this->assertEquals(5, $supplierAgeing->ageingTransactions->results[1]->documentHeaderId);
        $this->assertEquals(6, $supplierAgeing->ageingTransactions->results[1]->documentTypeId);
        $this->assertEquals('sample string 7', $supplierAgeing->ageingTransactions->results[1]->documentNumber);
        $this->assertEquals('sample string 8', $supplierAgeing->ageingTransactions->results[1]->reference);
        $this->assertEquals(9, $supplierAgeing->ageingTransactions->results[1]->documentType);
        $this->assertEquals('sample string 10', $supplierAgeing->ageingTransactions->results[1]->comment);
        $this->assertEquals('2017-07-11', $supplierAgeing->ageingTransactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-12', $supplierAgeing->ageingTransactions->results[1]->dueDate->format('Y-m-d'));
        $this->assertEquals(13.0, $supplierAgeing->ageingTransactions->results[1]->total);
        $this->assertEquals(14.0, $supplierAgeing->ageingTransactions->results[1]->current);
        $this->assertEquals(15.0, $supplierAgeing->ageingTransactions->results[1]->days30);
        $this->assertEquals(16.0, $supplierAgeing->ageingTransactions->results[1]->days60);
        $this->assertEquals(17.0, $supplierAgeing->ageingTransactions->results[1]->days90);
        $this->assertEquals(18.0, $supplierAgeing->ageingTransactions->results[1]->days120Plus);

        $this->assertEquals(20.0, $supplierAgeing->total);
        $this->assertEquals(2.0, $supplierAgeing->current);
        $this->assertEquals(3.0, $supplierAgeing->days30);
        $this->assertEquals(4.0, $supplierAgeing->days60);
        $this->assertEquals(5.0, $supplierAgeing->days90);
        $this->assertEquals(6.0, $supplierAgeing->days120Plus);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierAgeing::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetSummary()
    {
        $supplierAgeing = $this->setUpRequestMock('POST', SupplierAgeing::class, 'SupplierAgeing/GetSummary', 'SupplierAgeing/POST_SupplierAgeing_GetSummary_RESP.json', 'SupplierAgeing/POST_SupplierAgeingRequest_GetSummary_REQ.json');

        $supplierAgeingRequestFields = new \stdClass();
        $supplierAgeingRequestFields->SupplierId = 1;
        $supplierAgeingRequestFields->ToDate = "2017-07-21";
        $supplierAgeingRequestFields->Summary = true;
        $supplierAgeingRequestFields->AgeingPeriod = 4;
        $supplierAgeingRequestFields->FromSupplier = "sample string 6";
        $supplierAgeingRequestFields->ToSupplier = "sample string 611";
        $supplierAgeingRequestFields->FromCategory = "sample string 211";
        $supplierAgeingRequestFields->ToCategory = "sample string 151";
        $supplierAgeingRequestFields->IncludeActive = false;
        $supplierAgeingRequestFields->IncludeInactive = true;
        $supplierAgeingRequestFields->BasedOnDueDate = false;
        $supplierAgeingRequestFields->ExcludeZeroBalance = true;
        $supplierAgeingRequestFields->UseForeignCurrency = true;

        $supplierAgeingRequest = new SupplierAgeingRequest($this->config);
        $supplierAgeingRequest->loadResult($supplierAgeingRequestFields);
        $supplierAgeingSummary = $supplierAgeing->getSummary($supplierAgeingRequest);

        $this->assertInstanceOf(Supplier::class, $supplierAgeingSummary->supplier);
        $this->assertEquals(33, $supplierAgeingSummary->supplier->id);
        $this->assertEquals('Supplier 1', $supplierAgeingSummary->supplier->name);
        $this->assertInstanceOf(SupplierCategory::class, $supplierAgeingSummary->supplier->category);
        $this->assertEquals('sample string 1', $supplierAgeingSummary->supplier->category->description);
        $this->assertEquals(2, $supplierAgeingSummary->supplier->category->id);
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 2', $supplierAgeingSummary->supplier->taxReference);
        $this->assertEquals('sample string 3', $supplierAgeingSummary->supplier->contactName);
        $this->assertEquals('sample string 4', $supplierAgeingSummary->supplier->telephone);
        $this->assertEquals('sample string 5', $supplierAgeingSummary->supplier->fax);
        $this->assertEquals('sample string 6', $supplierAgeingSummary->supplier->mobile);
        $this->assertEquals('sample string 7', $supplierAgeingSummary->supplier->email);
        $this->assertEquals('sample string 8', $supplierAgeingSummary->supplier->webAddress);
        $this->assertTrue($supplierAgeingSummary->supplier->active);
        $this->assertEquals(10.0, $supplierAgeingSummary->supplier->balance);
        $this->assertEquals(11.0, $supplierAgeingSummary->supplier->creditLimit);
        $this->assertEquals('sample string 12', $supplierAgeingSummary->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $supplierAgeingSummary->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $supplierAgeingSummary->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $supplierAgeingSummary->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $supplierAgeingSummary->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $supplierAgeingSummary->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $supplierAgeingSummary->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $supplierAgeingSummary->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $supplierAgeingSummary->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $supplierAgeingSummary->supplier->deliveryAddress05);
        $this->assertTrue($supplierAgeingSummary->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $supplierAgeingSummary->supplier->textField1);
        $this->assertEquals('sample string 23', $supplierAgeingSummary->supplier->textField2);
        $this->assertEquals('sample string 24', $supplierAgeingSummary->supplier->textField3);
        $this->assertEquals(1.0, $supplierAgeingSummary->supplier->numericField1);
        $this->assertEquals(1.0, $supplierAgeingSummary->supplier->numericField2);
        $this->assertEquals(1.0, $supplierAgeingSummary->supplier->numericField3);
        $this->assertTrue($supplierAgeingSummary->supplier->yesNoField1);
        $this->assertTrue($supplierAgeingSummary->supplier->yesNoField2);
        $this->assertTrue($supplierAgeingSummary->supplier->yesNoField3);
        $this->assertEquals('2017-07-22', $supplierAgeingSummary->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $supplierAgeingSummary->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $supplierAgeingSummary->supplier->dateField3->format('Y-m-d'));
        $this->assertInstanceOf(\DateTime::class, $supplierAgeingSummary->supplier->modified);
        $this->assertEquals('2017-07-22', $supplierAgeingSummary->supplier->modified->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeingSummary->supplier->modified->getTimezone()->getName());
        $this->assertInstanceOf(\DateTime::class, $supplierAgeingSummary->supplier->created);
        $this->assertEquals('2017-07-22', $supplierAgeingSummary->supplier->created->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeingSummary->supplier->created->getTimezone()->getName());
        $this->assertEquals('sample string 29', $supplierAgeingSummary->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $supplierAgeingSummary->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingSummary->supplier->currencyId);
        $this->assertEquals('sample string 31', $supplierAgeingSummary->supplier->currencySymbol);
        $this->assertTrue($supplierAgeingSummary->supplier->hasActivity);
        $this->assertEquals(1.0, $supplierAgeingSummary->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $supplierAgeingSummary->supplier->defaultTaxTypeId);
        $this->assertInstanceOf(TaxType::class, $supplierAgeingSummary->supplier->defaultTaxType);
        $this->assertEquals(1, $supplierAgeingSummary->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $supplierAgeingSummary->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $supplierAgeingSummary->supplier->defaultTaxType->percentage);
        $this->assertTrue($supplierAgeingSummary->supplier->defaultTaxType->isDefault);
        $this->assertTrue($supplierAgeingSummary->supplier->defaultTaxType->hasActivity);
        $this->assertTrue($supplierAgeingSummary->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingSummary->supplier->dueDateMethodId);
        $this->assertEquals(1, $supplierAgeingSummary->supplier->dueDateMethodValue);
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->date->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingSummary->ageingTransactions->results[0]->documentHeaderId);
        $this->assertEquals(2, $supplierAgeingSummary->ageingTransactions->results[0]->documentTypeId);
        $this->assertEquals('sample string 3', $supplierAgeingSummary->ageingTransactions->results[0]->documentNumber);
        $this->assertEquals('sample string 4', $supplierAgeingSummary->ageingTransactions->results[0]->reference);
        $this->assertEquals(2, $supplierAgeingSummary->ageingTransactions->results[0]->documentType);
        $this->assertEquals('sample string 5', $supplierAgeingSummary->ageingTransactions->results[0]->comment);
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->ageingTransactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-20', $supplierAgeingSummary->ageingTransactions->results[0]->dueDate->format('Y-m-d'));
        $this->assertEquals(45.0, $supplierAgeingSummary->ageingTransactions->results[0]->total);
        $this->assertEquals(7.0, $supplierAgeingSummary->ageingTransactions->results[0]->current);
        $this->assertEquals(8.0, $supplierAgeingSummary->ageingTransactions->results[0]->days30);
        $this->assertEquals(9.0, $supplierAgeingSummary->ageingTransactions->results[0]->days60);
        $this->assertEquals(10.0, $supplierAgeingSummary->ageingTransactions->results[0]->days90);
        $this->assertEquals(11.0, $supplierAgeingSummary->ageingTransactions->results[0]->days120Plus);
        $this->assertEquals(5, $supplierAgeingSummary->ageingTransactions->results[1]->documentHeaderId);
        $this->assertEquals(6, $supplierAgeingSummary->ageingTransactions->results[1]->documentTypeId);
        $this->assertEquals('sample string 7', $supplierAgeingSummary->ageingTransactions->results[1]->documentNumber);
        $this->assertEquals('sample string 8', $supplierAgeingSummary->ageingTransactions->results[1]->reference);
        $this->assertEquals(9, $supplierAgeingSummary->ageingTransactions->results[1]->documentType);
        $this->assertEquals('sample string 10', $supplierAgeingSummary->ageingTransactions->results[1]->comment);
        $this->assertEquals('2017-07-11', $supplierAgeingSummary->ageingTransactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-12', $supplierAgeingSummary->ageingTransactions->results[1]->dueDate->format('Y-m-d'));
        $this->assertEquals(13.0, $supplierAgeingSummary->ageingTransactions->results[1]->total);
        $this->assertEquals(14.0, $supplierAgeingSummary->ageingTransactions->results[1]->current);
        $this->assertEquals(15.0, $supplierAgeingSummary->ageingTransactions->results[1]->days30);
        $this->assertEquals(16.0, $supplierAgeingSummary->ageingTransactions->results[1]->days60);
        $this->assertEquals(17.0, $supplierAgeingSummary->ageingTransactions->results[1]->days90);
        $this->assertEquals(18.0, $supplierAgeingSummary->ageingTransactions->results[1]->days120Plus);
        $this->assertEquals(21.0, $supplierAgeingSummary->total);
        $this->assertEquals(3.0, $supplierAgeingSummary->current);
        $this->assertEquals(4.0, $supplierAgeingSummary->days30);
        $this->assertEquals(17.0, $supplierAgeingSummary->days60);
        $this->assertEquals(18.0, $supplierAgeingSummary->days90);
        $this->assertEquals(19.0, $supplierAgeingSummary->days120Plus);
    }

    public function testGetDetail()
    {
        $supplierAgeing = $this->setUpRequestMock('POST', SupplierAgeing::class, 'SupplierAgeing/GetDetail', 'SupplierAgeing/POST_SupplierAgeing_GetDetail_RESP.json', 'SupplierAgeing/POST_SupplierAgeing_GetDetail_REQ.json');

        $supplierAgeingRequestFields = new \stdClass();
        $supplierAgeingRequestFields->SupplierId = 5;
        $supplierAgeingRequestFields->ToDate = "2016-08-23";
        $supplierAgeingRequestFields->Summary = true;
        $supplierAgeingRequestFields->AgeingPeriod = 6;
        $supplierAgeingRequestFields->FromSupplier = "str 6";
        $supplierAgeingRequestFields->ToSupplier = "sample 611";
        $supplierAgeingRequestFields->FromCategory = " string 211";
        $supplierAgeingRequestFields->ToCategory = "sa 151";
        $supplierAgeingRequestFields->IncludeActive = true;
        $supplierAgeingRequestFields->IncludeInactive = true;
        $supplierAgeingRequestFields->BasedOnDueDate = false;
        $supplierAgeingRequestFields->ExcludeZeroBalance = true;
        $supplierAgeingRequestFields->UseForeignCurrency = true;

        $supplierAgeingRequest = new SupplierAgeingRequest($this->config);
        $supplierAgeingRequest->loadResult($supplierAgeingRequestFields);
        $supplierAgeingDetail = $supplierAgeing->getDetail($supplierAgeingRequest);

        $this->assertInstanceOf(Supplier::class, $supplierAgeingDetail->results[0]->supplier);
        $this->assertEquals(33, $supplierAgeingDetail->results[0]->supplier->id);
        $this->assertEquals('sample string 40', $supplierAgeingDetail->results[0]->supplier->name);
        $this->assertInstanceOf(SupplierCategory::class, $supplierAgeingDetail->results[0]->supplier->category);
        $this->assertEquals('sample string 1', $supplierAgeingDetail->results[0]->supplier->category->description);
        $this->assertEquals(6, $supplierAgeingDetail->results[0]->supplier->category->id);
        $this->assertEquals('2016-07-24', $supplierAgeingDetail->results[0]->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2016-07-24', $supplierAgeingDetail->results[0]->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 2', $supplierAgeingDetail->results[0]->supplier->taxReference);
        $this->assertEquals('sample string 3', $supplierAgeingDetail->results[0]->supplier->contactName);
        $this->assertEquals('sample string 4', $supplierAgeingDetail->results[0]->supplier->telephone);
        $this->assertEquals('sample string 5', $supplierAgeingDetail->results[0]->supplier->fax);
        $this->assertEquals('sample string 6', $supplierAgeingDetail->results[0]->supplier->mobile);
        $this->assertEquals('sample string 7', $supplierAgeingDetail->results[0]->supplier->email);
        $this->assertEquals('sample string 8', $supplierAgeingDetail->results[0]->supplier->webAddress);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->active);
        $this->assertEquals(10.0, $supplierAgeingDetail->results[0]->supplier->balance);
        $this->assertEquals(11.0, $supplierAgeingDetail->results[0]->supplier->creditLimit);
        $this->assertEquals('sample string 12', $supplierAgeingDetail->results[0]->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $supplierAgeingDetail->results[0]->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $supplierAgeingDetail->results[0]->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $supplierAgeingDetail->results[0]->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $supplierAgeingDetail->results[0]->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $supplierAgeingDetail->results[0]->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $supplierAgeingDetail->results[0]->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $supplierAgeingDetail->results[0]->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $supplierAgeingDetail->results[0]->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $supplierAgeingDetail->results[0]->supplier->deliveryAddress05);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $supplierAgeingDetail->results[0]->supplier->textField1);
        $this->assertEquals('sample string 23', $supplierAgeingDetail->results[0]->supplier->textField2);
        $this->assertEquals('sample string 24', $supplierAgeingDetail->results[0]->supplier->textField3);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[0]->supplier->numericField1);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[0]->supplier->numericField2);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[0]->supplier->numericField3);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->yesNoField1);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->yesNoField2);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->yesNoField3);
        $this->assertEquals('2016-07-01', $supplierAgeingDetail->results[0]->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2016-07-02', $supplierAgeingDetail->results[0]->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2016-07-03', $supplierAgeingDetail->results[0]->supplier->dateField3->format('Y-m-d'));
        $this->assertInstanceOf(\DateTime::class, $supplierAgeingDetail->results[0]->supplier->modified);
        $this->assertEquals('2016-07-04', $supplierAgeingDetail->results[0]->supplier->modified->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeingDetail->results[0]->supplier->modified->getTimezone()->getName());
        $this->assertInstanceOf(\DateTime::class, $supplierAgeingDetail->results[0]->supplier->created);
        $this->assertEquals('2016-07-05', $supplierAgeingDetail->results[0]->supplier->created->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeingDetail->results[0]->supplier->created->getTimezone()->getName());
        $this->assertEquals('sample string 29', $supplierAgeingDetail->results[0]->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $supplierAgeingDetail->results[0]->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[0]->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->supplier->currencyId);
        $this->assertEquals('sample string 31', $supplierAgeingDetail->results[0]->supplier->currencySymbol);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->hasActivity);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[0]->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->supplier->defaultTaxTypeId);
        $this->assertInstanceOf(TaxType::class, $supplierAgeingDetail->results[0]->supplier->defaultTaxType);
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $supplierAgeingDetail->results[0]->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $supplierAgeingDetail->results[0]->supplier->defaultTaxType->percentage);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->defaultTaxType->isDefault);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->defaultTaxType->hasActivity);
        $this->assertTrue($supplierAgeingDetail->results[0]->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[0]->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[0]->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->supplier->dueDateMethodId);
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->supplier->dueDateMethodValue);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[0]->date->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->documentHeaderId);
        $this->assertEquals(2, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->documentTypeId);
        $this->assertEquals('sample string 3', $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->documentNumber);
        $this->assertEquals('sample string 4', $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->reference);
        $this->assertEquals(2, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->documentType);
        $this->assertEquals('sample string 5', $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->comment);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->dueDate->format('Y-m-d'));
        $this->assertEquals(45.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->total);
        $this->assertEquals(7.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->current);
        $this->assertEquals(8.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->days30);
        $this->assertEquals(9.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->days60);
        $this->assertEquals(10.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->days90);
        $this->assertEquals(11.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[0]->days120Plus);
        $this->assertEquals(1, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->documentHeaderId);
        $this->assertEquals(2, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->documentTypeId);
        $this->assertEquals('sample string 3', $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->documentNumber);
        $this->assertEquals('sample string 4', $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->reference);
        $this->assertEquals(2, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->documentType);
        $this->assertEquals('sample string 5', $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->comment);
        $this->assertEquals('2017-07-11', $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-12', $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->dueDate->format('Y-m-d'));
        $this->assertEquals(45.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->total);
        $this->assertEquals(7.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->current);
        $this->assertEquals(8.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->days30);
        $this->assertEquals(9.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->days60);
        $this->assertEquals(10.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->days90);
        $this->assertEquals(11.0, $supplierAgeingDetail->results[0]->ageingTransactions->results[1]->days120Plus);
        $this->assertEquals(21.0, $supplierAgeingDetail->results[0]->total);
        $this->assertEquals(2.0, $supplierAgeingDetail->results[0]->current);
        $this->assertEquals(3.0, $supplierAgeingDetail->results[0]->days30);
        $this->assertEquals(4.0, $supplierAgeingDetail->results[0]->days60);
        $this->assertEquals(5.0, $supplierAgeingDetail->results[0]->days90);
        $this->assertEquals(6.0, $supplierAgeingDetail->results[0]->days120Plus);

        $this->assertInstanceOf(Supplier::class, $supplierAgeingDetail->results[0]->supplier);
        $this->assertEquals(33, $supplierAgeingDetail->results[1]->supplier->id);
        $this->assertEquals('Supplier 2', $supplierAgeingDetail->results[1]->supplier->name);
        $this->assertInstanceOf(SupplierCategory::class, $supplierAgeingDetail->results[1]->supplier->category);
        $this->assertEquals('sample string 1', $supplierAgeingDetail->results[1]->supplier->category->description);
        $this->assertEquals(2, $supplierAgeingDetail->results[1]->supplier->category->id);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->category->created->format('Y-m-d'));
        $this->assertEquals('sample string 2', $supplierAgeingDetail->results[1]->supplier->taxReference);
        $this->assertEquals('sample string 3', $supplierAgeingDetail->results[1]->supplier->contactName);
        $this->assertEquals('sample string 4', $supplierAgeingDetail->results[1]->supplier->telephone);
        $this->assertEquals('sample string 5', $supplierAgeingDetail->results[1]->supplier->fax);
        $this->assertEquals('sample string 6', $supplierAgeingDetail->results[1]->supplier->mobile);
        $this->assertEquals('sample string 7', $supplierAgeingDetail->results[1]->supplier->email);
        $this->assertEquals('sample string 8', $supplierAgeingDetail->results[1]->supplier->webAddress);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->active);
        $this->assertEquals(10.0, $supplierAgeingDetail->results[1]->supplier->balance);
        $this->assertEquals(11.0, $supplierAgeingDetail->results[1]->supplier->creditLimit);
        $this->assertEquals('sample string 12', $supplierAgeingDetail->results[1]->supplier->postalAddress01);
        $this->assertEquals('sample string 13', $supplierAgeingDetail->results[1]->supplier->postalAddress02);
        $this->assertEquals('sample string 14', $supplierAgeingDetail->results[1]->supplier->postalAddress03);
        $this->assertEquals('sample string 15', $supplierAgeingDetail->results[1]->supplier->postalAddress04);
        $this->assertEquals('sample string 16', $supplierAgeingDetail->results[1]->supplier->postalAddress05);
        $this->assertEquals('sample string 17', $supplierAgeingDetail->results[1]->supplier->deliveryAddress01);
        $this->assertEquals('sample string 18', $supplierAgeingDetail->results[1]->supplier->deliveryAddress02);
        $this->assertEquals('sample string 19', $supplierAgeingDetail->results[1]->supplier->deliveryAddress03);
        $this->assertEquals('sample string 20', $supplierAgeingDetail->results[1]->supplier->deliveryAddress04);
        $this->assertEquals('sample string 21', $supplierAgeingDetail->results[1]->supplier->deliveryAddress05);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals('sample string 22', $supplierAgeingDetail->results[1]->supplier->textField1);
        $this->assertEquals('sample string 23', $supplierAgeingDetail->results[1]->supplier->textField2);
        $this->assertEquals('sample string 24', $supplierAgeingDetail->results[1]->supplier->textField3);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[1]->supplier->numericField1);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[1]->supplier->numericField2);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[1]->supplier->numericField3);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->yesNoField1);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->yesNoField2);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->yesNoField3);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->dateField3->format('Y-m-d'));
        $this->assertInstanceOf(\DateTime::class, $supplierAgeingDetail->results[1]->supplier->modified);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->modified->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeingDetail->results[1]->supplier->modified->getTimezone()->getName());
        $this->assertInstanceOf(\DateTime::class, $supplierAgeingDetail->results[1]->supplier->created);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->created->format('Y-m-d'));
        $this->assertEquals('UTC', $supplierAgeingDetail->results[1]->supplier->created->getTimezone()->getName());
        $this->assertEquals('sample string 29', $supplierAgeingDetail->results[1]->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $supplierAgeingDetail->results[1]->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingDetail->results[1]->supplier->currencyId);
        $this->assertEquals('sample string 31', $supplierAgeingDetail->results[1]->supplier->currencySymbol);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->hasActivity);
        $this->assertEquals(1.0, $supplierAgeingDetail->results[1]->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $supplierAgeingDetail->results[1]->supplier->defaultTaxTypeId);
        $this->assertInstanceOf(TaxType::class, $supplierAgeingDetail->results[1]->supplier->defaultTaxType);
        $this->assertEquals(1, $supplierAgeingDetail->results[1]->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $supplierAgeingDetail->results[1]->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $supplierAgeingDetail->results[1]->supplier->defaultTaxType->percentage);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->defaultTaxType->isDefault);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->defaultTaxType->hasActivity);
        $this->assertTrue($supplierAgeingDetail->results[1]->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $supplierAgeingDetail->results[1]->supplier->dueDateMethodId);
        $this->assertEquals(1, $supplierAgeingDetail->results[1]->supplier->dueDateMethodValue);
        $this->assertEquals('2017-07-24', $supplierAgeingDetail->results[1]->date->format('Y-m-d'));
        $this->assertEquals(8, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->documentHeaderId);
        $this->assertEquals(9, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->documentTypeId);
        $this->assertEquals('sample string 10', $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->documentNumber);
        $this->assertEquals('sample string 11', $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->reference);
        $this->assertEquals(12, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->documentType);
        $this->assertEquals('sample string 13', $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->comment);
        $this->assertEquals('2017-07-14', $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-15', $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->dueDate->format('Y-m-d'));
        $this->assertEquals(16.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->total);
        $this->assertEquals(17.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->current);
        $this->assertEquals(18.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->days30);
        $this->assertEquals(19.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->days60);
        $this->assertEquals(20.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->days90);
        $this->assertEquals(21.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[0]->days120Plus);
        $this->assertEquals(10, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->documentHeaderId);
        $this->assertEquals(20, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->documentTypeId);
        $this->assertEquals('sample DN 3', $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->documentNumber);
        $this->assertEquals('sample REF 4', $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->reference);
        $this->assertEquals(30, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->documentType);
        $this->assertEquals('sample CMT 5', $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->comment);
        $this->assertEquals('2017-07-19', $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('2017-07-19', $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->dueDate->format('Y-m-d'));
        $this->assertEquals(45.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->total);
        $this->assertEquals(7.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->current);
        $this->assertEquals(8.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->days30);
        $this->assertEquals(9.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->days60);
        $this->assertEquals(10.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->days90);
        $this->assertEquals(11.0, $supplierAgeingDetail->results[1]->ageingTransactions->results[1]->days120Plus);
        $this->assertEquals(20.0, $supplierAgeingDetail->results[1]->total);
        $this->assertEquals(2.0, $supplierAgeingDetail->results[1]->current);
        $this->assertEquals(3.0, $supplierAgeingDetail->results[1]->days30);
        $this->assertEquals(4.0, $supplierAgeingDetail->results[1]->days60);
        $this->assertEquals(5.0, $supplierAgeingDetail->results[1]->days90);
        $this->assertEquals(6.0, $supplierAgeingDetail->results[1]->days120Plus);
    }

    public function testAllException()
    {
        $this->verifyAllException(SupplierAgeing::class);
    }

    public function testGetException()
    {
        $this->verifyGetException(SupplierAgeing::class);
    }

    public function testSaveException()
    {
        $this->verifySaveException(SupplierAgeing::class);
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(SupplierAgeing::class);
    }
}
