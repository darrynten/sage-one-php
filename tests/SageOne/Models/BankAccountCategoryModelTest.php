<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankAccountCategory;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class BankAccountCategoryModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankAccountCategory::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankAccountCategory::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankAccountCategory::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankAccountCategory::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(BankAccountCategory::class, 'description');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(BankAccountCategory::class, [
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'modified' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => true,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => true,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(BankAccountCategory::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(BankAccountCategory::class, function ($model) {
            $this->assertEquals($model->description, "sample string 1");
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-25');

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(4, $objArray);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(BankAccountCategory::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(BankAccountCategory::class, $results[0]);
            $this->assertInstanceOf(BankAccountCategory::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->description, "sample string 1");
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->modified->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-25');

            $model2 = $results[1];
            $this->assertEquals($model2->description, "sample string 2");
            $this->assertEquals($model2->id, 3);
            $this->assertEquals($model2->modified->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-25');

            $this->assertCount(4, json_decode($model1->toJson(), true));
            $this->assertCount(4, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(BankAccountCategory::class, 2, function ($model) {
            $this->assertEquals($model->description, "sample string 1");
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-25');
        });
    }

    public function testSave()
    {
        $this->verifySave(BankAccountCategory::class, function ($model) {
            $model->description = "sample string 1";
            $model->id = 2;
        }, function ($savedModel) {
            $this->assertEquals("sample string 1", $savedModel->description);
            $this->assertEquals(2, $savedModel->id);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(BankAccountCategory::class, 2, true);
    }

    public function testDeleteFails()
    {
        $this->verifyDelete(BankAccountCategory::class, 2, false);
    }

    public function testAuth()
    {
        $this->verifyRequestWithAuth(BankAccountCategory::class, 'Save');
    }
}
