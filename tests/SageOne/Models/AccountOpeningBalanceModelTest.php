<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountOpeningBalance;

class AccountOpeningBalanceModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AccountOpeningBalance::class, 'reason');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AccountOpeningBalance::class, 'accountId');
    }

    public function testInject()
    {
        $this->verifyInject(AccountOpeningBalance::class, function ($model, $data) {
            $this->assertEquals(2, $model->id);
            $this->assertEquals(3.0, $model->balance);
            $this->assertEquals('sample string 4', $model->reason);
            $this->assertEquals('2017-07-10', $model->date->format('Y-m-d'));
        });
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AccountOpeningBalance::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'accountId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'balance' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'reason' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AccountOpeningBalance::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AccountOpeningBalance::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(2, $results[0]->id);
            $this->assertEquals(3, $results[1]->id);
            $this->assertEquals(3.0, $results[0]->balance);
            $this->assertEquals(4.0, $results[1]->balance);
            $this->assertEquals('sample string 4', $results[0]->reason);
            $this->assertEquals('sample string 5', $results[1]->reason);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AccountOpeningBalance::class, 2, function ($model) {
        });
    }

    public function testSave()
    {
        $this->verifySave(AccountOpeningBalance::class, function ($model) {
            $this->assertEquals(2, $model->id);
            // TODO Do actual checks
        });
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(AccountOpeningBalance::class);
    }
}
