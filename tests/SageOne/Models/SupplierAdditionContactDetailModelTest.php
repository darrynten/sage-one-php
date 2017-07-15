<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierAdditionalContactDetail;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierAdditionalContactDetailsModelTest extends BaseModelTest
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
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierAdditionalContactDetail::class, 'id');
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
                'max' => 100,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(SupplierAdditionalContactDetail::class, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->supplierId, 2);
            $this->assertEquals($model->contactName, 'sample string 3');
            $this->assertArrayHasKey('min', $model->contactName['min']);
            $this->assertEquals(0, $model->contactName['min']);
            $this->assertEquals('integer', gettype($model->contactName['min']));
            $this->assertArrayHasKey('max', $model->contactName['max']);
            $this->assertEquals(100, $model->contactName['max']);
            $this->assertEquals('integer', gettype($model->contactName['max']));
            $this->assertEquals($model->designation, 'sample string 4');
            $this->assertArrayHasKey('min', $model->designation['min']);
            $this->assertEquals(0, $model->designation['min']);
            $this->assertEquals('integer', gettype($model->designation['min']));
            $this->assertArrayHasKey('max', $model->designation['max']);
            $this->assertEquals(50, $model->designation['max']);
            $this->assertEquals('integer', gettype($model->designation['max']));
            $this->assertEquals($model->telephone, 'sample string 5');
            $this->assertArrayHasKey('min', $model->telephone['min']);
            $this->assertEquals(0, $model->telephone['min']);
            $this->assertEquals('integer', gettype($model->telephone['min']));
            $this->assertArrayHasKey('max', $model->telephone['max']);
            $this->assertEquals(30, $model->telephone['max']);
            $this->assertEquals('integer', gettype($model->telephone['max']));
            $this->assertEquals($model->fax, 'sample string 6');
            $this->assertArrayHasKey('min', $model->fax['min']);
            $this->assertEquals(0, $model->fax['min']);
            $this->assertEquals('integer', gettype($model->fax['min']));
            $this->assertArrayHasKey('max', $model->fax['max']);
            $this->assertEquals(30, $model->fax['max']);
            $this->assertEquals('integer', gettype($model->fax['max']));
            $this->assertEquals($model->mobile, 'sample string 7');
            $this->assertArrayHasKey('min', $model->mobile['min']);
            $this->assertEquals(0, $model->mobile['min']);
            $this->assertEquals('integer', gettype($model->mobile['min']));
            $this->assertArrayHasKey('max', $model->mobile['max']);
            $this->assertEquals(30, $model->mobile['max']);
            $this->assertEquals('integer', gettype($model->mobile['max']));
            $this->assertEquals($model->email, 'sample string 8');


            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(8, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierAdditionalContactDetail::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierAdditionalContactDetail::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $results[0]);
            $this->assertInstanceOf(SupplierAdditionalContactDetail::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->supplierId, 2);
            $this->assertEquals($model1->contactName, 'sample string 3');
            $this->assertEquals($model1->designation, 'sample string 4');
            $this->assertEquals($model1->telephone, 'sample string 5');
            $this->assertEquals($model1->fax, 'sample string 6');
            $this->assertEquals($model1->mobile, 'sample string 7');
            $this->assertEquals($model1->email, 'sample string 8');

            $model2 = $results[1];
            $this->assertEquals($model2->id, 1);
            $this->assertEquals($model2->supplierId, 2);
            $this->assertEquals($model2->contactName, 'sample string 3');
            $this->assertEquals($model2->designation, 'sample string 4');
            $this->assertEquals($model2->telephone, 'sample string 5');
            $this->assertEquals($model2->fax, 'sample string 6');
            $this->assertEquals($model2->mobile, 'sample string 7');
            $this->assertEquals($model2->email, 'sample string 8');

            $this->assertCount(8, json_decode($model1->toJson(), true));
            $this->assertCount(8, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierAdditionalContactDetail::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->supplierId, 2);
            $this->assertEquals($model->designation, 'sample string 4');
            $this->assertEquals($model->telephone, 'sample string 5');
            $this->assertEquals($model->fax, 'sample string 6');
            $this->assertEquals($model->mobile, 'sample string 7');
            $this->assertEquals($model->email, 'sample string 8');
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(SupplierAdditionalContactDetail::class, 1, function () {
            // TODO do actual checks
        });
    }

    public function testSave()
    {
        $this->verifySave(SupplierAdditionalContactDetail::class, function ($model) {
            $model->id = 1;
            $model->supplierId = 2;
            $model->designation = 'sample string 4';
            $model->telephone = 'sample string 5';
            $model->fax = 'sample string 6';
            $model->mobile = 'sample string 7';
            $model->email = 'sample string 8';

        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->supplierId, 2);
            $this->assertEquals($savedModel->designation, 'sample string 4');
            $this->assertEquals($savedModel->telephone, 'sample string 5');
            $this->assertEquals($savedModel->fax, 'sample string 6');
            $this->assertEquals($savedModel->mobile, 'sample string 7');
            $this->assertEquals($savedModel->email, 'sample string 8');
        });
    }
}
