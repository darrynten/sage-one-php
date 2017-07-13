<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(Supplier::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(Supplier::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(Supplier::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(Supplier::class, 'name');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(Supplier::class, 'autoAllocateToOldestInvoice');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(Supplier::class, 'name');
    }

    public function testInject()
    {
        $this->verifyInject(Supplier::class, function ($model) {
            $this->assertEquals($model->id, 33);
            $this->assertEquals($model->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->taxReference, 'sample string 2');
            $this->assertEquals($model->contactName, 'sample string 3');
            $this->assertEquals($model->telephone, 'sample string 4');
            $this->assertEquals($model->fax, 'sample string 5');
            $this->assertEquals($model->mobile, 'sample string 6');
            $this->assertEquals($model->email, 'sample string 7');
            $this->assertEquals($model->webAddress, 'sample string 8');
            $this->assertTrue($model->active);
            $this->assertEquals($model->balance, 10.0);
            $this->assertEquals($model->creditLimit, 11.0);
            $this->assertEquals($model->postalAddress01, 'sample string 12');
            $this->assertEquals($model->postalAddress02, 'sample string 13');
            $this->assertEquals($model->postalAddress03, 'sample string 14');
            $this->assertEquals($model->postalAddress04, 'sample string 15');
            $this->assertEquals($model->postalAddress05, 'sample string 16');
            $this->assertEquals($model->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model->autoAllocateToOldestInvoice);
            $this->assertEquals($model->textField1, 'sample string 22');
            $this->assertEquals($model->textField2, 'sample string 23');
            $this->assertEquals($model->textField3, 'sample string 24');
            $this->assertEquals($model->numericField1, 1.0);
            $this->assertEquals($model->numericField2, 1.0);
            $this->assertEquals($model->numericField3, 1.0);
            $this->assertTrue($model->yesNoField1);
            $this->assertTrue($model->yesNoField2);
            $this->assertTrue($model->yesNoField3);
            $this->assertEquals($model->dateField1->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->dateField2->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->dateField3->format('Y-m-d'), '2017-07-04');
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->taxStatusVerified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->currencyId, 1);
            $this->assertEquals($model->currencySymbol, 'sample string 31');
            $this->assertTrue($model->hasActivity);
            $this->assertEquals($model->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertEquals($model->defaultTaxType->id, 1);
            $this->assertEquals($model->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->defaultTaxType->isDefault);
            $this->assertTrue($model->defaultTaxType->hasActivity);
            $this->assertTrue($model->defaultTaxType->isManualTax);
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->dueDateMethodId, 1);
            $this->assertEquals($model->dueDateMethodValue, 1);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(49, $objArray);
        });
    }

    public function testAttributes()
    {
        $this->verifyAttributes(Supplier::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'name' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'category' => [
                'type' => 'SupplierCategory',
                'nullable' => false,
                'readonly' => false,
            ],
            'taxReference' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'contactName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'telephone' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'fax' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'mobile' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'email' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'webAddress' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
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
            'postalAddress01' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'postalAddress02' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'postalAddress03' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'postalAddress04' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'postalAddress05' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'deliveryAddress01' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'deliveryAddress02' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'deliveryAddress03' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'deliveryAddress04' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'deliveryAddress05' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'autoAllocateToOldestInvoice' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
            ],
            'textField1' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'textField2' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'textField3' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
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
            'RMCDApprovalNumber' => [
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
            ],
            'dueDateMethodValue' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ]
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(Supplier::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(Supplier::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(Supplier::class, $results[0]);
            $this->assertInstanceOf(Supplier::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model1->category);
            $this->assertEquals($model1->category->description, 'sample string 1');
            $this->assertEquals($model1->category->id, 2);
            $this->assertEquals($model1->category->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->category->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->taxReference, 'sample string 2');
            $this->assertEquals($model1->contactName, 'sample string 3');
            $this->assertEquals($model1->telephone, 'sample string 4');
            $this->assertEquals($model1->fax, 'sample string 5');
            $this->assertEquals($model1->mobile, 'sample string 6');
            $this->assertEquals($model1->email, 'sample string 7');
            $this->assertEquals($model1->webAddress, 'sample string 8');
            $this->assertTrue($model1->active);
            $this->assertEquals($model1->balance, 10.0);
            $this->assertEquals($model1->creditLimit, 11.0);
            $this->assertEquals($model1->postalAddress01, 'sample string 12');
            $this->assertEquals($model1->postalAddress02, 'sample string 13');
            $this->assertEquals($model1->postalAddress03, 'sample string 14');
            $this->assertEquals($model1->postalAddress04, 'sample string 15');
            $this->assertEquals($model1->postalAddress05, 'sample string 16');
            $this->assertEquals($model1->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model1->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model1->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model1->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model1->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model1->autoAllocateToOldestInvoice);
            $this->assertEquals($model1->textField1, 'sample string 22');
            $this->assertEquals($model1->textField2, 'sample string 23');
            $this->assertEquals($model1->textField3, 'sample string 24');
            $this->assertEquals($model1->numericField1, 1.0);
            $this->assertEquals($model1->numericField2, 1.0);
            $this->assertEquals($model1->numericField3, 1.0);
            $this->assertTrue($model1->yesNoField1);
            $this->assertTrue($model1->yesNoField2);
            $this->assertTrue($model1->yesNoField3);
            $this->assertEquals($model1->dateField1->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->dateField2->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->dateField3->format('Y-m-d'), '2017-07-04');
            $this->assertInstanceOf(\DateTime::class, $model1->modified);
            $this->assertEquals($model1->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model1->created);
            $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model1->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model1->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model1->taxStatusVerified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->currencyId, 1);
            $this->assertEquals($model1->currencySymbol, 'sample string 31');
            $this->assertTrue($model1->hasActivity);
            $this->assertEquals($model1->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model1->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model1->defaultTaxType);
            $this->assertEquals($model1->defaultTaxType->id, 1);
            $this->assertEquals($model1->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model1->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model1->defaultTaxType->isDefault);
            $this->assertTrue($model1->defaultTaxType->hasActivity);
            $this->assertTrue($model1->defaultTaxType->isManualTax);
            $this->assertEquals($model1->defaultTaxType->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->defaultTaxType->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model1->dueDateMethodId, 1);
            $this->assertEquals($model1->dueDateMethodValue, 1);
            $this->assertEquals($model1->id, 33);

            $model2 = $results[1];
            $this->assertEquals($model2->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model2->category);
            $this->assertEquals($model2->category->description, 'sample string 1');
            $this->assertEquals($model2->category->id, 2);
            $this->assertEquals($model2->category->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->category->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->taxReference, 'sample string 2');
            $this->assertEquals($model2->contactName, 'sample string 3');
            $this->assertEquals($model2->telephone, 'sample string 4');
            $this->assertEquals($model2->fax, 'sample string 5');
            $this->assertEquals($model2->mobile, 'sample string 6');
            $this->assertEquals($model2->email, 'sample string 7');
            $this->assertEquals($model2->webAddress, 'sample string 8');
            $this->assertTrue($model2->active);
            $this->assertEquals($model2->balance, 10.0);
            $this->assertEquals($model2->creditLimit, 11.0);
            $this->assertEquals($model2->postalAddress01, 'sample string 12');
            $this->assertEquals($model2->postalAddress02, 'sample string 13');
            $this->assertEquals($model2->postalAddress03, 'sample string 14');
            $this->assertEquals($model2->postalAddress04, 'sample string 15');
            $this->assertEquals($model2->postalAddress05, 'sample string 16');
            $this->assertEquals($model2->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model2->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model2->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model2->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model2->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model2->autoAllocateToOldestInvoice);
            $this->assertEquals($model2->textField1, 'sample string 22');
            $this->assertEquals($model2->textField2, 'sample string 23');
            $this->assertEquals($model2->textField3, 'sample string 24');
            $this->assertEquals($model2->numericField1, 1.0);
            $this->assertEquals($model2->numericField2, 1.0);
            $this->assertEquals($model2->numericField3, 1.0);
            $this->assertTrue($model2->yesNoField1);
            $this->assertTrue($model2->yesNoField2);
            $this->assertTrue($model2->yesNoField3);
            $this->assertEquals($model2->dateField1->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->dateField2->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->dateField3->format('Y-m-d'), '2017-07-04');
            $this->assertInstanceOf(\DateTime::class, $model2->modified);
            $this->assertEquals($model2->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model2->created);
            $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model2->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model2->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model2->taxStatusVerified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->currencyId, 1);
            $this->assertEquals($model2->currencySymbol, 'sample string 31');
            $this->assertTrue($model2->hasActivity);
            $this->assertEquals($model2->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model2->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model2->defaultTaxType);
            $this->assertEquals($model2->defaultTaxType->id, 1);
            $this->assertEquals($model2->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model2->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model2->defaultTaxType->isDefault);
            $this->assertTrue($model2->defaultTaxType->hasActivity);
            $this->assertTrue($model2->defaultTaxType->isManualTax);
            $this->assertEquals($model2->defaultTaxType->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->defaultTaxType->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model2->dueDateMethodId, 1);
            $this->assertEquals($model2->dueDateMethodValue, 1);
            $this->assertEquals($model2->id, 33);

            $this->assertCount(49, json_decode($model1->toJson(), true));
            $this->assertCount(49, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(Supplier::class, 33, function ($model) {
            $this->assertEquals($model->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->taxReference, 'sample string 2');
            $this->assertEquals($model->contactName, 'sample string 3');
            $this->assertEquals($model->telephone, 'sample string 4');
            $this->assertEquals($model->fax, 'sample string 5');
            $this->assertEquals($model->mobile, 'sample string 6');
            $this->assertEquals($model->email, 'sample string 7');
            $this->assertEquals($model->webAddress, 'sample string 8');
            $this->assertTrue($model->active);
            $this->assertEquals($model->balance, 10.0);
            $this->assertEquals($model->creditLimit, 11.0);
            $this->assertEquals($model->postalAddress01, 'sample string 12');
            $this->assertEquals($model->postalAddress02, 'sample string 13');
            $this->assertEquals($model->postalAddress03, 'sample string 14');
            $this->assertEquals($model->postalAddress04, 'sample string 15');
            $this->assertEquals($model->postalAddress05, 'sample string 16');
            $this->assertEquals($model->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model->autoAllocateToOldestInvoice);
            $this->assertEquals($model->textField1, 'sample string 22');
            $this->assertEquals($model->textField2, 'sample string 23');
            $this->assertEquals($model->textField3, 'sample string 24');
            $this->assertEquals($model->numericField1, 1.0);
            $this->assertEquals($model->numericField2, 1.0);
            $this->assertEquals($model->numericField3, 1.0);
            $this->assertTrue($model->yesNoField1);
            $this->assertTrue($model->yesNoField2);
            $this->assertTrue($model->yesNoField3);
            $this->assertEquals($model->dateField1->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->dateField2->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->dateField3->format('Y-m-d'), '2017-07-04');
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->taxStatusVerified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->currencyId, 1);
            $this->assertEquals($model->currencySymbol, 'sample string 31');
            $this->assertTrue($model->hasActivity);
            $this->assertEquals($model->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertEquals($model->defaultTaxType->id, 1);
            $this->assertEquals($model->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->defaultTaxType->isDefault);
            $this->assertTrue($model->defaultTaxType->hasActivity);
            $this->assertTrue($model->defaultTaxType->isManualTax);
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($model->dueDateMethodId, 1);
            $this->assertEquals($model->dueDateMethodValue, 1);
            $this->assertEquals($model->id, 33);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(Supplier::class, 33, function () {
            // TODO do actual checks
        });
    }

    public function testSave()
    {
        $this->verifySave(Supplier::class, function ($model) {
            $model->name = 'sample string 1';
            $model->category->description =  'sample string 1';
            $model->category->id = 2;
            $model->category->modified = '2017-07-04';
            $model->category->created = '2017-07-04';
            $model->taxReference = 'sample string 2';
            $model->contactName = 'sample string 3';
            $model->telephone = 'sample string 4';
            $model->fax = 'sample string 5';
            $model->mobile = 'sample string 6';
            $model->email = 'sample string 7';
            $model->webAddress = 'sample string 8';
            $model->active = true;
            $model->creditLimit = 11.0;
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
            $model->textField1 = 'sample string 22';
            $model->textField2 = 'sample string 23';
            $model->textField3 = 'sample string 24';
            $model->numericField1 = 1.0;
            $model->numericField2 = 1.0;
            $model->numericField3 = 1.0;
            $model->yesNoField1 = true;
            $model->yesNoField2 = true;
            $model->yesNoField3 = true;
            $model->dateField1 = '2017-07-04';
            $model->dateField2 = '2017-07-04';
            $model->dateField3 = '2017-07-04';
            $model->businessRegistrationNumber = 'sample string 29';
            $model->RMCDApprovalNumber = 'sample string 30';
            $model->taxStatusVerified = '2017-07-04';
            $model->currencyId = 1;
            $model->currencySymbol = 'sample string 31';
            $model->defaultDiscountPercentage = 1.0;
            $model->defaultTaxTypeId = 1;
            $model->defaultTaxType->id = 1;
            $model->defaultTaxType->name = 'sample string 2';
            $model->defaultTaxType->percentage = 3.1;
            $model->defaultTaxType->isDefault = true;
            $model->defaultTaxType->isManualTax = true;
            $model->dueDateMethodId = 1;
            $model->dueDateMethodValue = 1;
            $model->id = 33;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->name, 'sample string 1');
            $this->assertEquals($savedModel->category->description, 'sample string 1');
            $this->assertEquals($savedModel->category->id, 2);
            $this->assertEquals($savedModel->category->modified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($savedModel->category->created->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($savedModel->taxReference, 'sample string 2');
            $this->assertEquals($savedModel->contactName, 'sample string 3');
            $this->assertEquals($savedModel->telephone, 'sample string 4');
            $this->assertEquals($savedModel->fax, 'sample string 5');
            $this->assertEquals($savedModel->mobile, 'sample string 6');
            $this->assertEquals($savedModel->email, 'sample string 7');
            $this->assertEquals($savedModel->webAddress, 'sample string 8');
            $this->assertTrue($savedModel->active);
            $this->assertEquals($savedModel->creditLimit, 11.0);
            $this->assertEquals($savedModel->postalAddress01, 'sample string 12');
            $this->assertEquals($savedModel->postalAddress02, 'sample string 13');
            $this->assertEquals($savedModel->postalAddress03, 'sample string 14');
            $this->assertEquals($savedModel->postalAddress04, 'sample string 15');
            $this->assertEquals($savedModel->postalAddress05, 'sample string 16');
            $this->assertEquals($savedModel->deliveryAddress01, 'sample string 17');
            $this->assertEquals($savedModel->deliveryAddress02, 'sample string 18');
            $this->assertEquals($savedModel->deliveryAddress03, 'sample string 19');
            $this->assertEquals($savedModel->deliveryAddress04, 'sample string 20');
            $this->assertEquals($savedModel->deliveryAddress05, 'sample string 21');
            $this->assertTrue($savedModel->autoAllocateToOldestInvoice);
            $this->assertEquals($savedModel->textField1, 'sample string 22');
            $this->assertEquals($savedModel->textField2, 'sample string 23');
            $this->assertEquals($savedModel->textField3, 'sample string 24');
            $this->assertEquals($savedModel->numericField1, 1.0);
            $this->assertEquals($savedModel->numericField2, 1.0);
            $this->assertEquals($savedModel->numericField3, 1.0);
            $this->assertTrue($savedModel->yesNoField1);
            $this->assertTrue($savedModel->yesNoField2);
            $this->assertTrue($savedModel->yesNoField3);
            $this->assertEquals($savedModel->dateField1->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($savedModel->dateField2->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($savedModel->dateField3->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($savedModel->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($savedModel->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($savedModel->taxStatusVerified->format('Y-m-d'), '2017-07-04');
            $this->assertEquals($savedModel->currencyId, 1);
            $this->assertEquals($savedModel->currencySymbol, 'sample string 31');
            $this->assertEquals($savedModel->defaultDiscountPercentage, 1.0);
            $this->assertEquals($savedModel->defaultTaxTypeId, 1);
            $this->assertEquals($savedModel->defaultTaxType->id, 1);
            $this->assertEquals($savedModel->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($savedModel->defaultTaxType->percentage, 3.1);
            $this->assertTrue($savedModel->defaultTaxType->isDefault);
            $this->assertTrue($savedModel->defaultTaxType->isManualTax);
            $this->assertEquals($savedModel->dueDateMethodId, 1);
            $this->assertEquals($savedModel->dueDateMethodValue, 1);
            $this->assertEquals($savedModel->id, 33);
        });
    }
}
