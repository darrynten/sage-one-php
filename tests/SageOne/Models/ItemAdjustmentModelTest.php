<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\ItemAdjustment;

class ItemAdjustmentModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(ItemAdjustment::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(ItemAdjustment::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(ItemAdjustment::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(ItemAdjustment::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(ItemAdjustment::class, 'modified');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(ItemAdjustment::class, 'date');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(ItemAdjustment::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'itemId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'averageCost' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'quantity' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'reason' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'modified' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(ItemAdjustment::class, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->itemId, 3);
            $this->assertEquals($model->averageCost, 4.0);
            $this->assertEquals($model->quantity, 5.0);
            $this->assertEquals($model->reason, 'sample string 6');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-28');

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(8, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(ItemAdjustment::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(ItemAdjustment::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(ItemAdjustment::class, $results[0]);
            $this->assertInstanceOf(ItemAdjustment::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->date->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->itemId, 3);
            $this->assertEquals($model1->averageCost, 4.0);
            $this->assertEquals($model1->quantity, 5.0);
            $this->assertEquals($model1->reason, 'sample string 6');
            $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->modified->format('Y-m-d'), '2017-07-28');

            $model2 = $results[1];
            $this->assertEquals($model2->id, 11);
            $this->assertEquals($model2->date->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->itemId, 13);
            $this->assertEquals($model2->averageCost, 14.0);
            $this->assertEquals($model2->quantity, 15.0);
            $this->assertEquals($model2->reason, 'sample string 16');
            $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->modified->format('Y-m-d'), '2017-07-28');

            $this->assertCount(8, json_decode($model1->toJson(), true));
            $this->assertCount(8, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(ItemAdjustment::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->itemId, 3);
            $this->assertEquals($model->averageCost, 4.0);
            $this->assertEquals($model->quantity, 5.0);
            $this->assertEquals($model->reason, 'sample string 6');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-28');
        });
    }

    public function testSave()
    {
        $this->verifySave(ItemAdjustment::class, function ($model) {
            $model->id = 1;
            $model->date = '2017-07-28';
            $model->itemId = 3;
            $model->averageCost = 4.0;
            $model->quantity = 5.0;
            $model->reason = 'sample string 6';
            $model->created = '2017-07-28';
            $model->modified = '2017-07-28';
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->date->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($savedModel->itemId, 3);
            $this->assertEquals($savedModel->averageCost, 4.0);
            $this->assertEquals($savedModel->quantity, 5.0);
            $this->assertEquals($savedModel->reason, 'sample string 6');
            $this->assertEquals($savedModel->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($savedModel->modified->format('Y-m-d'), '2017-07-28');
        });
    }
}
