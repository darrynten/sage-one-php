<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\ItemCategory;

class ItemCategoryModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(ItemCategory::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(ItemCategory::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(ItemCategory::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(ItemCategory::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(ItemCategory::class, 'description');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(ItemCategory::class, [
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

    public function testInject()
    {
        $this->verifyInject(ItemCategory::class, function ($model) {
            $this->assertEquals($model->description, 'sample string 1');
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->modified->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->created->Format('Y-m-d'), '2017-07-28');

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(4, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(ItemCategory::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(ItemCategory::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(ItemCategory::class, $results[0]);
            $this->assertInstanceOf(ItemCategory::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->description, 'sample string 1');
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->modified->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->created->Format('Y-m-d'), '2017-07-28');

            $model2 = $results[1];
            $this->assertEquals($model2->description, 'sample string 11');
            $this->assertEquals($model2->id, 12);
            $this->assertEquals($model2->modified->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->created->Format('Y-m-d'), '2017-07-28');

            $this->assertCount(4, json_decode($model1->toJson(), true));
            $this->assertCount(4, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(ItemCategory::class, 2, function ($model) {
            $this->assertEquals($model->description, 'sample string 1');
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->modified->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->created->Format('Y-m-d'), '2017-07-28');
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(ItemCategory::class, 2, true);
    }

    public function testSave()
    {
        $this->verifySave(ItemCategory::class, function ($model) {
            $model->description = 'sample string 1';
            $model->id = 2;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->description, 'sample string 1');
            $this->assertEquals($savedModel->id, 2);
        });
    }
}
