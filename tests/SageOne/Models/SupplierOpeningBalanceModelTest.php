<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierOpeningBalance;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierOpeningBalanceModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierOpeningBalance::class, 'supplierId');
        $this->verifyCanNotNullify(SupplierOpeningBalance::class, 'id');
        $this->verifyCanNotNullify(SupplierOpeningBalance::class, 'balance');
        $this->verifyCanNotNullify(SupplierOpeningBalance::class, 'reason');
        $this->verifyCanNotNullify(SupplierOpeningBalance::class, 'date');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(SupplierOpeningBalance::class, 'supplier_CurrencyId');
        $this->verifyCanNullify(SupplierOpeningBalance::class, 'supplier_ExchangeRate');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierOpeningBalance::class, 'supplierId');
    }

    public function testInject()
    {
        $this->verifyInject(SupplierOpeningBalance::class, function ($model) {
            $this->assertEquals(2, $model->id);
            $this->assertEquals(5.5, $model->balance);
            $this->assertEquals('sample string 4', $model->reason);
            $this->assertEquals('2017-07-18', $model->date->format('Y-m-d'));
        });
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierOpeningBalance::class, [
            'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            ],
            'supplierId' => [
                'type' => 'integer',
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
        $this->verifyFeatures(SupplierOpeningBalance::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierOpeningBalance::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(2, $results[0]->id);
            $this->assertEquals(4, $results[1]->id);
            $this->assertEquals(3.5, $results[0]->balance);
            $this->assertEquals(4.5, $results[1]->balance);
            $this->assertEquals('sample string 3', $results[0]->reason);
            $this->assertEquals('sample string 4', $results[1]->reason);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierOpeningBalance::class, 2, function ($model) {
            $this->assertInstanceOf(SupplierOpeningBalance::class, $model);
            $this->assertEquals(2, $model->id);
            $this->assertEquals(1, $model->supplierId);
            $this->assertEquals(1, $model->supplier_CurrencyId);
            $this->assertEquals(3.1, $model->supplier_ExchangeRate);
            $this->assertEquals(5.5, $model->balance);
            $this->assertEquals('sample string 4', $model->reason);
            $this->assertEquals('2017-07-18', $model->date->format('Y-m-d'));
        });
    }

    public function testSave()
    {
        $this->verifySave(SupplierOpeningBalance::class, function ($model) {
            $model->id = 2;
            $model->supplierId = 1;
            $model->supplier_CurrencyId = 1;
            $model->supplier_ExchangeRate = 1.0;
            $model->balance = 3.0;
            $model->reason = "sample string 4";
            $model->date = "2017-07-18";
        }, function ($savedModel) {
            $this->assertEquals(2, $savedModel->id);
            $this->assertEquals(1, $savedModel->supplierId);
            $this->assertEquals(1, $savedModel->supplier_CurrencyId);
            $this->assertEquals(1.0, $savedModel->supplier_ExchangeRate);
            $this->assertEquals(3.0, $savedModel->balance);
            $this->assertEquals("sample string 4", $savedModel->reason);
            $this->assertEquals("2017-07-18", $savedModel->date->format('Y-m-d'));
        });
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(SupplierOpeningBalance::class);
    }
}
