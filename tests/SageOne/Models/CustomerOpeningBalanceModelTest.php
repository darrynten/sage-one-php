<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\CustomerOpeningBalance;

class CustomerOpeningBalanceModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(CustomerOpeningBalance::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(CustomerOpeningBalance::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(CustomerOpeningBalance::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(CustomerOpeningBalance::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(CustomerOpeningBalance::class, 'customer_CurrencyId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(CustomerOpeningBalance::class, 'customerId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(CustomerOpeningBalance::class, [
            'customerId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'customer_CurrencyId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'customer_ExchangeRate' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'id' => [
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

    public function testInject()
    {
        $this->verifyInject(CustomerOpeningBalance::class, function ($model) {
            $this->assertEquals($model->customerId, 1);
            $this->assertEquals($model->customer_CurrencyId, 1);
            $this->assertEquals($model->customer_ExchangeRate, 1.0);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->balance, 3.0);
            $this->assertEquals($model->reason, 'sample string 4');
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-27');

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(7, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(CustomerOpeningBalance::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(CustomerOpeningBalance::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(CustomerOpeningBalance::class, $results[0]);
            $this->assertInstanceOf(CustomerOpeningBalance::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->customerId, 1);
            $this->assertEquals($model1->customer_CurrencyId, 1);
            $this->assertEquals($model1->customer_ExchangeRate, 1.0);
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->balance, 3.0);
            $this->assertEquals($model1->reason, 'sample string 4');
            $this->assertEquals($model1->date->format('Y-m-d'), '2017-07-27');

            $model2 = $results[1];
            $this->assertEquals($model2->customerId, 10);
            $this->assertEquals($model2->customer_CurrencyId, 11);
            $this->assertEquals($model2->customer_ExchangeRate, 12.0);
            $this->assertEquals($model2->id, 13);
            $this->assertEquals($model2->balance, 14.0);
            $this->assertEquals($model2->reason, 'sample string 15');
            $this->assertEquals($model2->date->format('Y-m-d'), '2017-07-27');

            $this->assertCount(7, json_decode($model1->toJson(), true));
            $this->assertCount(7, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(CustomerOpeningBalance::class, 2, function ($model) {
            $this->assertEquals($model->customerId, 1);
            $this->assertEquals($model->customer_CurrencyId, 1);
            $this->assertEquals($model->customer_ExchangeRate, 1.0);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->balance, 3.0);
            $this->assertEquals($model->reason, 'sample string 4');
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-27');
        });
    }

    public function testSave()
    {
        $this->verifySave(CustomerOpeningBalance::class, function ($model) {
            $model->customerId = 1;
            $model->customer_CurrencyId = 1;
            $model->customer_ExchangeRate = 1.0;
            $model->id = 2;
            $model->balance = 3.0;
            $model->reason = 'sample string 4';
            $model->date = '2017-07-27';
        }, function ($savedModel) {
            $this->assertEquals($savedModel->customerId, 1);
            $this->assertEquals($savedModel->customer_CurrencyId, 1);
            $this->assertEquals($savedModel->customer_ExchangeRate, 1.0);
            $this->assertEquals($savedModel->id, 2);
            $this->assertEquals($savedModel->balance, 3.0);
            $this->assertEquals($savedModel->reason, 'sample string 4');
            $this->assertEquals($savedModel->date->format('Y-m-d'), '2017-07-27');
        });
    }
}
