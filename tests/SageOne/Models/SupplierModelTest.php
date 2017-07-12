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
        $this->verifyInject(Supplier::class, function ($model, $data) {
            $this->assertEquals($model->id, 33);
            $this->assertEquals($model->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-07-12');
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
            $this->assertEquals($model->dateField1->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->dateField2->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->dateField3->format('Y-m-d'), '2017-07-12');
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->taxStatusVerified->format('Y-m-d'), '2017-07-12');
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
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-07-12');
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
            $model = $results[0];

            $this->assertEquals($model->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-07-12');
            $this->assertTrue($model->active);
            $this->assertEquals($model->balance, 10.0);
            $this->assertEquals($model->creditLimit, 11.0);
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertTrue($model->hasActivity);
            $this->assertEquals($model->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertEquals($model->defaultTaxType->id, 1);
            $this->assertEquals($model->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->defaultTaxType->isDefault);
            $this->assertTrue($model->defaultTaxType->hasActivity);
            $this->assertTrue($model->defaultTaxType->isManualTax);
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->id, 33);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(Supplier::class, 33, function ($model) {
            $this->assertEquals($model->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-07-12');
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
            $this->assertEquals($model->dateField1->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->dateField2->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->dateField3->format('Y-m-d'), '2017-07-12');
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->taxStatusVerified->format('Y-m-d'), '2017-07-12');
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
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-07-12');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-07-12');
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
}
