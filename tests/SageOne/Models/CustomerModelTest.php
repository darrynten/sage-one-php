<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Customer;
use DarrynTen\SageOne\Models\CustomerCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\SalesRepresentative;
use DarrynTen\SageOne\Models\AdditionalPriceList;

class CustomerModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(Customer::class, 'name');
    }

    public function testSetReadOnly()
    {
        $this->verifySetReadOnly(Customer::class, 'balance');
    }

    public function testNameLength()
    {
        $this->verifyBadStringLengthException(
            Customer::class,
            'name',
            0,
            100,
            str_repeat('x', 101)
        );
    }

    public function testAttributes()
    {
        $this->verifyAttributes(Customer::class, [
            'name' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'category' => [
                'type' => 'CustomerCategory',
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
                'nullable' => true,
                'readonly' => false,
            ],
            'taxReference' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'contactName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'telephone' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'fax' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'mobile' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'email' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'validate' => FILTER_VALIDATE_EMAIL,
            ],
            'webAddress' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'active' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'balance' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'creditLimit' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'communicationMethod' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
                'min' => 0,
                'max' => 3,
            ],
            'postalAddress01' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'postalAddress02' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'postalAddress03' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'postalAddress04' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'postalAddress05' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'deliveryAddress01' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'deliveryAddress02' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'deliveryAddress03' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'deliveryAddress04' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'deliveryAddress05' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'autoAllocateToOldestInvoice' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
            ],
            'enableCustomerZone' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'customerZoneGuid' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'cashSale' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
            ],
            'textField1' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'textField2' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'textField3' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'numericField1' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'numericField2' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'numericField3' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'yesNoField1' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'yesNoField2' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'yesNoField3' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'dateField1' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'dateField2' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'dateField3' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'defaultPriceListId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'defaultPriceList' => [
                'type' => 'AdditionalPriceList',
                'nullable' => false,
                'readonly' => false,
            ],
            'defaultPriceListName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'acceptsElectronicInvoices' => [
                'type' => 'boolean',
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
            'businessRegistrationNumber' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'taxStatusVerified' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'currencyId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'currencySymbol' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'hasActivity' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'defaultDiscountPercentage' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'defaultTaxTypeId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'defaultTaxType' => [
                'type' => 'TaxType',
                'nullable' => false,
                'readonly' => false,
            ],
            'dueDateMethodId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
                'min' => 0,
                'max' => 4
            ],
            'dueDateMethodValue' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(Customer::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(Customer::class, function ($results) {
            $this->assertCount(2, $results);

            $model1 = $results[0];
            $model2 = $results[1];
            $this->assertInstanceOf(Customer::class, $model1);
            $this->assertInstanceOf(Customer::class, $model2);
            $this->assertCount(58, json_decode($model1->toJson(), true));
            $this->assertCount(58, json_decode($model2->toJson(), true));

            $this->assertEquals('sample string 1', $model1->name);
            $this->assertEquals(1, $model1->salesRepresentativeId);
            $this->assertEquals('sample string 2', $model1->taxReference);
            $this->assertEquals('sample string 3', $model1->contactName);
            $this->assertEquals('sample string 4', $model1->telephone);
            $this->assertEquals('sample string 5', $model1->fax);
            $this->assertEquals('sample string 6', $model1->mobile);
            $this->assertEquals('email@example.com', $model1->email);
            $this->assertEquals('sample string 8', $model1->webAddress);
            $this->assertEquals(true, $model1->active);
            $this->assertEquals(10.0, $model1->balance);
            $this->assertEquals(11.0, $model1->creditLimit);
            $this->assertEquals(1, $model1->communicationMethod);
            $this->assertEquals('sample string 12', $model1->postalAddress01);
            $this->assertEquals('sample string 13', $model1->postalAddress02);
            $this->assertEquals('sample string 14', $model1->postalAddress03);
            $this->assertEquals('sample string 15', $model1->postalAddress04);
            $this->assertEquals('sample string 16', $model1->postalAddress05);
            $this->assertEquals('sample string 17', $model1->deliveryAddress01);
            $this->assertEquals('sample string 18', $model1->deliveryAddress02);
            $this->assertEquals('sample string 19', $model1->deliveryAddress03);
            $this->assertEquals('sample string 20', $model1->deliveryAddress04);
            $this->assertEquals('sample string 21', $model1->deliveryAddress05);
            $this->assertEquals(true, $model1->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $model1->enableCustomerZone);
            $this->assertEquals('d1ed88fd-5708-4d8e-a53c-b839824f361f', $model1->customerZoneGuid);
            $this->assertEquals(true, $model1->cashSale);
            $this->assertEquals('sample string 24', $model1->textField1);
            $this->assertEquals('sample string 25', $model1->textField2);
            $this->assertEquals('sample string 26', $model1->textField3);
            $this->assertEquals(1.0, $model1->numericField1);
            $this->assertEquals(1.0, $model1->numericField2);
            $this->assertEquals(1.0, $model1->numericField3);
            $this->assertEquals(true, $model1->yesNoField1);
            $this->assertEquals(true, $model1->yesNoField2);
            $this->assertEquals(true, $model1->yesNoField3);
            $this->assertEquals('2017-07-15', $model1->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $model1->defaultPriceListId);
            $this->assertEquals('sample string 2', $model1->defaultPriceListName);
            $this->assertEquals(true, $model1->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-15', $model1->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $model1->businessRegistrationNumber);
            $this->assertEquals('2017-07-15', $model1->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $model1->currencyId);
            $this->assertEquals('sample string 34', $model1->currencySymbol);
            $this->assertEquals(true, $model1->hasActivity);
            $this->assertEquals(1.0, $model1->defaultDiscountPercentage);
            $this->assertEquals(1, $model1->defaultTaxTypeId);
            $this->assertEquals(1, $model1->dueDateMethodId);
            $this->assertEquals(1, $model1->dueDateMethodValue);
            $this->assertEquals(36, $model1->id);

            $this->assertInstanceOf(CustomerCategory::class, $model1->category);
            $this->assertEquals('sample string 1', $model1->category->description);
            $this->assertEquals(2, $model1->category->id);
            $this->assertEquals('2017-07-15', $model1->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->category->created->format('Y-m-d'));

            $this->assertInstanceOf(SalesRepresentative::class, $model1->salesRepresentative);
            $this->assertEquals(1, $model1->salesRepresentative->id);
            $this->assertEquals('sample string 2', $model1->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $model1->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model1->salesRepresentative->name);
            $this->assertEquals(true, $model1->salesRepresentative->active);
            $this->assertEquals('sample string 6', $model1->salesRepresentative->email);
            $this->assertEquals('sample string 7', $model1->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $model1->salesRepresentative->telephone);
            $this->assertEquals('2017-07-15', $model1->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->salesRepresentative->modified->format('Y-m-d'));

            $this->assertInstanceOf(AdditionalPriceList::class, $model1->defaultPriceList);
            $this->assertEquals(1, $model1->defaultPriceList->id);
            $this->assertEquals('sample string 2', $model1->defaultPriceList->description);
            $this->assertEquals(true, $model1->defaultPriceList->isDefault);

            $this->assertInstanceOf(TaxType::class, $model1->defaultTaxType);
            $this->assertEquals(1, $model1->defaultTaxType->id);
            $this->assertEquals('sample string 2', $model1->defaultTaxType->name);
            $this->assertEquals(3.1, $model1->defaultTaxType->percentage);
            $this->assertEquals(true, $model1->defaultTaxType->isDefault);
            $this->assertEquals(true, $model1->defaultTaxType->hasActivity);
            $this->assertEquals(true, $model1->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-15', $model1->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->defaultTaxType->modified->format('Y-m-d'));

            $this->assertEquals('sample string 1', $model2->name);
            $this->assertEquals(1, $model2->salesRepresentativeId);
            $this->assertEquals('sample string 2', $model2->taxReference);
            $this->assertEquals('sample string 3', $model2->contactName);
            $this->assertEquals('sample string 4', $model2->telephone);
            $this->assertEquals('sample string 5', $model2->fax);
            $this->assertEquals('sample string 6', $model2->mobile);
            $this->assertEquals('email@example.com', $model2->email);
            $this->assertEquals('sample string 8', $model2->webAddress);
            $this->assertEquals(true, $model2->active);
            $this->assertEquals(10.0, $model2->balance);
            $this->assertEquals(11.0, $model2->creditLimit);
            $this->assertEquals(1, $model2->communicationMethod);
            $this->assertEquals('sample string 12', $model2->postalAddress01);
            $this->assertEquals('sample string 13', $model2->postalAddress02);
            $this->assertEquals('sample string 14', $model2->postalAddress03);
            $this->assertEquals('sample string 15', $model2->postalAddress04);
            $this->assertEquals('sample string 16', $model2->postalAddress05);
            $this->assertEquals('sample string 17', $model2->deliveryAddress01);
            $this->assertEquals('sample string 18', $model2->deliveryAddress02);
            $this->assertEquals('sample string 19', $model2->deliveryAddress03);
            $this->assertEquals('sample string 20', $model2->deliveryAddress04);
            $this->assertEquals('sample string 21', $model2->deliveryAddress05);
            $this->assertEquals(true, $model2->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $model2->enableCustomerZone);
            $this->assertEquals('d1ed88fd-5708-4d8e-a53c-b839824f361f', $model2->customerZoneGuid);
            $this->assertEquals(true, $model2->cashSale);
            $this->assertEquals('sample string 24', $model2->textField1);
            $this->assertEquals('sample string 25', $model2->textField2);
            $this->assertEquals('sample string 26', $model2->textField3);
            $this->assertEquals(1.0, $model2->numericField1);
            $this->assertEquals(1.0, $model2->numericField2);
            $this->assertEquals(1.0, $model2->numericField3);
            $this->assertEquals(true, $model2->yesNoField1);
            $this->assertEquals(true, $model2->yesNoField2);
            $this->assertEquals(true, $model2->yesNoField3);
            $this->assertEquals('2017-07-15', $model2->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $model2->defaultPriceListId);
            $this->assertEquals('sample string 2', $model2->defaultPriceListName);
            $this->assertEquals(true, $model2->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-15', $model2->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $model2->businessRegistrationNumber);
            $this->assertEquals('2017-07-15', $model2->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $model2->currencyId);
            $this->assertEquals('sample string 34', $model2->currencySymbol);
            $this->assertEquals(true, $model2->hasActivity);
            $this->assertEquals(1.0, $model2->defaultDiscountPercentage);
            $this->assertEquals(1, $model2->defaultTaxTypeId);
            $this->assertEquals(1, $model2->dueDateMethodId);
            $this->assertEquals(1, $model2->dueDateMethodValue);
            $this->assertEquals(36, $model2->id);

            $this->assertInstanceOf(CustomerCategory::class, $model2->category);
            $this->assertEquals('sample string 1', $model2->category->description);
            $this->assertEquals(2, $model2->category->id);
            $this->assertEquals('2017-07-15', $model2->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->category->created->format('Y-m-d'));

            $this->assertInstanceOf(SalesRepresentative::class, $model2->salesRepresentative);
            $this->assertEquals(1, $model2->salesRepresentative->id);
            $this->assertEquals('sample string 2', $model2->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $model2->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model2->salesRepresentative->name);
            $this->assertEquals(true, $model2->salesRepresentative->active);
            $this->assertEquals('sample string 6', $model2->salesRepresentative->email);
            $this->assertEquals('sample string 7', $model2->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $model2->salesRepresentative->telephone);
            $this->assertEquals('2017-07-15', $model2->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->salesRepresentative->modified->format('Y-m-d'));

            $this->assertInstanceOf(AdditionalPriceList::class, $model2->defaultPriceList);
            $this->assertEquals(1, $model2->defaultPriceList->id);
            $this->assertEquals('sample string 2', $model2->defaultPriceList->description);
            $this->assertEquals(true, $model2->defaultPriceList->isDefault);

            $this->assertInstanceOf(TaxType::class, $model2->defaultTaxType);
            $this->assertEquals(1, $model2->defaultTaxType->id);
            $this->assertEquals('sample string 2', $model2->defaultTaxType->name);
            $this->assertEquals(3.1, $model2->defaultTaxType->percentage);
            $this->assertEquals(true, $model2->defaultTaxType->isDefault);
            $this->assertEquals(true, $model2->defaultTaxType->hasActivity);
            $this->assertEquals(true, $model2->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-15', $model2->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->defaultTaxType->modified->format('Y-m-d'));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(Customer::class, 36, function ($model) {
            $this->assertInstanceOf(Customer::class, $model);
            $this->assertCount(58, json_decode($model->toJson(), true));

            $this->assertEquals('sample string 1', $model->name);
            $this->assertEquals(1, $model->salesRepresentativeId);
            $this->assertEquals('sample string 2', $model->taxReference);
            $this->assertEquals('sample string 3', $model->contactName);
            $this->assertEquals('sample string 4', $model->telephone);
            $this->assertEquals('sample string 5', $model->fax);
            $this->assertEquals('sample string 6', $model->mobile);
            $this->assertEquals('email@example.com', $model->email);
            $this->assertEquals('sample string 8', $model->webAddress);
            $this->assertEquals(true, $model->active);
            $this->assertEquals(10.0, $model->balance);
            $this->assertEquals(11.0, $model->creditLimit);
            $this->assertEquals(1, $model->communicationMethod);
            $this->assertEquals('sample string 12', $model->postalAddress01);
            $this->assertEquals('sample string 13', $model->postalAddress02);
            $this->assertEquals('sample string 14', $model->postalAddress03);
            $this->assertEquals('sample string 15', $model->postalAddress04);
            $this->assertEquals('sample string 16', $model->postalAddress05);
            $this->assertEquals('sample string 17', $model->deliveryAddress01);
            $this->assertEquals('sample string 18', $model->deliveryAddress02);
            $this->assertEquals('sample string 19', $model->deliveryAddress03);
            $this->assertEquals('sample string 20', $model->deliveryAddress04);
            $this->assertEquals('sample string 21', $model->deliveryAddress05);
            $this->assertEquals(true, $model->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $model->enableCustomerZone);
            $this->assertEquals('16cc9f67-a437-4d5c-8aa8-1447e645f9c9', $model->customerZoneGuid);
            $this->assertEquals(true, $model->cashSale);
            $this->assertEquals('sample string 24', $model->textField1);
            $this->assertEquals('sample string 25', $model->textField2);
            $this->assertEquals('sample string 26', $model->textField3);
            $this->assertEquals(1.0, $model->numericField1);
            $this->assertEquals(1.0, $model->numericField2);
            $this->assertEquals(1.0, $model->numericField3);
            $this->assertEquals(true, $model->yesNoField1);
            $this->assertEquals(true, $model->yesNoField2);
            $this->assertEquals(true, $model->yesNoField3);
            $this->assertEquals('2017-07-15', $model->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $model->defaultPriceListId);
            $this->assertEquals('sample string 2', $model->defaultPriceListName);
            $this->assertEquals(true, $model->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-15', $model->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $model->businessRegistrationNumber);
            $this->assertEquals('2017-07-15', $model->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $model->currencyId);
            $this->assertEquals('sample string 34', $model->currencySymbol);
            $this->assertEquals(true, $model->hasActivity);
            $this->assertEquals(1.0, $model->defaultDiscountPercentage);
            $this->assertEquals(1, $model->defaultTaxTypeId);
            $this->assertEquals(1, $model->dueDateMethodId);
            $this->assertEquals(1, $model->dueDateMethodValue);
            $this->assertEquals(36, $model->id);

            $this->assertInstanceOf(CustomerCategory::class, $model->category);
            $this->assertEquals('sample string 1', $model->category->description);
            $this->assertEquals(2, $model->category->id);
            $this->assertEquals('2017-07-15', $model->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->category->created->format('Y-m-d'));

            $this->assertInstanceOf(SalesRepresentative::class, $model->salesRepresentative);
            $this->assertEquals(1, $model->salesRepresentative->id);
            $this->assertEquals('sample string 2', $model->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $model->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model->salesRepresentative->name);
            $this->assertEquals(true, $model->salesRepresentative->active);
            $this->assertEquals('sample string 6', $model->salesRepresentative->email);
            $this->assertEquals('sample string 7', $model->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $model->salesRepresentative->telephone);
            $this->assertEquals('2017-07-15', $model->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->salesRepresentative->modified->format('Y-m-d'));

            $this->assertInstanceOf(AdditionalPriceList::class, $model->defaultPriceList);
            $this->assertEquals(1, $model->defaultPriceList->id);
            $this->assertEquals('sample string 2', $model->defaultPriceList->description);
            $this->assertEquals(true, $model->defaultPriceList->isDefault);

            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertEquals(1, $model->defaultTaxType->id);
            $this->assertEquals('sample string 2', $model->defaultTaxType->name);
            $this->assertEquals(3.1, $model->defaultTaxType->percentage);
            $this->assertEquals(true, $model->defaultTaxType->isDefault);
            $this->assertEquals(true, $model->defaultTaxType->hasActivity);
            $this->assertEquals(true, $model->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-15', $model->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->defaultTaxType->modified->format('Y-m-d'));
        });
    }

    public function testSave()
    {
        $this->verifySave(Customer::class, function ($model) {
            $model->name = 'sample string 1';
            $model->salesRepresentativeId = 1;
            $model->taxReference = 'sample string 2';
            $model->contactName = 'sample string 3';
            $model->telephone = 'sample string 4';
            $model->fax = 'sample string 5';
            $model->mobile = 'sample string 6';
            $model->email = 'email@example.com';
            $model->webAddress = 'sample string 8';
            $model->active = true;
            $model->creditLimit = 11.0;
            $model->communicationMethod = 1;
            $model->postalAddress01 = 'sample string 12';
            $model->postalAddress02 = 'sample string 13';
            $model->postalAddress03 = 'sample string 14';
            $model->postalAddress04 = 'sample string 15';
            $model->postalAddress05 = 'sample string 16';
            $model->deliveryAddress01 = 'sample string 17';
            $model->deliveryAddress02 = 'sample string 18';
            $model->deliveryAddress03 = 'sample string 19';
            $model->deliveryAddress04 = 'sample string 20';
            $model->deliveryAddress05 = 'sample string 21';
            $model->autoAllocateToOldestInvoice = true;
            $model->enableCustomerZone = true;
            $model->customerZoneGuid = '45ad73c7-7467-4ff2-bd9a-01679cb5e3e6';
            $model->cashSale = true;
            $model->textField1 = 'sample string 24';
            $model->textField2 = 'sample string 25';
            $model->textField3 = 'sample string 26';
            $model->numericField1 = 1.0;
            $model->numericField2 = 1.0;
            $model->numericField3 = 1.0;
            $model->yesNoField1 = true;
            $model->yesNoField2 = true;
            $model->yesNoField3 = true;
            $model->dateField1 = '2017-07-15';
            $model->dateField2 = '2017-07-15';
            $model->dateField3 = '2017-07-15';
            $model->defaultPriceListId = 1;
            $model->defaultPriceListName = 'sample string 2';
            $model->acceptsElectronicInvoices = true;
            $model->businessRegistrationNumber = 'sample string 33';
            $model->taxStatusVerified = '2017-07-15';
            $model->currencyId = 1;
            $model->currencySymbol = 'sample string 34';
            $model->defaultDiscountPercentage = 1.0;
            $model->defaultTaxTypeId = 1;
            $model->dueDateMethodId = 1;
            $model->dueDateMethodValue = 1;
        }, function ($savedModel) {
            $this->assertInstanceOf(Customer::class, $savedModel);
            $this->assertCount(58, json_decode($savedModel->toJson(), true));

            $this->assertEquals('sample string 1', $savedModel->name);
            $this->assertEquals(1, $savedModel->salesRepresentativeId);
            $this->assertEquals('sample string 2', $savedModel->taxReference);
            $this->assertEquals('sample string 3', $savedModel->contactName);
            $this->assertEquals('sample string 4', $savedModel->telephone);
            $this->assertEquals('sample string 5', $savedModel->fax);
            $this->assertEquals('sample string 6', $savedModel->mobile);
            $this->assertEquals('email@example.com', $savedModel->email);
            $this->assertEquals('sample string 8', $savedModel->webAddress);
            $this->assertEquals(true, $savedModel->active);
            $this->assertEquals(10.0, $savedModel->balance);
            $this->assertEquals(11.0, $savedModel->creditLimit);
            $this->assertEquals(1, $savedModel->communicationMethod);
            $this->assertEquals('sample string 12', $savedModel->postalAddress01);
            $this->assertEquals('sample string 13', $savedModel->postalAddress02);
            $this->assertEquals('sample string 14', $savedModel->postalAddress03);
            $this->assertEquals('sample string 15', $savedModel->postalAddress04);
            $this->assertEquals('sample string 16', $savedModel->postalAddress05);
            $this->assertEquals('sample string 17', $savedModel->deliveryAddress01);
            $this->assertEquals('sample string 18', $savedModel->deliveryAddress02);
            $this->assertEquals('sample string 19', $savedModel->deliveryAddress03);
            $this->assertEquals('sample string 20', $savedModel->deliveryAddress04);
            $this->assertEquals('sample string 21', $savedModel->deliveryAddress05);
            $this->assertEquals(true, $savedModel->autoAllocateToOldestInvoice);
            $this->assertEquals(true, $savedModel->enableCustomerZone);
            $this->assertEquals('45ad73c7-7467-4ff2-bd9a-01679cb5e3e6', $savedModel->customerZoneGuid);
            $this->assertEquals(true, $savedModel->cashSale);
            $this->assertEquals('sample string 24', $savedModel->textField1);
            $this->assertEquals('sample string 25', $savedModel->textField2);
            $this->assertEquals('sample string 26', $savedModel->textField3);
            $this->assertEquals(1.0, $savedModel->numericField1);
            $this->assertEquals(1.0, $savedModel->numericField2);
            $this->assertEquals(1.0, $savedModel->numericField3);
            $this->assertEquals(true, $savedModel->yesNoField1);
            $this->assertEquals(true, $savedModel->yesNoField2);
            $this->assertEquals(true, $savedModel->yesNoField3);
            $this->assertEquals('2017-07-15', $savedModel->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->dateField3->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->defaultPriceListId);
            $this->assertEquals('sample string 2', $savedModel->defaultPriceListName);
            $this->assertEquals(true, $savedModel->acceptsElectronicInvoices);
            $this->assertEquals('2017-07-15', $savedModel->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->created->format('Y-m-d'));
            $this->assertEquals('sample string 33', $savedModel->businessRegistrationNumber);
            $this->assertEquals('2017-07-15', $savedModel->taxStatusVerified->format('Y-m-d'));
            $this->assertEquals(1, $savedModel->currencyId);
            $this->assertEquals('sample string 34', $savedModel->currencySymbol);
            $this->assertEquals(true, $savedModel->hasActivity);
            $this->assertEquals(1.0, $savedModel->defaultDiscountPercentage);
            $this->assertEquals(1, $savedModel->defaultTaxTypeId);
            $this->assertEquals(1, $savedModel->dueDateMethodId);
            $this->assertEquals(1, $savedModel->dueDateMethodValue);
            $this->assertEquals(36, $savedModel->id);

            $this->assertInstanceOf(CustomerCategory::class, $savedModel->category);
            $this->assertEquals('sample string 1', $savedModel->category->description);
            $this->assertEquals(2, $savedModel->category->id);
            $this->assertEquals('2017-07-15', $savedModel->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->category->created->format('Y-m-d'));

            $this->assertInstanceOf(SalesRepresentative::class, $savedModel->salesRepresentative);
            $this->assertEquals(1, $savedModel->salesRepresentative->id);
            $this->assertEquals('sample string 2', $savedModel->salesRepresentative->firstName);
            $this->assertEquals('sample string 3', $savedModel->salesRepresentative->lastName);
            $this->assertEquals('sample string 2 sample string 3', $savedModel->salesRepresentative->name);
            $this->assertEquals(true, $savedModel->salesRepresentative->active);
            $this->assertEquals('sample string 6', $savedModel->salesRepresentative->email);
            $this->assertEquals('sample string 7', $savedModel->salesRepresentative->mobile);
            $this->assertEquals('sample string 8', $savedModel->salesRepresentative->telephone);
            $this->assertEquals('2017-07-15', $savedModel->salesRepresentative->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->salesRepresentative->modified->format('Y-m-d'));

            $this->assertInstanceOf(AdditionalPriceList::class, $savedModel->defaultPriceList);
            $this->assertEquals(1, $savedModel->defaultPriceList->id);
            $this->assertEquals('sample string 2', $savedModel->defaultPriceList->description);
            $this->assertEquals(true, $savedModel->defaultPriceList->isDefault);

            $this->assertInstanceOf(TaxType::class, $savedModel->defaultTaxType);
            $this->assertEquals(1, $savedModel->defaultTaxType->id);
            $this->assertEquals('sample string 2', $savedModel->defaultTaxType->name);
            $this->assertEquals(3.1, $savedModel->defaultTaxType->percentage);
            $this->assertEquals(true, $savedModel->defaultTaxType->isDefault);
            $this->assertEquals(true, $savedModel->defaultTaxType->hasActivity);
            $this->assertEquals(true, $savedModel->defaultTaxType->isManualTax);
            $this->assertEquals('2017-07-15', $savedModel->defaultTaxType->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->defaultTaxType->modified->format('Y-m-d'));
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(Customer::class, 36, true);
    }
}
