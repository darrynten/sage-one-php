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
        $this->verifyInject(Account::class, function ($model) {
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
        $this->verifyGetAll(Account::class, function ($results) {
            $this->assertEquals(2, count($results));
            $model = $results[0];

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
        $this->verifySave(Account::class, function ($model) {
            $model->active = true;
            $model->description = 'sample string 5';
            $model->reportingGroupId = 1;
            $model->defaultTaxTypeId = 1;
        }, function($savedModel) {
            $this->assertEquals(true, $savedModel->active);
            $this->assertEquals('sample string 5', $savedModel->description);
            $this->assertEquals(1, $savedModel->reportingGroupId);
            $this->assertEquals(1, $savedModel->defaultTaxTypeId);
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

    public function testGetAllWithSystemAccounts()
    {
        $account = $this->setUpRequestMock('GET', Account::class, 'Account/GetWithSystemAccounts', 'Account/GET_Account_GetWithSystemAccounts.json');
        $allAccounts = $account->getWithSystemAccounts();
        $account = $allAccounts->results[0];

        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals(11, $account->id);
        $this->assertInstanceOf(TaxType::class, $account->defaultTaxType);
        $this->assertInstanceOf(AccountCategory::class, $account->category);
    }

    public function testGetAccountsByCategoryId()
    {
        $account = $this->setUpRequestMock('GET', Account::class, 'Account/GetAccountsByCategoryId/8', 'Account/GET_Account_GetAccountsByCategoryId_xx.json');
        $allAccounts = $account->getAccountsByCategoryId(8);
        $account = $allAccounts->results[0];

        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals(11, $account->id);
        $this->assertEquals(8, $account->category->id);
        $this->assertInstanceOf(TaxType::class, $account->defaultTaxType);
        $this->assertInstanceOf(AccountCategory::class, $account->category);
    }

    public function testGetChartofAccounts()
    {
        $account = $this->setUpRequestMock('GET', Account::class, 'Account/GetChartofAccounts', 'Account/GET_Account_GetChartofAccounts.json');
        $allAccounts = $account->getChartofAccounts();
        $account = $allAccounts->results[0];

        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals(11, $account->id);
        $this->assertInstanceOf(TaxType::class, $account->defaultTaxType);
        $this->assertInstanceOf(AccountCategory::class, $account->category);
    }
}
