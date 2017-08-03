<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankFeedAccount;
use DarrynTen\SageOne\Models\BankFeedAccountGroup;


class BankFeedAccountModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankFeedAccount::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankFeedAccount::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankFeedAccount::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankFeedAccount::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(BankFeedAccount::class, 'balance');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(BankFeedAccount::class, 'bankFeedAccountGroupId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(BankFeedAccount::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankFeedAccountGroupId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankFeedAccountGroup' => [
                'type' => 'BankFeedAccountGroup',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'identifier' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'lastRefreshDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'firstImportDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'balance' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankAccountId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankAccountName' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
            ],
            'lastRefreshStatusId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(BankFeedAccount::class, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->bankFeedAccountGroupId, 2);
            $this->assertInstanceOf(BankFeedAccountGroup::class, $model->bankFeedAccountGroup);
            $this->assertEquals($model->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertTrue($model->bankFeedAccountGroup->requiresAdditionalAuthentication);
            $this->assertEquals($model->bankFeedAccountGroup->lastRefreshStatusId, 7);
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->description, 'sample string 3');
            $this->assertEquals($model->identifier, 'sample string 4');
            $this->assertEquals($model->lastRefreshDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->firstImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->balance, 1.0);
            $this->assertEquals($model->bankAccountId, 1);
            $this->assertEquals($model->bankAccountName, 'sample string 5');
            $this->assertEquals($model->lastRefreshStatusId, 6);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(11, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(BankFeedAccount::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }
}
