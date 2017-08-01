<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierBankDetail;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class SupplierBankDetailModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierBankDetail::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierBankDetail::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierBankDetail::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierBankDetail::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(SupplierBankDetail::class, 'bankAccountType');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierBankDetail::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'supplierId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'bankAccountHolder' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
                'required' => true,
            ],
            'bankAccountNumber' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 13,
                'required' => true,
            ],
            'bankName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
                'required' => true,
            ],
            'bankBranchCode' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 6,
                'required' => true,
            ],
            'bankAccountType' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierBankDetail::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierBankDetail::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(7, $results[1]->id);
            $this->assertEquals(2, $results[0]->supplierId);
            $this->assertEquals(12, $results[1]->supplierId);
            $this->assertEquals('sample string 3', $results[0]->bankAccountHolder);
            $this->assertEquals('sample string 26', $results[1]->bankAccountHolder);
            $this->assertEquals('sample strin', $results[0]->bankAccountNumber);
            $this->assertEquals('sample string', $results[1]->bankAccountNumber);
            $this->assertEquals('sample string 5', $results[0]->bankName);
            $this->assertEquals('sample string 20', $results[1]->bankName);
            $this->assertEquals('300030', $results[0]->bankBranchCode);
            $this->assertEquals('300033', $results[1]->bankBranchCode);
            $this->assertEquals(1, $results[0]->bankAccountType);
            $this->assertEquals(3, $results[1]->bankAccountType);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierBankDetail::class, 2, function ($model) {
            $this->assertInstanceOf(SupplierBankDetail::class, $model);
            $this->assertEquals(1, $model->id);
            $this->assertEquals(2, $model->supplierId);
            $this->assertEquals('sample string 3', $model->bankAccountHolder);
            $this->assertEquals('sample strin2', $model->bankAccountNumber);
            $this->assertEquals('sample string 5', $model->bankName);
            $this->assertEquals('123456', $model->bankBranchCode);
            $this->assertEquals(1, $model->bankAccountType);
        });
    }

    public function testSave()
    {
        $this->verifySave(SupplierBankDetail::class, function ($model) {
            $model->id = 1;
            $model->supplierId = 2;
            $model->bankAccountHolder = 'sample string 3';
            $model->bankAccountNumber = 'sample strin2';
            $model->bankName = 'sample string 5';
            $model->bankBranchCode = '123456';
            $model->bankAccountType = 1;
        }, function ($savedModel) {
            $this->assertInstanceOf(SupplierBankDetail::class, $savedModel);
            $this->assertEquals(1, $savedModel->id);
            $this->assertEquals(2, $savedModel->supplierId);
            $this->assertEquals('sample string 3', $savedModel->bankAccountHolder);
            $this->assertEquals('sample strin2', $savedModel->bankAccountNumber);
            $this->assertEquals('sample string 5', $savedModel->bankName);
            $this->assertEquals('123456', $savedModel->bankBranchCode);
            $this->assertEquals(1, $savedModel->bankAccountType);
        });
    }
}
