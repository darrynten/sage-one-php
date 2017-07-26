<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierAdditionalContactDetail;

class SupplierAdditionalContactDetailTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierAdditionalContactDetail::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierAdditionalContactDetail::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierAdditionalContactDetail::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'id');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'supplierId');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'contactName');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'designation');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'telephone');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'fax');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'mobile');
        $this->verifyCanNotNullify(SupplierAdditionalContactDetail::class, 'email');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierAdditionalContactDetail::class, 'supplierId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierAdditionalContactDetail::class, [
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
            'contactName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'designation' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 50,
            ],
            'telephone' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'fax' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'mobile' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'email' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
                'validate' => FILTER_VALIDATE_EMAIL,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierAdditionalContactDetail::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(SupplierAdditionalContactDetail::class, function ($model) {
            $this->assertEquals(5, $model->id);
            $this->assertEquals(6, $model->supplierId);
            $this->assertEquals('str 7', $model->contactName);
            $this->assertEquals('sample string 50', $model->designation);
            $this->assertEquals('sample string 8', $model->telephone);
            $this->assertEquals('sample string', $model->fax);
            $this->assertEquals('7777777', $model->mobile);
            $this->assertEquals('email@hotmail.com', $model->email);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(8, $objArray);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierAdditionalContactDetail::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $results[0]);
            $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $results[1]);

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(2, $results[0]->supplierId);
            $this->assertEquals('sample string 3', $results[0]->contactName);
            $this->assertEquals('sample string 4', $results[0]->designation);
            $this->assertEquals('sample string 5', $results[0]->telephone);
            $this->assertEquals('sample string 6', $results[0]->fax);
            $this->assertEquals('sample string 7', $results[0]->mobile);
            $this->assertEquals('another@live.com', $results[0]->email);

            $this->assertEquals(3, $results[1]->id);
            $this->assertEquals(4, $results[1]->supplierId);
            $this->assertEquals('rrrrrrrrrrr', $results[1]->contactName);
            $this->assertEquals('sample 5', $results[1]->designation);
            $this->assertEquals('sample string 50', $results[1]->telephone);
            $this->assertEquals('sample string 90', $results[1]->fax);
            $this->assertEquals('sample string 70', $results[1]->mobile);
            $this->assertEquals('somemail@gmail.com', $results[1]->email);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierAdditionalContactDetail::class, 5, function ($model) {
            $this->assertEquals(5, $model->id);
            $this->assertEquals(6, $model->supplierId);
            $this->assertEquals('str 7', $model->contactName);
            $this->assertEquals('sample string 50', $model->designation);
            $this->assertEquals('sample string 8', $model->telephone);
            $this->assertEquals('sample string', $model->fax);
            $this->assertEquals('7777777', $model->mobile);
            $this->assertEquals('email@hotmail.com', $model->email);
        });
    }

    public function testGetAdditionalContactDetails()
    {
        $additionalContactDetails = $this->setUpRequestMock(
            'GET',
            SupplierAdditionalContactDetail::class,
            'SupplierAdditionalContactDetail/GetAdditionalContactDetails/7',
            'SupplierAdditionalContactDetail/GET_SupplierAdditionalContactDetail_GetAdditionalContactDetails.json'
        );
        $allAdditionalContactDetails = $additionalContactDetails->getAdditionalContactDetails(7);

        $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $allAdditionalContactDetails->results[0]);
        $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $allAdditionalContactDetails->results[1]);
        
        $this->assertEquals(1, $allAdditionalContactDetails->results[0]->id);
        $this->assertEquals(7, $allAdditionalContactDetails->results[0]->supplierId);
        $this->assertEquals('sample string 3', $allAdditionalContactDetails->results[0]->contactName);
        $this->assertEquals('sample string 4', $allAdditionalContactDetails->results[0]->designation);
        $this->assertEquals('sample string 5', $allAdditionalContactDetails->results[0]->telephone);
        $this->assertEquals('sample string 6', $allAdditionalContactDetails->results[0]->fax);
        $this->assertEquals('sample string 7', $allAdditionalContactDetails->results[0]->mobile);
        $this->assertEquals('sample@string.com', $allAdditionalContactDetails->results[0]->email);

        $this->assertEquals(2, $allAdditionalContactDetails->results[1]->id);
        $this->assertEquals(7, $allAdditionalContactDetails->results[1]->supplierId);
        $this->assertEquals('Nathaniel', $allAdditionalContactDetails->results[1]->contactName);
        $this->assertEquals('Super supplier', $allAdditionalContactDetails->results[1]->designation);
        $this->assertEquals('999999999', $allAdditionalContactDetails->results[1]->telephone);
        $this->assertEquals('sample string sixty', $allAdditionalContactDetails->results[1]->fax);
        $this->assertEquals('101010101010', $allAdditionalContactDetails->results[1]->mobile);
        $this->assertEquals('nathan@something.com', $allAdditionalContactDetails->results[1]->email);
    }

    public function testSave()
    {
        $this->verifySave(SupplierAdditionalContactDetail::class, function ($model) {
            $model->id = 1;
            $model->supplierId = 2;
            $model->contactName = 'sample string 3';
            $model->designation = 'sample string 4';
            $model->telephone = 'sample string 5';
            $model->fax = 'sample string 6';
            $model->mobile = 'sample string 7';
            $model->email = 'sample@live.com';
        }, function ($savedModel) {
            $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $savedModel);
            $this->assertEquals(1, $savedModel->id);
            $this->assertEquals(2, $savedModel->supplierId);
            $this->assertEquals('sample string 3', $savedModel->contactName);
            $this->assertEquals('sample string 4', $savedModel->designation);
            $this->assertEquals('sample string 5', $savedModel->telephone);
            $this->assertEquals('sample string 6', $savedModel->fax);
            $this->assertEquals('sample string 7', $savedModel->mobile);
            $this->assertEquals('sample@live.com', $savedModel->email);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(SupplierAdditionalContactDetail::class, 1, true);
    }
}
