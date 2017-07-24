<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Models\SupplierPurchaseHistory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\ModelCollection;

class SupplierPucharseHistoryModelTest extends BaseModelTest
{
    public function testAttributes()
    {
        $this->verifyAttributes(SupplierPurchaseHistory::class, [
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'supplier' => [
                'type' => 'Supplier',
                'nullable' => false,
                'readonly' => false,
            ],
            'exclusive' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierPurchaseHistory::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $model = $this->setUpRequestMock(
            'POST',
            SupplierPurchaseHistory::class,
            'SupplierPurchaseHistory/Get',
            'SupplierPurchaseHistory/POST_SupplierPurchaseHistory_Get_RESP.json',
            'SupplierPurchaseHistory/POST_SupplierPurchaseHistory_Get_REQ.json'
        );

        $response = $model->all();
        $this->assertInstanceOf(ModelCollection::class, $response);
        $this->assertCount(2, $response->results);

        $model1 = $response->results[0];
        $this->assertInstanceOf(SupplierPurchaseHistory::class, $model1);
        $this->assertEquals('2017-07-24', $model1->date->format('Y-m-d'));
        $this->assertEquals(2.0, $model1->exclusive);
        $this->assertEquals('sample string 1', $model1->supplier->name);
        $this->assertInstanceOf(SupplierCategory::class, $model1->supplier->category);
        $this->assertEquals('sample string 1', $model1->supplier->category->description);
        $this->assertEquals(2, $model1->supplier->category->id);
        $this->assertEquals('2017-07-24', $model1->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $model1->supplier->category->created->format('Y-m-d'));
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
        $this->assertEquals('2017-07-24', $model1->supplier->dateField1->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $model1->supplier->dateField2->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $model1->supplier->dateField3->format('Y-m-d'));
        $this->assertInstanceOf(\DateTime::class, $model1->supplier->modified);
        $this->assertEquals('2017-07-24', $model1->supplier->modified->format('Y-m-d'));
        $this->assertEquals('UTC', $model1->supplier->modified->getTimezone()->getName());
        $this->assertInstanceOf(\DateTime::class, $model1->supplier->created);
        $this->assertEquals('2017-07-24', $model1->supplier->created->format('Y-m-d'));
        $this->assertEquals('UTC', $model1->supplier->created->getTimezone()->getName());
        $this->assertEquals('sample string 29', $model1->supplier->businessRegistrationNumber);
        $this->assertEquals('sample string 30', $model1->supplier->RMCDApprovalNumber);
        $this->assertEquals('2017-07-24', $model1->supplier->taxStatusVerified->format('Y-m-d'));
        $this->assertEquals(1, $model1->supplier->currencyId);
        $this->assertEquals('sample string 31', $model1->supplier->currencySymbol);
        $this->assertEquals(true, $model1->supplier->hasActivity);
        $this->assertEquals(1.0, $model1->supplier->defaultDiscountPercentage);
        $this->assertEquals(1, $model1->supplier->defaultTaxTypeId);
        $this->assertInstanceOf(TaxType::class, $model1->supplier->defaultTaxType);
        $this->assertEquals(1, $model1->supplier->defaultTaxType->id);
        $this->assertEquals('sample string 2', $model1->supplier->defaultTaxType->name);
        $this->assertEquals(3.1, $model1->supplier->defaultTaxType->percentage);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->isManualTax);
        $this->assertEquals('2017-07-24', $model1->supplier->defaultTaxType->created->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $model1->supplier->defaultTaxType->modified->format('Y-m-d'));
        $this->assertEquals(1, $model1->supplier->dueDateMethodId);
        $this->assertEquals(1, $model1->supplier->dueDateMethodValue);
        $this->assertEquals(33, $model1->supplier->id);
    }
}
