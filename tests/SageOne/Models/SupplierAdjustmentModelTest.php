<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierAdjustment;
use DarrynTen\SageOne\Models\Account;
use DarrynTen\SageOne\Models\AccountCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\SupplierCategory;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierAdjustmentModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierAdjustment::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierAdjustment::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierAdjustment::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierAdjustment::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(SupplierAdjustment::class, 'analysisCategoryId1');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierAdjustment::class, 'date');
    }

    public function testSetReadOnly()
    {
        $this->verifySetReadOnly(SupplierAdjustment::class, 'account');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierAdjustment::class, [
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
            'supplierId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
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
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'taxTypeId' => [
                'type' => 'integer',
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
            'contraAccountId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'memo' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'hasAttachments' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'supplier' => [
                'type' => 'Supplier',
                'nullable' => false,
                'readonly' => false,
            ],
            'accountName' => [
                'type' => 'string',
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
            'account' => [
                'type' => 'Account',
                'nullable' => false,
                'readonly' => true,
            ],
            'locked' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'taxPeriodId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => true,
            ],
            'totalOutstanding' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => true,
            ],
            'inclusive' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
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
            ]
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierAdjustment::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierAdjustment::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(SupplierAdjustment::class, $results[0]);
            $this->assertInstanceOf(SupplierAdjustment::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->date->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplierId, 3);
            $this->assertEquals($model1->documentNumber, 'sample string 4');
            $this->assertEquals($model1->reference, 'sample string 5');
            $this->assertEquals($model1->description, 'sample string 6');
            $this->assertEquals($model1->taxTypeId, 7);
            $this->assertEquals($model1->exclusive, 8.0);
            $this->assertEquals($model1->tax, 9.0);
            $this->assertEquals($model1->total, 10.0);
            $this->assertEquals($model1->contraAccountId, 11);
            $this->assertEquals($model1->memo, 'sample string 12');
            $this->assertTrue($model1->hasAttachments);
            $this->assertInstanceOf(Supplier::class, $model1->supplier);
            $this->assertEquals($model1->supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model1->supplier->category);
            $this->assertEquals($model1->supplier->category->description, 'sample string 1');
            $this->assertEquals($model1->supplier->category->id, 2);
            $this->assertEquals($model1->supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model1->supplier->contactName, 'sample string 3');
            $this->assertEquals($model1->supplier->telephone, 'sample string 4');
            $this->assertEquals($model1->supplier->fax, 'sample string 5');
            $this->assertEquals($model1->supplier->mobile, 'sample string 6');
            $this->assertEquals($model1->supplier->email, 'sample string 7');
            $this->assertEquals($model1->supplier->webAddress, 'sample string 8');
            $this->assertTrue($model1->supplier->active);
            $this->assertEquals($model1->supplier->balance, 10.0);
            $this->assertEquals($model1->supplier->creditLimit, 11.0);
            $this->assertEquals($model1->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model1->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model1->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model1->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model1->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model1->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model1->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model1->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model1->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model1->supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model1->supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model1->supplier->textField1, 'sample string 22');
            $this->assertEquals($model1->supplier->textField2, 'sample string 23');
            $this->assertEquals($model1->supplier->textField3, 'sample string 24');
            $this->assertEquals($model1->supplier->numericField1, 1.0);
            $this->assertEquals($model1->supplier->numericField2, 1.0);
            $this->assertEquals($model1->supplier->numericField3, 1.0);
            $this->assertTrue($model1->supplier->yesNoField1);
            $this->assertTrue($model1->supplier->yesNoField2);
            $this->assertTrue($model1->supplier->yesNoField3);
            $this->assertEquals($model1->supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model1->supplier->modified);
            $this->assertEquals($model1->supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model1->supplier->created);
            $this->assertEquals($model1->supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model1->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model1->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model1->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->currencyId, 1);
            $this->assertEquals($model1->supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model1->supplier->hasActivity);
            $this->assertEquals($model1->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model1->supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model1->supplier->defaultTaxType);
            $this->assertEquals($model1->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model1->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model1->supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model1->supplier->defaultTaxType->isDefault);
            $this->assertTrue($model1->supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model1->supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model1->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->supplier->dueDateMethodId, 1);
            $this->assertEquals($model1->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model1->supplier->id, 33);
            $this->assertEquals($model1->accountName, 'sample string 14');
            $this->assertEquals($model1->analysisCategoryId1, 1);
            $this->assertEquals($model1->analysisCategoryId2, 1);
            $this->assertEquals($model1->analysisCategoryId3, 1);
            $this->assertInstanceOf(Account::class, $model1->account);
            $this->assertEquals($model1->account->name, 'sample string 2');
            $this->assertInstanceOf(AccountCategory::class, $model1->account->category);
            $this->assertEquals($model1->account->category->comment, 'sample string 1');
            $this->assertEquals($model1->account->category->order, 6);
            $this->assertEquals($model1->account->category->description, 'sample string 7');
            $this->assertEquals($model1->account->category->id, 8);
            $this->assertEquals($model1->account->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->account->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertTrue($model1->account->active);
            $this->assertEquals($model1->account->balance, 4.0);
            $this->assertEquals($model1->account->description, 'sample string 5');
            $this->assertEquals($model1->account->reportingGroupId, 1);
            $this->assertTrue($model1->account->unallocatedAccount);
            $this->assertTrue($model1->account->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model1->account->modified);
            $this->assertEquals($model1->account->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->account->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model1->account->created);
            $this->assertEquals($model1->account->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->account->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model1->account->accountType, 9);
            $this->assertTrue($model1->account->hasActivity);
            $this->assertEquals($model1->account->defaultTaxTypeId, 1);
            $this->assertEquals($model1->account->defaultTaxType->id, 1);
            $this->assertEquals($model1->account->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model1->account->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model1->account->defaultTaxType->isDefault);
            $this->assertTrue($model1->account->defaultTaxType->hasActivity);
            $this->assertTrue($model1->account->defaultTaxType->isManualTax);
            $this->assertEquals($model1->account->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->account->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->account->id, 11);
            $this->assertTrue($model1->locked);
            $this->assertEquals($model1->taxPeriodId, 1);
            $this->assertEquals($model1->totalOutstanding, 1.0);
            $this->assertTrue($model1->inclusive);
            $this->assertEquals($model1->supplier_CurrencyId, 1);
            $this->assertEquals($model1->supplier_ExchangeRate, 1.0);

            $model2 = $results[1];
            $this->assertEquals($model2->id, 2);
            $this->assertEquals($model2->date->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplierId, 3);
            $this->assertEquals($model2->documentNumber, 'sample string 4');
            $this->assertEquals($model2->reference, 'sample string 5');
            $this->assertEquals($model2->description, 'sample string 6');
            $this->assertEquals($model2->taxTypeId, 7);
            $this->assertEquals($model2->exclusive, 8.0);
            $this->assertEquals($model2->tax, 9.0);
            $this->assertEquals($model2->total, 10.0);
            $this->assertEquals($model2->contraAccountId, 11);
            $this->assertEquals($model2->memo, 'sample string 12');
            $this->assertTrue($model2->hasAttachments);
            $this->assertInstanceOf(Supplier::class, $model2->supplier);
            $this->assertEquals($model2->supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model2->supplier->category);
            $this->assertEquals($model2->supplier->category->description, 'sample string 1');
            $this->assertEquals($model2->supplier->category->id, 2);
            $this->assertEquals($model2->supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model2->supplier->contactName, 'sample string 3');
            $this->assertEquals($model2->supplier->telephone, 'sample string 4');
            $this->assertEquals($model2->supplier->fax, 'sample string 5');
            $this->assertEquals($model2->supplier->mobile, 'sample string 6');
            $this->assertEquals($model2->supplier->email, 'sample string 7');
            $this->assertEquals($model2->supplier->webAddress, 'sample string 8');
            $this->assertTrue($model2->supplier->active);
            $this->assertEquals($model2->supplier->balance, 10.0);
            $this->assertEquals($model2->supplier->creditLimit, 11.0);
            $this->assertEquals($model2->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model2->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model2->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model2->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model2->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model2->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model2->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model2->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model2->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model2->supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model2->supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model2->supplier->textField1, 'sample string 22');
            $this->assertEquals($model2->supplier->textField2, 'sample string 23');
            $this->assertEquals($model2->supplier->textField3, 'sample string 24');
            $this->assertEquals($model2->supplier->numericField1, 1.0);
            $this->assertEquals($model2->supplier->numericField2, 1.0);
            $this->assertEquals($model2->supplier->numericField3, 1.0);
            $this->assertTrue($model2->supplier->yesNoField1);
            $this->assertTrue($model2->supplier->yesNoField2);
            $this->assertTrue($model2->supplier->yesNoField3);
            $this->assertEquals($model2->supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model2->supplier->modified);
            $this->assertEquals($model2->supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model2->supplier->created);
            $this->assertEquals($model2->supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model2->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model2->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model2->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->currencyId, 1);
            $this->assertEquals($model2->supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model2->supplier->hasActivity);
            $this->assertEquals($model2->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model2->supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model2->supplier->defaultTaxType);
            $this->assertEquals($model2->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model2->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model2->supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model2->supplier->defaultTaxType->isDefault);
            $this->assertTrue($model2->supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model2->supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model2->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->supplier->dueDateMethodId, 1);
            $this->assertEquals($model2->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model2->supplier->id, 33);
            $this->assertEquals($model2->accountName, 'sample string 14');
            $this->assertEquals($model2->analysisCategoryId1, 1);
            $this->assertEquals($model2->analysisCategoryId2, 1);
            $this->assertEquals($model2->analysisCategoryId3, 1);
            $this->assertInstanceOf(Account::class, $model2->account);
            $this->assertEquals($model2->account->name, 'sample string 2');
            $this->assertInstanceOf(AccountCategory::class, $model2->account->category);
            $this->assertEquals($model2->account->category->comment, 'sample string 1');
            $this->assertEquals($model2->account->category->order, 6);
            $this->assertEquals($model2->account->category->description, 'sample string 7');
            $this->assertEquals($model2->account->category->id, 8);
            $this->assertEquals($model2->account->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->account->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertTrue($model2->account->active);
            $this->assertEquals($model2->account->balance, 4.0);
            $this->assertEquals($model2->account->description, 'sample string 5');
            $this->assertEquals($model2->account->reportingGroupId, 1);
            $this->assertTrue($model2->account->unallocatedAccount);
            $this->assertTrue($model2->account->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model2->account->modified);
            $this->assertEquals($model2->account->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->account->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model2->account->created);
            $this->assertEquals($model2->account->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->account->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model2->account->accountType, 9);
            $this->assertTrue($model2->account->hasActivity);
            $this->assertEquals($model2->account->defaultTaxTypeId, 1);
            $this->assertEquals($model2->account->defaultTaxType->id, 1);
            $this->assertEquals($model2->account->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model2->account->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model2->account->defaultTaxType->isDefault);
            $this->assertTrue($model2->account->defaultTaxType->hasActivity);
            $this->assertTrue($model2->account->defaultTaxType->isManualTax);
            $this->assertEquals($model2->account->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->account->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->account->id, 11);
            $this->assertTrue($model2->locked);
            $this->assertEquals($model2->taxPeriodId, 1);
            $this->assertEquals($model2->totalOutstanding, 1.0);
            $this->assertTrue($model2->inclusive);
            $this->assertEquals($model2->supplier_CurrencyId, 1);
            $this->assertEquals($model2->supplier_ExchangeRate, 1.0);

            $this->assertCount(25, json_decode($model1->toJson(), true));
            $this->assertCount(25, json_decode($model2->toJson(), true));
        });
    }

    public function testInject()
    {
        $this->verifyInject(SupplierAdjustment::class, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplierId, 3);
            $this->assertEquals($model->documentNumber, 'sample string 4');
            $this->assertEquals($model->reference, 'sample string 5');
            $this->assertEquals($model->description, 'sample string 6');
            $this->assertEquals($model->taxTypeId, 7);
            $this->assertEquals($model->exclusive, 8.0);
            $this->assertEquals($model->tax, 9.0);
            $this->assertEquals($model->total, 10.0);
            $this->assertEquals($model->contraAccountId, 11);
            $this->assertEquals($model->memo, 'sample string 12');
            $this->assertTrue($model->hasAttachments);
            $this->assertInstanceOf(Supplier::class, $model->supplier);
            $this->assertEquals($model->supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->supplier->category);
            $this->assertEquals($model->supplier->category->description, 'sample string 1');
            $this->assertEquals($model->supplier->category->id, 2);
            $this->assertEquals($model->supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model->supplier->contactName, 'sample string 3');
            $this->assertEquals($model->supplier->telephone, 'sample string 4');
            $this->assertEquals($model->supplier->fax, 'sample string 5');
            $this->assertEquals($model->supplier->mobile, 'sample string 6');
            $this->assertEquals($model->supplier->email, 'sample string 7');
            $this->assertEquals($model->supplier->webAddress, 'sample string 8');
            $this->assertTrue($model->supplier->active);
            $this->assertEquals($model->supplier->balance, 10.0);
            $this->assertEquals($model->supplier->creditLimit, 11.0);
            $this->assertEquals($model->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model->supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model->supplier->textField1, 'sample string 22');
            $this->assertEquals($model->supplier->textField2, 'sample string 23');
            $this->assertEquals($model->supplier->textField3, 'sample string 24');
            $this->assertEquals($model->supplier->numericField1, 1.0);
            $this->assertEquals($model->supplier->numericField2, 1.0);
            $this->assertEquals($model->supplier->numericField3, 1.0);
            $this->assertTrue($model->supplier->yesNoField1);
            $this->assertTrue($model->supplier->yesNoField2);
            $this->assertTrue($model->supplier->yesNoField3);
            $this->assertEquals($model->supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model->supplier->modified);
            $this->assertEquals($model->supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->supplier->created);
            $this->assertEquals($model->supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->currencyId, 1);
            $this->assertEquals($model->supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model->supplier->hasActivity);
            $this->assertEquals($model->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->supplier->defaultTaxType);
            $this->assertEquals($model->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->supplier->defaultTaxType->isDefault);
            $this->assertTrue($model->supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model->supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->dueDateMethodId, 1);
            $this->assertEquals($model->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model->supplier->id, 33);
            $this->assertEquals($model->accountName, 'sample string 14');
            $this->assertEquals($model->analysisCategoryId1, 1);
            $this->assertEquals($model->analysisCategoryId2, 1);
            $this->assertEquals($model->analysisCategoryId3, 1);
            $this->assertInstanceOf(Account::class, $model->account);
            $this->assertEquals($model->account->name, 'sample string 2');
            $this->assertInstanceOf(AccountCategory::class, $model->account->category);
            $this->assertEquals($model->account->category->comment, 'sample string 1');
            $this->assertEquals($model->account->category->order, 6);
            $this->assertEquals($model->account->category->description, 'sample string 7');
            $this->assertEquals($model->account->category->id, 8);
            $this->assertEquals($model->account->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertTrue($model->account->active);
            $this->assertEquals($model->account->balance, 4.0);
            $this->assertEquals($model->account->description, 'sample string 5');
            $this->assertEquals($model->account->reportingGroupId, 1);
            $this->assertTrue($model->account->unallocatedAccount);
            $this->assertTrue($model->account->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model->account->modified);
            $this->assertEquals($model->account->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->account->created);
            $this->assertEquals($model->account->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->account->accountType, 9);
            $this->assertTrue($model->account->hasActivity);
            $this->assertEquals($model->account->defaultTaxTypeId, 1);
            $this->assertEquals($model->account->defaultTaxType->id, 1);
            $this->assertEquals($model->account->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->account->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->account->defaultTaxType->isDefault);
            $this->assertTrue($model->account->defaultTaxType->hasActivity);
            $this->assertTrue($model->account->defaultTaxType->isManualTax);
            $this->assertEquals($model->account->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->id, 11);
            $this->assertTrue($model->locked);
            $this->assertEquals($model->taxPeriodId, 1);
            $this->assertEquals($model->totalOutstanding, 1.0);
            $this->assertTrue($model->inclusive);
            $this->assertEquals($model->supplier_CurrencyId, 1);
            $this->assertEquals($model->supplier_ExchangeRate, 1.0);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(25, $objArray);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierAdjustment::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplierId, 3);
            $this->assertEquals($model->documentNumber, 'sample string 4');
            $this->assertEquals($model->reference, 'sample string 5');
            $this->assertEquals($model->description, 'sample string 6');
            $this->assertEquals($model->taxTypeId, 7);
            $this->assertEquals($model->exclusive, 8.0);
            $this->assertEquals($model->tax, 9.0);
            $this->assertEquals($model->total, 10.0);
            $this->assertEquals($model->contraAccountId, 11);
            $this->assertEquals($model->memo, 'sample string 12');
            $this->assertTrue($model->hasAttachments);
            $this->assertInstanceOf(Supplier::class, $model->supplier);
            $this->assertEquals($model->supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->supplier->category);
            $this->assertEquals($model->supplier->category->description, 'sample string 1');
            $this->assertEquals($model->supplier->category->id, 2);
            $this->assertEquals($model->supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model->supplier->contactName, 'sample string 3');
            $this->assertEquals($model->supplier->telephone, 'sample string 4');
            $this->assertEquals($model->supplier->fax, 'sample string 5');
            $this->assertEquals($model->supplier->mobile, 'sample string 6');
            $this->assertEquals($model->supplier->email, 'sample string 7');
            $this->assertEquals($model->supplier->webAddress, 'sample string 8');
            $this->assertTrue($model->supplier->active);
            $this->assertEquals($model->supplier->balance, 10.0);
            $this->assertEquals($model->supplier->creditLimit, 11.0);
            $this->assertEquals($model->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model->supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model->supplier->textField1, 'sample string 22');
            $this->assertEquals($model->supplier->textField2, 'sample string 23');
            $this->assertEquals($model->supplier->textField3, 'sample string 24');
            $this->assertEquals($model->supplier->numericField1, 1.0);
            $this->assertEquals($model->supplier->numericField2, 1.0);
            $this->assertEquals($model->supplier->numericField3, 1.0);
            $this->assertTrue($model->supplier->yesNoField1);
            $this->assertTrue($model->supplier->yesNoField2);
            $this->assertTrue($model->supplier->yesNoField3);
            $this->assertEquals($model->supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model->supplier->modified);
            $this->assertEquals($model->supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->supplier->created);
            $this->assertEquals($model->supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->currencyId, 1);
            $this->assertEquals($model->supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model->supplier->hasActivity);
            $this->assertEquals($model->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->supplier->defaultTaxType);
            $this->assertEquals($model->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->supplier->defaultTaxType->isDefault);
            $this->assertTrue($model->supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model->supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->supplier->dueDateMethodId, 1);
            $this->assertEquals($model->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model->supplier->id, 33);
            $this->assertEquals($model->accountName, 'sample string 14');
            $this->assertEquals($model->analysisCategoryId1, 1);
            $this->assertEquals($model->analysisCategoryId2, 1);
            $this->assertEquals($model->analysisCategoryId3, 1);
            $this->assertInstanceOf(Account::class, $model->account);
            $this->assertEquals($model->account->name, 'sample string 2');
            $this->assertInstanceOf(AccountCategory::class, $model->account->category);
            $this->assertEquals($model->account->category->comment, 'sample string 1');
            $this->assertEquals($model->account->category->order, 6);
            $this->assertEquals($model->account->category->description, 'sample string 7');
            $this->assertEquals($model->account->category->id, 8);
            $this->assertEquals($model->account->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertTrue($model->account->active);
            $this->assertEquals($model->account->balance, 4.0);
            $this->assertEquals($model->account->description, 'sample string 5');
            $this->assertEquals($model->account->reportingGroupId, 1);
            $this->assertTrue($model->account->unallocatedAccount);
            $this->assertTrue($model->account->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model->account->modified);
            $this->assertEquals($model->account->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->account->created);
            $this->assertEquals($model->account->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->account->accountType, 9);
            $this->assertTrue($model->account->hasActivity);
            $this->assertEquals($model->account->defaultTaxTypeId, 1);
            $this->assertEquals($model->account->defaultTaxType->id, 1);
            $this->assertEquals($model->account->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->account->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->account->defaultTaxType->isDefault);
            $this->assertTrue($model->account->defaultTaxType->hasActivity);
            $this->assertTrue($model->account->defaultTaxType->isManualTax);
            $this->assertEquals($model->account->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->account->id, 11);
            $this->assertTrue($model->locked);
            $this->assertEquals($model->taxPeriodId, 1);
            $this->assertEquals($model->totalOutstanding, 1.0);
            $this->assertTrue($model->inclusive);
            $this->assertEquals($model->supplier_CurrencyId, 1);
            $this->assertEquals($model->supplier_ExchangeRate, 1.0);
        });
    }

    public function testSave()
    {
        $this->verifySave(SupplierAdjustment::class, function ($model) {
            $model->id =  1;
            $model->date = '2017-07-18';
            $model->supplierId = 3;
            $model->documentNumber = 'sample string 4';
            $model->reference = 'sample string 5';
            $model->description = 'sample string 6';
            $model->taxTypeId = 7;
            $model->exclusive = 8.0;
            $model->tax = 9.0;
            $model->total = 10.0;
            $model->contraAccountId = 11;
            $model->memo = 'sample string 12';
            $model->hasAttachments = true;
            $model->supplier->name = 'sample string 1';
            $model->supplier->category->description = 'sample string 1';
            $model->supplier->category->id = 2;
            $model->supplier->category->modified = '2017-07-18';
            $model->supplier->category->created = '2017-07-18';
            $model->supplier->taxReference = 'sample string 2';
            $model->supplier->contactName = 'sample string 3';
            $model->supplier->telephone = 'sample string 4';
            $model->supplier->fax = 'sample string 5';
            $model->supplier->mobile = 'sample string 6';
            $model->supplier->email = 'sample string 7';
            $model->supplier->webAddress = 'sample string 8';
            $model->supplier->active = true;
            $model->supplier->creditLimit = 11.0;
            $model->supplier->postalAddress01 = 'sample string 12';
            $model->supplier->postalAddress02 = 'sample string 13';
            $model->supplier->postalAddress03 = 'sample string 14';
            $model->supplier->postalAddress04 = 'sample string 15';
            $model->supplier->postalAddress05 = 'sample string 16';
            $model->supplier->deliveryAddress01 = 'sample string 17';
            $model->supplier->deliveryAddress02 = 'sample string 18';
            $model->supplier->deliveryAddress03 = 'sample string 19';
            $model->supplier->deliveryAddress04 = 'sample string 20';
            $model->supplier->deliveryAddress05 = 'sample string 21';
            $model->supplier->autoAllocateToOldestInvoice = true;
            $model->supplier->textField1 = 'sample string 22';
            $model->supplier->textField2 = 'sample string 23';
            $model->supplier->textField3 = 'sample string 24';
            $model->supplier->numericField1 = 1.0;
            $model->supplier->numericField2 = 1.0;
            $model->supplier->numericField3 = 1.0;
            $model->supplier->yesNoField1 = true;
            $model->supplier->yesNoField2 = true;
            $model->supplier->yesNoField3 = true;
            $model->supplier->dateField1 = '2017-07-18';
            $model->supplier->dateField2 = '2017-07-18';
            $model->supplier->dateField3 = '2017-07-18';
            $model->supplier->businessRegistrationNumber = 'sample string 29';
            $model->supplier->RMCDApprovalNumber = 'sample string 30';
            $model->supplier->taxStatusVerified = '2017-07-18';
            $model->supplier->currencyId = 1;
            $model->supplier->currencySymbol = 'sample string 31';
            $model->supplier->defaultDiscountPercentage = 1.0;
            $model->supplier->defaultTaxTypeId = 1;
            $model->supplier->defaultTaxType->id = 1;
            $model->supplier->defaultTaxType->name = 'sample string 2';
            $model->supplier->defaultTaxType->percentage = 3.1;
            $model->supplier->defaultTaxType->isDefault = true;
            $model->supplier->defaultTaxType->isManualTax = true;
            $model->supplier->dueDateMethodId = 1;
            $model->supplier->dueDateMethodValue = 1;
            $model->supplier->id = 33;
            $model->accountName = 'sample string 14';
            $model->analysisCategoryId1 = 1;
            $model->analysisCategoryId2 = 1;
            $model->analysisCategoryId3 = 1;
            $model->account->name = 'sample string 2';
            $model->account->category->comment = 'sample string 1';
            $model->account->category->order = 6;
            $model->account->category->description = 'sample string 7';
            $model->account->category->id = 8;
            $model->account->active = true;
            $model->account->description = 'sample string 5';
            $model->account->reportingGroupId = 1;
            $model->account->defaultTaxTypeId = 1;
            $model->account->defaultTaxType->id = 1;
            $model->account->defaultTaxType->name = 'sample string 2';
            $model->account->defaultTaxType->percentage = 3.1;
            $model->account->defaultTaxType->isDefault = true;
            $model->account->defaultTaxType->isManualTax = true;
            $model->account->id = 11;
            $model->inclusive = true;
            $model->supplier_CurrencyId = 1;
            $model->supplier_ExchangeRate = 1.0;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->date->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplierId, 3);
            $this->assertEquals($savedModel->documentNumber, 'sample string 4');
            $this->assertEquals($savedModel->reference, 'sample string 5');
            $this->assertEquals($savedModel->description, 'sample string 6');
            $this->assertEquals($savedModel->taxTypeId, 7);
            $this->assertEquals($savedModel->exclusive, 8.0);
            $this->assertEquals($savedModel->tax, 9.0);
            $this->assertEquals($savedModel->total, 10.0);
            $this->assertEquals($savedModel->contraAccountId, 11);
            $this->assertEquals($savedModel->memo, 'sample string 12');
            $this->assertTrue($savedModel->hasAttachments);
            $this->assertEquals($savedModel->supplier->name, 'sample string 1');
            $this->assertEquals($savedModel->supplier->category->description, 'sample string 1');
            $this->assertEquals($savedModel->supplier->category->id, 2);
            $this->assertEquals($savedModel->supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplier->taxReference, 'sample string 2');
            $this->assertEquals($savedModel->supplier->contactName, 'sample string 3');
            $this->assertEquals($savedModel->supplier->telephone, 'sample string 4');
            $this->assertEquals($savedModel->supplier->fax, 'sample string 5');
            $this->assertEquals($savedModel->supplier->mobile, 'sample string 6');
            $this->assertEquals($savedModel->supplier->email, 'sample string 7');
            $this->assertEquals($savedModel->supplier->webAddress, 'sample string 8');
            $this->assertTrue($savedModel->supplier->active);
            $this->assertEquals($savedModel->supplier->creditLimit, 11.0);
            $this->assertEquals($savedModel->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($savedModel->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($savedModel->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($savedModel->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($savedModel->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($savedModel->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($savedModel->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($savedModel->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($savedModel->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($savedModel->supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($savedModel->supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($savedModel->supplier->textField1, 'sample string 22');
            $this->assertEquals($savedModel->supplier->textField2, 'sample string 23');
            $this->assertEquals($savedModel->supplier->textField3, 'sample string 24');
            $this->assertEquals($savedModel->supplier->numericField1, 1.0);
            $this->assertEquals($savedModel->supplier->numericField2, 1.0);
            $this->assertEquals($savedModel->supplier->numericField3, 1.0);
            $this->assertTrue($savedModel->supplier->yesNoField1);
            $this->assertTrue($savedModel->supplier->yesNoField2);
            $this->assertTrue($savedModel->supplier->yesNoField3);
            $this->assertEquals($savedModel->supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($savedModel->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($savedModel->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->supplier->currencyId, 1);
            $this->assertEquals($savedModel->supplier->currencySymbol, 'sample string 31');
            $this->assertEquals($savedModel->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($savedModel->supplier->defaultTaxTypeId, 1);
            $this->assertEquals($savedModel->supplier->defaultTaxType->id, 1);
            $this->assertEquals($savedModel->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($savedModel->supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($savedModel->supplier->defaultTaxType->isDefault);
            $this->assertTrue($savedModel->supplier->defaultTaxType->isManualTax);
            $this->assertEquals($savedModel->supplier->dueDateMethodId, 1);
            $this->assertEquals($savedModel->supplier->dueDateMethodValue, 1);
            $this->assertEquals($savedModel->supplier->id, 33);
            $this->assertEquals($savedModel->accountName, 'sample string 14');
            $this->assertEquals($savedModel->analysisCategoryId1, 1);
            $this->assertEquals($savedModel->analysisCategoryId2, 1);
            $this->assertEquals($savedModel->analysisCategoryId3, 1);
            $this->assertEquals($savedModel->account->name, 'sample string 2');
            $this->assertEquals($savedModel->account->category->comment, 'sample string 1');
            $this->assertEquals($savedModel->account->category->order, 6);
            $this->assertEquals($savedModel->account->category->description, 'sample string 7');
            $this->assertEquals($savedModel->account->category->id, 8);
            $this->assertTrue($savedModel->account->active);
            $this->assertEquals($savedModel->account->description, 'sample string 5');
            $this->assertEquals($savedModel->account->reportingGroupId, 1);
            $this->assertEquals($savedModel->account->defaultTaxTypeId, 1);
            $this->assertEquals($savedModel->account->defaultTaxType->id, 1);
            $this->assertEquals($savedModel->account->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($savedModel->account->defaultTaxType->percentage, 3.1);
            $this->assertTrue($savedModel->account->defaultTaxType->isDefault);
            $this->assertTrue($savedModel->account->defaultTaxType->isManualTax);
            $this->assertEquals($savedModel->account->id, 11);
            $this->assertTrue($savedModel->inclusive);
            $this->assertEquals($savedModel->supplier_CurrencyId, 1);
            $this->assertEquals($savedModel->supplier_ExchangeRate, 1.0);
        });
    }

    public function testCalculate()
    {
        $model = $this->setUpRequestMock(
            'POST',
            SupplierAdjustment::class,
            'SupplierAdjustment/Calculate',
            'SupplierAdjustment/POST_SupplierAdjustment_Calculate_REQ.json',
            'SupplierAdjustment/POST_SupplierAdjustment_Calculate_RESP.json'
        );
        $modelData = json_decode(file_get_contents(__DIR__ . '/../../mocks/SupplierAdjustment/POST_SupplierAdjustment_Calculate_REQ.json'));
        $model->loadResult($modelData);
        $calculated = $model->calculate();

        $this->assertEquals(1, $calculated->ID);
        $this->assertEquals($calculated->Date, '2017-07-19');
        $this->assertEquals($calculated->SupplierId, 3);
        $this->assertEquals($calculated->DocumentNumber, 'sample string 4');
        $this->assertEquals($calculated->Reference, 'sample string 5');
        $this->assertEquals($calculated->Description, 'sample string 6');
        $this->assertEquals($calculated->TaxTypeId, 7);
        $this->assertEquals($calculated->Exclusive, 8.0);
        $this->assertEquals($calculated->Tax, 9.0);
        $this->assertEquals($calculated->Total, 10.0);
        $this->assertEquals($calculated->ContraAccountId, 11);
        $this->assertEquals($calculated->Memo, 'sample string 12');
        $this->assertTrue($calculated->HasAttachments);
        $this->assertEquals($calculated->Supplier->Name, 'sample string 1');
        $this->assertEquals($calculated->Supplier->Category->Description, 'sample string 1');
        $this->assertEquals($calculated->Supplier->Category->ID, 2);
        $this->assertEquals($calculated->Supplier->Category->Modified, '2017-07-19');
        $this->assertEquals($calculated->Supplier->Category->Created, '2017-07-19');
        $this->assertEquals($calculated->Supplier->TaxReference, 'sample string 2');
        $this->assertEquals($calculated->Supplier->ContactName, 'sample string 3');
        $this->assertEquals($calculated->Supplier->Telephone, 'sample string 4');
        $this->assertEquals($calculated->Supplier->Fax, 'sample string 5');
        $this->assertEquals($calculated->Supplier->Mobile, 'sample string 6');
        $this->assertEquals($calculated->Supplier->Email, 'sample string 7');
        $this->assertEquals($calculated->Supplier->WebAddress, 'sample string 8');
        $this->assertTrue($calculated->Supplier->Active);
        $this->assertEquals($calculated->Supplier->Balance, 10.0);
        $this->assertEquals($calculated->Supplier->CreditLimit, 11.0);
        $this->assertEquals($calculated->Supplier->PostalAddress01, 'sample string 12');
        $this->assertEquals($calculated->Supplier->PostalAddress02, 'sample string 13');
        $this->assertEquals($calculated->Supplier->PostalAddress03, 'sample string 14');
        $this->assertEquals($calculated->Supplier->PostalAddress04, 'sample string 15');
        $this->assertEquals($calculated->Supplier->PostalAddress05, 'sample string 16');
        $this->assertEquals($calculated->Supplier->DeliveryAddress01, 'sample string 17');
        $this->assertEquals($calculated->Supplier->DeliveryAddress02, 'sample string 18');
        $this->assertEquals($calculated->Supplier->DeliveryAddress03, 'sample string 19');
        $this->assertEquals($calculated->Supplier->DeliveryAddress04, 'sample string 20');
        $this->assertEquals($calculated->Supplier->DeliveryAddress05, 'sample string 21');
        $this->assertTrue($calculated->Supplier->AutoAllocateToOldestInvoice);
        $this->assertEquals($calculated->Supplier->TextField1, 'sample string 22');
        $this->assertEquals($calculated->Supplier->TextField2, 'sample string 23');
        $this->assertEquals($calculated->Supplier->TextField3, 'sample string 24');
        $this->assertEquals($calculated->Supplier->NumericField1, 1.0);
        $this->assertEquals($calculated->Supplier->NumericField2, 1.0);
        $this->assertEquals($calculated->Supplier->NumericField3, 1.0);
        $this->assertTrue($calculated->Supplier->YesNoField1);
        $this->assertTrue($calculated->Supplier->YesNoField2);
        $this->assertTrue($calculated->Supplier->YesNoField3);
        $this->assertEquals($calculated->Supplier->DateField1, '2017-07-19');
        $this->assertEquals($calculated->Supplier->DateField2, '2017-07-19');
        $this->assertEquals($calculated->Supplier->DateField3, '2017-07-19');
        $this->assertEquals($calculated->Supplier->Modified, '2017-07-19');
        $this->assertEquals($calculated->Supplier->Created, '2017-07-19');
        $this->assertEquals($calculated->Supplier->BusinessRegistrationNumber, 'sample string 29');
        $this->assertEquals($calculated->Supplier->RMCDApprovalNumber, 'sample string 30');
        $this->assertEquals($calculated->Supplier->TaxStatusVerified, '2017-07-19');
        $this->assertEquals($calculated->Supplier->CurrencyId, 1);
        $this->assertEquals($calculated->Supplier->CurrencySymbol, 'sample string 31');
        $this->assertTrue($calculated->Supplier->HasActivity);
        $this->assertEquals($calculated->Supplier->DefaultDiscountPercentage, 1.0);
        $this->assertEquals($calculated->Supplier->DefaultTaxTypeId, 1);
        $this->assertEquals($calculated->Supplier->DefaultTaxType->ID, 1);
        $this->assertEquals($calculated->Supplier->DefaultTaxType->Name, 'sample string 2');
        $this->assertEquals($calculated->Supplier->DefaultTaxType->Percentage, 3.1);
        $this->assertTrue($calculated->Supplier->DefaultTaxType->IsDefault);
        $this->assertTrue($calculated->Supplier->DefaultTaxType->HasActivity);
        $this->assertTrue($calculated->Supplier->DefaultTaxType->IsManualTax);
        $this->assertEquals($calculated->Supplier->DefaultTaxType->Created, '2017-07-19');
        $this->assertEquals($calculated->Supplier->DefaultTaxType->Modified, '2017-07-19');
        $this->assertEquals($calculated->Supplier->DueDateMethodId, 1);
        $this->assertEquals($calculated->Supplier->DueDateMethodValue, 1);
        $this->assertEquals($calculated->Supplier->ID, 33);
        $this->assertEquals($calculated->AccountName, 'sample string 14');
        $this->assertEquals($calculated->AnalysisCategoryId1, 1);
        $this->assertEquals($calculated->AnalysisCategoryId2, 1);
        $this->assertEquals($calculated->AnalysisCategoryId3, 1);
        $this->assertEquals($calculated->Account->Name, 'sample string 2');
        $this->assertEquals($calculated->Account->Category->Comment, 'sample string 1');
        $this->assertEquals($calculated->Account->Category->Order, 6);
        $this->assertEquals($calculated->Account->Category->Description, 'sample string 7');
        $this->assertEquals($calculated->Account->Category->ID, 8);
        $this->assertEquals($calculated->Account->Category->Modified, '2017-07-19');
        $this->assertEquals($calculated->Account->Category->Created, '2017-07-19');
        $this->assertTrue($calculated->Account->Active);
        $this->assertEquals($calculated->Account->Balance, 4.0);
        $this->assertEquals($calculated->Account->Description, 'sample string 5');
        $this->assertEquals($calculated->Account->ReportingGroupId, 1);
        $this->assertTrue($calculated->Account->UnallocatedAccount);
        $this->assertTrue($calculated->Account->IsTaxLocked);
        $this->assertEquals($calculated->Account->Modified, '2017-07-19');
        $this->assertEquals($calculated->Account->Created, '2017-07-19');
        $this->assertEquals($calculated->Account->AccountType, 9);
        $this->assertTrue($calculated->Account->HasActivity);
        $this->assertEquals($calculated->Account->DefaultTaxTypeId, 1);
        $this->assertEquals($calculated->Account->DefaultTaxType->ID, 1);
        $this->assertEquals($calculated->Account->DefaultTaxType->Name, 'sample string 2');
        $this->assertEquals($calculated->Account->DefaultTaxType->Percentage, 3.1);
        $this->assertTrue($calculated->Account->DefaultTaxType->IsDefault);
        $this->assertTrue($calculated->Account->DefaultTaxType->HasActivity);
        $this->assertTrue($calculated->Account->DefaultTaxType->IsManualTax);
        $this->assertEquals($calculated->Account->DefaultTaxType->Created, '2017-07-19');
        $this->assertEquals($calculated->Account->DefaultTaxType->Modified, '2017-07-19');
        $this->assertEquals($calculated->Account->ID, 11);
        $this->assertTrue($calculated->Locked);
        $this->assertEquals($calculated->TaxPeriodId, 1);
        $this->assertEquals($calculated->TotalOutstanding, 1.0);
        $this->assertTrue($calculated->Inclusive);
        $this->assertEquals($calculated->Supplier_CurrencyId, 1);
        $this->assertEquals($calculated->Supplier_ExchangeRate, 1.0);

        $newModel = new SupplierAdjustment($this->config);
        $newModel->loadResult($calculated);

        $this->assertEquals($newModel->id, 1);
        $this->assertEquals($newModel->date->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplierId, 3);
        $this->assertEquals($newModel->documentNumber, 'sample string 4');
        $this->assertEquals($newModel->reference, 'sample string 5');
        $this->assertEquals($newModel->description, 'sample string 6');
        $this->assertEquals($newModel->taxTypeId, 7);
        $this->assertEquals($newModel->exclusive, 8.0);
        $this->assertEquals($newModel->tax, 9.0);
        $this->assertEquals($newModel->total, 10.0);
        $this->assertEquals($newModel->contraAccountId, 11);
        $this->assertEquals($newModel->memo, 'sample string 12');
        $this->assertTrue($newModel->hasAttachments);
        $this->assertInstanceOf(Supplier::class, $newModel->supplier);
        $this->assertEquals($newModel->supplier->name, 'sample string 1');
        $this->assertInstanceOf(SupplierCategory::class, $newModel->supplier->category);
        $this->assertEquals($newModel->supplier->category->description, 'sample string 1');
        $this->assertEquals($newModel->supplier->category->id, 2);
        $this->assertEquals($newModel->supplier->category->modified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->category->created->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->taxReference, 'sample string 2');
        $this->assertEquals($newModel->supplier->contactName, 'sample string 3');
        $this->assertEquals($newModel->supplier->telephone, 'sample string 4');
        $this->assertEquals($newModel->supplier->fax, 'sample string 5');
        $this->assertEquals($newModel->supplier->mobile, 'sample string 6');
        $this->assertEquals($newModel->supplier->email, 'sample string 7');
        $this->assertEquals($newModel->supplier->webAddress, 'sample string 8');
        $this->assertTrue($newModel->supplier->active);
        $this->assertEquals($newModel->supplier->balance, 10.0);
        $this->assertEquals($newModel->supplier->creditLimit, 11.0);
        $this->assertEquals($newModel->supplier->postalAddress01, 'sample string 12');
        $this->assertEquals($newModel->supplier->postalAddress02, 'sample string 13');
        $this->assertEquals($newModel->supplier->postalAddress03, 'sample string 14');
        $this->assertEquals($newModel->supplier->postalAddress04, 'sample string 15');
        $this->assertEquals($newModel->supplier->postalAddress05, 'sample string 16');
        $this->assertEquals($newModel->supplier->deliveryAddress01, 'sample string 17');
        $this->assertEquals($newModel->supplier->deliveryAddress02, 'sample string 18');
        $this->assertEquals($newModel->supplier->deliveryAddress03, 'sample string 19');
        $this->assertEquals($newModel->supplier->deliveryAddress04, 'sample string 20');
        $this->assertEquals($newModel->supplier->deliveryAddress05, 'sample string 21');
        $this->assertTrue($newModel->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals($newModel->supplier->textField1, 'sample string 22');
        $this->assertEquals($newModel->supplier->textField2, 'sample string 23');
        $this->assertEquals($newModel->supplier->textField3, 'sample string 24');
        $this->assertEquals($newModel->supplier->numericField1, 1.0);
        $this->assertEquals($newModel->supplier->numericField2, 1.0);
        $this->assertEquals($newModel->supplier->numericField3, 1.0);
        $this->assertTrue($newModel->supplier->yesNoField1);
        $this->assertTrue($newModel->supplier->yesNoField2);
        $this->assertTrue($newModel->supplier->yesNoField3);
        $this->assertEquals($newModel->supplier->dateField1->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->dateField2->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->dateField3->format('Y-m-d'), '2017-07-19');
        $this->assertInstanceOf(\DateTime::class, $newModel->supplier->modified);
        $this->assertEquals($newModel->supplier->modified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->modified->getTimezone()->getName(), 'UTC');
        $this->assertInstanceOf(\DateTime::class, $newModel->supplier->created);
        $this->assertEquals($newModel->supplier->created->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->created->getTimezone()->getName(), 'UTC');
        $this->assertEquals($newModel->supplier->businessRegistrationNumber, 'sample string 29');
        $this->assertEquals($newModel->supplier->RMCDApprovalNumber, 'sample string 30');
        $this->assertEquals($newModel->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->currencyId, 1);
        $this->assertEquals($newModel->supplier->currencySymbol, 'sample string 31');
        $this->assertTrue($newModel->supplier->hasActivity);
        $this->assertEquals($newModel->supplier->defaultDiscountPercentage, 1.0);
        $this->assertEquals($newModel->supplier->defaultTaxTypeId, 1);
        $this->assertInstanceOf(TaxType::class, $newModel->supplier->defaultTaxType);
        $this->assertEquals($newModel->supplier->defaultTaxType->id, 1);
        $this->assertEquals($newModel->supplier->defaultTaxType->name, 'sample string 2');
        $this->assertEquals($newModel->supplier->defaultTaxType->percentage, 3.1);
        $this->assertTrue($newModel->supplier->defaultTaxType->isDefault);
        $this->assertTrue($newModel->supplier->defaultTaxType->hasActivity);
        $this->assertTrue($newModel->supplier->defaultTaxType->isManualTax);
        $this->assertEquals($newModel->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->supplier->dueDateMethodId, 1);
        $this->assertEquals($newModel->supplier->dueDateMethodValue, 1);
        $this->assertEquals($newModel->supplier->id, 33);
        $this->assertEquals($newModel->accountName, 'sample string 14');
        $this->assertEquals($newModel->analysisCategoryId1, 1);
        $this->assertEquals($newModel->analysisCategoryId2, 1);
        $this->assertEquals($newModel->analysisCategoryId3, 1);
        $this->assertInstanceOf(Account::class, $newModel->account);
        $this->assertEquals($newModel->account->name, 'sample string 2');
        $this->assertInstanceOf(AccountCategory::class, $newModel->account->category);
        $this->assertEquals($newModel->account->category->comment, 'sample string 1');
        $this->assertEquals($newModel->account->category->order, 6);
        $this->assertEquals($newModel->account->category->description, 'sample string 7');
        $this->assertEquals($newModel->account->category->id, 8);
        $this->assertEquals($newModel->account->category->modified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->account->category->created->format('Y-m-d'), '2017-07-19');
        $this->assertTrue($newModel->account->active);
        $this->assertEquals($newModel->account->balance, 4.0);
        $this->assertEquals($newModel->account->description, 'sample string 5');
        $this->assertEquals($newModel->account->reportingGroupId, 1);
        $this->assertTrue($newModel->account->unallocatedAccount);
        $this->assertTrue($newModel->account->isTaxLocked);
        $this->assertInstanceOf(\DateTime::class, $newModel->account->modified);
        $this->assertEquals($newModel->account->modified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->account->modified->getTimezone()->getName(), 'UTC');
        $this->assertInstanceOf(\DateTime::class, $newModel->account->created);
        $this->assertEquals($newModel->account->created->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->account->created->getTimezone()->getName(), 'UTC');
        $this->assertEquals($newModel->account->accountType, 9);
        $this->assertTrue($newModel->account->hasActivity);
        $this->assertEquals($newModel->account->defaultTaxTypeId, 1);
        $this->assertEquals($newModel->account->defaultTaxType->id, 1);
        $this->assertEquals($newModel->account->defaultTaxType->name, 'sample string 2');
        $this->assertEquals($newModel->account->defaultTaxType->percentage, 3.1);
        $this->assertTrue($newModel->account->defaultTaxType->isDefault);
        $this->assertTrue($newModel->account->defaultTaxType->hasActivity);
        $this->assertTrue($newModel->account->defaultTaxType->isManualTax);
        $this->assertEquals($newModel->account->defaultTaxType->created->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->account->defaultTaxType->modified->format('Y-m-d'), '2017-07-19');
        $this->assertEquals($newModel->account->id, 11);
        $this->assertTrue($newModel->locked);
        $this->assertEquals($newModel->taxPeriodId, 1);
        $this->assertEquals($newModel->totalOutstanding, 1.0);
        $this->assertTrue($newModel->inclusive);
        $this->assertEquals($newModel->supplier_CurrencyId, 1);
        $this->assertEquals($newModel->supplier_ExchangeRate, 1.0);
    }
}
