<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierAdjustment;
use DarrynTen\SageOne\Models\Account;
use DarrynTen\SageOne\Models\AccountCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Request\RequestHandler;
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
            'Supplier' => [
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
            $this->assertInstanceOf(Supplier::class, $model1->Supplier);
            $this->assertEquals($model1->Supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model1->Supplier->category);
            $this->assertEquals($model1->Supplier->category->description, 'sample string 1');
            $this->assertEquals($model1->Supplier->category->id, 2);
            $this->assertEquals($model1->Supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->taxReference, 'sample string 2');
            $this->assertEquals($model1->Supplier->contactName, 'sample string 3');
            $this->assertEquals($model1->Supplier->telephone, 'sample string 4');
            $this->assertEquals($model1->Supplier->fax, 'sample string 5');
            $this->assertEquals($model1->Supplier->mobile, 'sample string 6');
            $this->assertEquals($model1->Supplier->email, 'sample string 7');
            $this->assertEquals($model1->Supplier->webAddress, 'sample string 8');
            $this->assertTrue($model1->Supplier->active);
            $this->assertEquals($model1->Supplier->balance, 10.0);
            $this->assertEquals($model1->Supplier->creditLimit, 11.0);
            $this->assertEquals($model1->Supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model1->Supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model1->Supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model1->Supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model1->Supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model1->Supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model1->Supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model1->Supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model1->Supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model1->Supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model1->Supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model1->Supplier->textField1, 'sample string 22');
            $this->assertEquals($model1->Supplier->textField2, 'sample string 23');
            $this->assertEquals($model1->Supplier->textField3, 'sample string 24');
            $this->assertEquals($model1->Supplier->numericField1, 1.0);
            $this->assertEquals($model1->Supplier->numericField2, 1.0);
            $this->assertEquals($model1->Supplier->numericField3, 1.0);
            $this->assertTrue($model1->Supplier->yesNoField1);
            $this->assertTrue($model1->Supplier->yesNoField2);
            $this->assertTrue($model1->Supplier->yesNoField3);
            $this->assertEquals($model1->Supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model1->Supplier->modified);
            $this->assertEquals($model1->Supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model1->Supplier->created);
            $this->assertEquals($model1->Supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model1->Supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model1->Supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model1->Supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->currencyId, 1);
            $this->assertEquals($model1->Supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model1->Supplier->hasActivity);
            $this->assertEquals($model1->Supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model1->Supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model1->Supplier->defaultTaxType);
            $this->assertEquals($model1->Supplier->defaultTaxType->id, 1);
            $this->assertEquals($model1->Supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model1->Supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model1->Supplier->defaultTaxType->isDefault);
            $this->assertTrue($model1->Supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model1->Supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model1->Supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model1->Supplier->dueDateMethodId, 1);
            $this->assertEquals($model1->Supplier->dueDateMethodValue, 1);
            $this->assertEquals($model1->Supplier->id, 33);
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
            $this->assertEquals($model2->id, 1);
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
            $this->assertInstanceOf(Supplier::class, $model2->Supplier);
            $this->assertEquals($model2->Supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model2->Supplier->category);
            $this->assertEquals($model2->Supplier->category->description, 'sample string 1');
            $this->assertEquals($model2->Supplier->category->id, 2);
            $this->assertEquals($model2->Supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->taxReference, 'sample string 2');
            $this->assertEquals($model2->Supplier->contactName, 'sample string 3');
            $this->assertEquals($model2->Supplier->telephone, 'sample string 4');
            $this->assertEquals($model2->Supplier->fax, 'sample string 5');
            $this->assertEquals($model2->Supplier->mobile, 'sample string 6');
            $this->assertEquals($model2->Supplier->email, 'sample string 7');
            $this->assertEquals($model2->Supplier->webAddress, 'sample string 8');
            $this->assertTrue($model2->Supplier->active);
            $this->assertEquals($model2->Supplier->balance, 10.0);
            $this->assertEquals($model2->Supplier->creditLimit, 11.0);
            $this->assertEquals($model2->Supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model2->Supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model2->Supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model2->Supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model2->Supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model2->Supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model2->Supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model2->Supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model2->Supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model2->Supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model2->Supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model2->Supplier->textField1, 'sample string 22');
            $this->assertEquals($model2->Supplier->textField2, 'sample string 23');
            $this->assertEquals($model2->Supplier->textField3, 'sample string 24');
            $this->assertEquals($model2->Supplier->numericField1, 1.0);
            $this->assertEquals($model2->Supplier->numericField2, 1.0);
            $this->assertEquals($model2->Supplier->numericField3, 1.0);
            $this->assertTrue($model2->Supplier->yesNoField1);
            $this->assertTrue($model2->Supplier->yesNoField2);
            $this->assertTrue($model2->Supplier->yesNoField3);
            $this->assertEquals($model2->Supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model2->Supplier->modified);
            $this->assertEquals($model2->Supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model2->Supplier->created);
            $this->assertEquals($model2->Supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model2->Supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model2->Supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model2->Supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->currencyId, 1);
            $this->assertEquals($model2->Supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model2->Supplier->hasActivity);
            $this->assertEquals($model2->Supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model2->Supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model2->Supplier->defaultTaxType);
            $this->assertEquals($model2->Supplier->defaultTaxType->id, 1);
            $this->assertEquals($model2->Supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model2->Supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model2->Supplier->defaultTaxType->isDefault);
            $this->assertTrue($model2->Supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model2->Supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model2->Supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model2->Supplier->dueDateMethodId, 1);
            $this->assertEquals($model2->Supplier->dueDateMethodValue, 1);
            $this->assertEquals($model2->Supplier->id, 33);
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
            $this->assertInstanceOf(Supplier::class, $model->Supplier);
            $this->assertEquals($model->Supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->Supplier->category);
            $this->assertEquals($model->Supplier->category->description, 'sample string 1');
            $this->assertEquals($model->Supplier->category->id, 2);
            $this->assertEquals($model->Supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->taxReference, 'sample string 2');
            $this->assertEquals($model->Supplier->contactName, 'sample string 3');
            $this->assertEquals($model->Supplier->telephone, 'sample string 4');
            $this->assertEquals($model->Supplier->fax, 'sample string 5');
            $this->assertEquals($model->Supplier->mobile, 'sample string 6');
            $this->assertEquals($model->Supplier->email, 'sample string 7');
            $this->assertEquals($model->Supplier->webAddress, 'sample string 8');
            $this->assertTrue($model->Supplier->active);
            $this->assertEquals($model->Supplier->balance, 10.0);
            $this->assertEquals($model->Supplier->creditLimit, 11.0);
            $this->assertEquals($model->Supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model->Supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model->Supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model->Supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model->Supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model->Supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->Supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->Supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->Supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->Supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model->Supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model->Supplier->textField1, 'sample string 22');
            $this->assertEquals($model->Supplier->textField2, 'sample string 23');
            $this->assertEquals($model->Supplier->textField3, 'sample string 24');
            $this->assertEquals($model->Supplier->numericField1, 1.0);
            $this->assertEquals($model->Supplier->numericField2, 1.0);
            $this->assertEquals($model->Supplier->numericField3, 1.0);
            $this->assertTrue($model->Supplier->yesNoField1);
            $this->assertTrue($model->Supplier->yesNoField2);
            $this->assertTrue($model->Supplier->yesNoField3);
            $this->assertEquals($model->Supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model->Supplier->modified);
            $this->assertEquals($model->Supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->Supplier->created);
            $this->assertEquals($model->Supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->Supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->Supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->Supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->currencyId, 1);
            $this->assertEquals($model->Supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model->Supplier->hasActivity);
            $this->assertEquals($model->Supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->Supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->Supplier->defaultTaxType);
            $this->assertEquals($model->Supplier->defaultTaxType->id, 1);
            $this->assertEquals($model->Supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->Supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->Supplier->defaultTaxType->isDefault);
            $this->assertTrue($model->Supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model->Supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model->Supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->dueDateMethodId, 1);
            $this->assertEquals($model->Supplier->dueDateMethodValue, 1);
            $this->assertEquals($model->Supplier->id, 33);
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
            $this->assertInstanceOf(Supplier::class, $model->Supplier);
            $this->assertEquals($model->Supplier->name, 'sample string 1');
            $this->assertInstanceOf(SupplierCategory::class, $model->Supplier->category);
            $this->assertEquals($model->Supplier->category->description, 'sample string 1');
            $this->assertEquals($model->Supplier->category->id, 2);
            $this->assertEquals($model->Supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->taxReference, 'sample string 2');
            $this->assertEquals($model->Supplier->contactName, 'sample string 3');
            $this->assertEquals($model->Supplier->telephone, 'sample string 4');
            $this->assertEquals($model->Supplier->fax, 'sample string 5');
            $this->assertEquals($model->Supplier->mobile, 'sample string 6');
            $this->assertEquals($model->Supplier->email, 'sample string 7');
            $this->assertEquals($model->Supplier->webAddress, 'sample string 8');
            $this->assertTrue($model->Supplier->active);
            $this->assertEquals($model->Supplier->balance, 10.0);
            $this->assertEquals($model->Supplier->creditLimit, 11.0);
            $this->assertEquals($model->Supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model->Supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model->Supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model->Supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model->Supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model->Supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->Supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->Supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->Supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->Supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($model->Supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($model->Supplier->textField1, 'sample string 22');
            $this->assertEquals($model->Supplier->textField2, 'sample string 23');
            $this->assertEquals($model->Supplier->textField3, 'sample string 24');
            $this->assertEquals($model->Supplier->numericField1, 1.0);
            $this->assertEquals($model->Supplier->numericField2, 1.0);
            $this->assertEquals($model->Supplier->numericField3, 1.0);
            $this->assertTrue($model->Supplier->yesNoField1);
            $this->assertTrue($model->Supplier->yesNoField2);
            $this->assertTrue($model->Supplier->yesNoField3);
            $this->assertEquals($model->Supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertInstanceOf(\DateTime::class, $model->Supplier->modified);
            $this->assertEquals($model->Supplier->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->Supplier->created);
            $this->assertEquals($model->Supplier->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->Supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->Supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->Supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->currencyId, 1);
            $this->assertEquals($model->Supplier->currencySymbol, 'sample string 31');
            $this->assertTrue($model->Supplier->hasActivity);
            $this->assertEquals($model->Supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->Supplier->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->Supplier->defaultTaxType);
            $this->assertEquals($model->Supplier->defaultTaxType->id, 1);
            $this->assertEquals($model->Supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->Supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->Supplier->defaultTaxType->isDefault);
            $this->assertTrue($model->Supplier->defaultTaxType->hasActivity);
            $this->assertTrue($model->Supplier->defaultTaxType->isManualTax);
            $this->assertEquals($model->Supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($model->Supplier->dueDateMethodId, 1);
            $this->assertEquals($model->Supplier->dueDateMethodValue, 1);
            $this->assertEquals($model->Supplier->id, 33);
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
            $model->Supplier->name = 'sample string 1';
            $model->Supplier->category->description = 'sample string 1';
            $model->Supplier->category->id = 2;
            $model->Supplier->category->modified = '2017-07-18';
            $model->Supplier->category->created = '2017-07-18';
            $model->Supplier->taxReference = 'sample string 2';
            $model->Supplier->contactName = 'sample string 3';
            $model->Supplier->telephone = 'sample string 4';
            $model->Supplier->fax = 'sample string 5';
            $model->Supplier->mobile = 'sample string 6';
            $model->Supplier->email = 'sample string 7';
            $model->Supplier->webAddress = 'sample string 8';
            $model->Supplier->active = true;
            $model->Supplier->creditLimit = 11.0;
            $model->Supplier->postalAddress01 = 'sample string 12';
            $model->Supplier->postalAddress02 = 'sample string 13';
            $model->Supplier->postalAddress03 = 'sample string 14';
            $model->Supplier->postalAddress04 = 'sample string 15';
            $model->Supplier->postalAddress05 = 'sample string 16';
            $model->Supplier->deliveryAddress01 = 'sample string 17';
            $model->Supplier->deliveryAddress02 = 'sample string 18';
            $model->Supplier->deliveryAddress03 = 'sample string 19';
            $model->Supplier->deliveryAddress04 = 'sample string 20';
            $model->Supplier->deliveryAddress05 = 'sample string 21';
            $model->Supplier->autoAllocateToOldestInvoice = true;
            $model->Supplier->textField1 = 'sample string 22';
            $model->Supplier->textField2 = 'sample string 23';
            $model->Supplier->textField3 = 'sample string 24';
            $model->Supplier->numericField1 = 1.0;
            $model->Supplier->numericField2 = 1.0;
            $model->Supplier->numericField3 = 1.0;
            $model->Supplier->yesNoField1 = true;
            $model->Supplier->yesNoField2 = true;
            $model->Supplier->yesNoField3 = true;
            $model->Supplier->dateField1 = '2017-07-18';
            $model->Supplier->dateField2 = '2017-07-18';
            $model->Supplier->dateField3 = '2017-07-18';
            $model->Supplier->businessRegistrationNumber = 'sample string 29';
            $model->Supplier->RMCDApprovalNumber = 'sample string 30';
            $model->Supplier->taxStatusVerified = '2017-07-18';
            $model->Supplier->currencyId = 1;
            $model->Supplier->currencySymbol = 'sample string 31';
            $model->Supplier->defaultDiscountPercentage = 1.0;
            $model->Supplier->defaultTaxTypeId = 1;
            $model->Supplier->defaultTaxType->id = 1;
            $model->Supplier->defaultTaxType->name = 'sample string 2';
            $model->Supplier->defaultTaxType->percentage = 3.1;
            $model->Supplier->defaultTaxType->isDefault = true;
            $model->Supplier->defaultTaxType->isManualTax = true;
            $model->Supplier->dueDateMethodId = 1;
            $model->Supplier->dueDateMethodValue = 1;
            $model->Supplier->id = 33;
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
            $this->assertEquals($savedModel->Supplier->name, 'sample string 1');
            $this->assertEquals($savedModel->Supplier->category->description, 'sample string 1');
            $this->assertEquals($savedModel->Supplier->category->id, 2);
            $this->assertEquals($savedModel->Supplier->category->modified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->Supplier->category->created->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->Supplier->taxReference, 'sample string 2');
            $this->assertEquals($savedModel->Supplier->contactName, 'sample string 3');
            $this->assertEquals($savedModel->Supplier->telephone, 'sample string 4');
            $this->assertEquals($savedModel->Supplier->fax, 'sample string 5');
            $this->assertEquals($savedModel->Supplier->mobile, 'sample string 6');
            $this->assertEquals($savedModel->Supplier->email, 'sample string 7');
            $this->assertEquals($savedModel->Supplier->webAddress, 'sample string 8');
            $this->assertTrue($savedModel->Supplier->active);
            $this->assertEquals($savedModel->Supplier->creditLimit, 11.0);
            $this->assertEquals($savedModel->Supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($savedModel->Supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($savedModel->Supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($savedModel->Supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($savedModel->Supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($savedModel->Supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($savedModel->Supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($savedModel->Supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($savedModel->Supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($savedModel->Supplier->deliveryAddress05, 'sample string 21');
            $this->assertTrue($savedModel->Supplier->autoAllocateToOldestInvoice);
            $this->assertEquals($savedModel->Supplier->textField1, 'sample string 22');
            $this->assertEquals($savedModel->Supplier->textField2, 'sample string 23');
            $this->assertEquals($savedModel->Supplier->textField3, 'sample string 24');
            $this->assertEquals($savedModel->Supplier->numericField1, 1.0);
            $this->assertEquals($savedModel->Supplier->numericField2, 1.0);
            $this->assertEquals($savedModel->Supplier->numericField3, 1.0);
            $this->assertTrue($savedModel->Supplier->yesNoField1);
            $this->assertTrue($savedModel->Supplier->yesNoField2);
            $this->assertTrue($savedModel->Supplier->yesNoField3);
            $this->assertEquals($savedModel->Supplier->dateField1->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->Supplier->dateField2->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->Supplier->dateField3->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->Supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($savedModel->Supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($savedModel->Supplier->taxStatusVerified->format('Y-m-d'), '2017-07-18');
            $this->assertEquals($savedModel->Supplier->currencyId, 1);
            $this->assertEquals($savedModel->Supplier->currencySymbol, 'sample string 31');
            $this->assertEquals($savedModel->Supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($savedModel->Supplier->defaultTaxTypeId, 1);
            $this->assertEquals($savedModel->Supplier->defaultTaxType->id, 1);
            $this->assertEquals($savedModel->Supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($savedModel->Supplier->defaultTaxType->percentage, 3.1);
            $this->assertTrue($savedModel->Supplier->defaultTaxType->isDefault);
            $this->assertTrue($savedModel->Supplier->defaultTaxType->isManualTax);
            $this->assertEquals($savedModel->Supplier->dueDateMethodId, 1);
            $this->assertEquals($savedModel->Supplier->dueDateMethodValue, 1);
            $this->assertEquals($savedModel->Supplier->id, 33);
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
}
