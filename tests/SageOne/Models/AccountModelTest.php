<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Account;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\AccountCategory;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class AccountModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(Account::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(Account::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(Account::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(Account::class, 'name');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(Account::class, 'reportingGroupId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(Account::class, 'name');
    }

    public function testInject()
    {
        $this->verifyInject(Account::class, function ($model, $data) {
            $this->assertEquals($model->id, 11);
            $this->assertTrue($model->active);
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertEquals($model->balance, 4.0);
            $this->assertEquals($model->description, 'sample string 5');
            $this->assertEquals($model->reportingGroupId, 1);
            $this->assertTrue($model->unallocatedAccount);
            $this->assertTrue($model->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->accountType, 9);
            $this->assertTrue($model->hasActivity);
            $this->assertEquals($model->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertInstanceOf(AccountCategory::class, $model->category);
            $this->assertEquals($model->category->comment, 'sample string 1');
            $this->assertEquals($model->category->order, 6);
            $this->assertEquals($model->category->description, 'sample string 7');
            $this->assertEquals($model->category->id, 8);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->defaultTaxType->id, 1);
            $this->assertEquals($model->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->defaultTaxType->isDefault);
            $this->assertTrue($model->defaultTaxType->hasActivity);
            $this->assertTrue($model->defaultTaxType->isManualTax);
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-06-30');

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(15, $objArray);
        });
    }

    public function testAttributes()
    {
        $this->verifyAttributes(Account::class, [
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
                'type' => 'AccountCategory',
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
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'reportingGroupId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'unallocatedAccount' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'isTaxLocked' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
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
            'accountType' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => true,
            ],
            'hasActivity' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'defaultTaxTypeId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'defaultTaxType' => [
                'type' => 'TaxType',
                'nullable' => true,
                'readonly' => false,
            ]
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(Account::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(Account::class, function ($results, $data) {
            $this->assertEquals(2, count($results));
            $model = new Account($this->config);
            $data = json_decode(json_encode($results[0], JSON_PRESERVE_ZERO_FRACTION));
            $model->loadResult($data);

            $this->assertEquals($model->id, 11);
            $this->assertTrue($model->active);
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertEquals($model->balance, 4.0);
            $this->assertEquals($model->description, 'sample string 5');
            $this->assertEquals($model->reportingGroupId, 1);
            $this->assertTrue($model->unallocatedAccount);
            $this->assertTrue($model->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-06-28');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-06-28');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->accountType, 9);
            $this->assertTrue($model->hasActivity);
            $this->assertEquals($model->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertInstanceOf(AccountCategory::class, $model->category);
            $this->assertEquals($model->category->comment, 'sample string 1');
            $this->assertEquals($model->category->order, 6);
            $this->assertEquals($model->category->description, 'sample string 7');
            $this->assertEquals($model->category->id, 8);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-06-28');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-06-28');
            $this->assertEquals($model->defaultTaxType->id, 1);
            $this->assertEquals($model->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->defaultTaxType->isDefault);
            $this->assertTrue($model->defaultTaxType->hasActivity);
            $this->assertTrue($model->defaultTaxType->isManualTax);
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-06-28');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-06-28');
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(Account::class, 2, function ($model) {
            $this->assertEquals($model->id, 11);
            $this->assertTrue($model->active);
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertEquals($model->balance, 4.0);
            $this->assertEquals($model->description, 'sample string 5');
            $this->assertEquals($model->reportingGroupId, 1);
            $this->assertTrue($model->unallocatedAccount);
            $this->assertTrue($model->isTaxLocked);
            $this->assertInstanceOf(\DateTime::class, $model->modified);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->modified->getTimezone()->getName(), 'UTC');
            $this->assertInstanceOf(\DateTime::class, $model->created);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->created->getTimezone()->getName(), 'UTC');
            $this->assertEquals($model->accountType, 9);
            $this->assertTrue($model->hasActivity);
            $this->assertEquals($model->defaultTaxTypeId, 1);
            $this->assertInstanceOf(TaxType::class, $model->defaultTaxType);
            $this->assertInstanceOf(AccountCategory::class, $model->category);
            $this->assertEquals($model->category->comment, 'sample string 1');
            $this->assertEquals($model->category->order, 6);
            $this->assertEquals($model->category->description, 'sample string 7');
            $this->assertEquals($model->category->id, 8);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->defaultTaxType->id, 1);
            $this->assertEquals($model->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->defaultTaxType->percentage, 3.1);
            $this->assertTrue($model->defaultTaxType->isDefault);
            $this->assertTrue($model->defaultTaxType->hasActivity);
            $this->assertTrue($model->defaultTaxType->isManualTax);
            $this->assertEquals($model->defaultTaxType->created->format('Y-m-d'), '2017-06-30');
            $this->assertEquals($model->defaultTaxType->modified->format('Y-m-d'), '2017-06-30');
        });
    }

    public function testSave()
    {
        $this->verifySave(Account::class, function ($response) {
            $this->assertEquals(11, $response->ID);
            // TODO Do actual checks
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(Account::class, 11, function () {
            // TODO do actual checks
        });
    }

    public function testAuth()
    {
        $this->verifyRequestWithAuth(Account::class, 'Save');
    }
}
