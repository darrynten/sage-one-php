<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\ItemOpeningBalance;

class ItemOpeningBalanceModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(ItemOpeningBalance::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(ItemOpeningBalance::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(ItemOpeningBalance::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(ItemOpeningBalance::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(ItemOpeningBalance::class, 'itemId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(ItemOpeningBalance::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'itemId' => [
                'type' => 'integer',
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
            'quantity' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'cost' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => true,
            ],
            'modified' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => true,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(ItemOpeningBalance::class, function ($model) {
            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(8, $objArray);

            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->itemId, 2);
            $this->assertEquals($model->reason, 'sample string 3');
            $this->assertEquals($model->date->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->quantity, 5.0);
            $this->assertEquals($model->cost, 6.0);
            $this->assertEquals($model->created->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->modified->Format('Y-m-d'), '2017-07-28');
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(ItemOpeningBalance::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(ItemOpeningBalance::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(ItemOpeningBalance::class, $results[0]);
            $this->assertInstanceOf(ItemOpeningBalance::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->itemId, 2);
            $this->assertEquals($model1->reason, 'sample string 3');
            $this->assertEquals($model1->date->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->quantity, 5.0);
            $this->assertEquals($model1->cost, 6.0);
            $this->assertEquals($model1->created->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->modified->Format('Y-m-d'), '2017-07-28');

            $model2 = $results[1];
            $this->assertEquals($model2->id, 11);
            $this->assertEquals($model2->itemId, 12);
            $this->assertEquals($model2->reason, 'sample string 13');
            $this->assertEquals($model2->date->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->quantity, 15.0);
            $this->assertEquals($model2->cost, 16.0);
            $this->assertEquals($model2->created->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->modified->Format('Y-m-d'), '2017-07-28');

            $this->assertCount(8, json_decode($model1->toJson(), true));
            $this->assertCount(8, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(ItemOpeningBalance::class, 6, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->itemId, 2);
            $this->assertEquals($model->reason, 'sample string 3');
            $this->assertEquals($model->date->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->quantity, 5.0);
            $this->assertEquals($model->cost, 6.0);
            $this->assertEquals($model->created->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->modified->Format('Y-m-d'), '2017-07-28');
        });
    }

    public function testSave()
    {
        $this->verifySave(ItemOpeningBalance::class, function ($model) {
            $model->id = 1;
            $model->itemId = 2;
            $model->reason = 'sample string 3';
            $model->date = '2017-07-28';
            $model->quantity = 5.0;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->itemId, 2);
            $this->assertEquals($savedModel->reason, 'sample string 3');
            $this->assertEquals($savedModel->date->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($savedModel->quantity, 5.0);
            $this->assertEquals($savedModel->cost, 6.0);
        });
    }
}
