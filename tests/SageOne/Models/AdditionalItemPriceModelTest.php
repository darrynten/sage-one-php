<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AdditionalItemPrice;

class AdditionalItemPriceModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AdditionalItemPrice::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AdditionalItemPrice::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AdditionalItemPrice::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AdditionalItemPrice::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AdditionalItemPrice::class, 'itemId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AdditionalItemPrice::class, [
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
            'priceInclusive' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'priceExclusive' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'additionalPriceListId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(AdditionalItemPrice::class, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->itemId, 2);
            $this->assertEquals($model->priceInclusive, 3.0);
            $this->assertEquals($model->priceExclusive, 4.0);
            $this->assertEquals($model->additionalPriceListId, 5.0);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(5, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AdditionalItemPrice::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AdditionalItemPrice::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(AdditionalItemPrice::class, $results[0]);
            $this->assertInstanceOf(AdditionalItemPrice::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->itemId, 2);
            $this->assertEquals($model1->priceInclusive, 3.0);
            $this->assertEquals($model1->priceExclusive, 4.0);
            $this->assertEquals($model1->additionalPriceListId, 5.0);

            $model2 = $results[1];
            $this->assertEquals($model2->id, 10);
            $this->assertEquals($model2->itemId, 11);
            $this->assertEquals($model2->priceInclusive, 12.0);
            $this->assertEquals($model2->priceExclusive, 13.0);
            $this->assertEquals($model2->additionalPriceListId, 14.0);

            $this->assertCount(5, json_decode($model1->toJson(), true));
            $this->assertCount(5, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AdditionalItemPrice::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->itemId, 2);
            $this->assertEquals($model->priceInclusive, 3.0);
            $this->assertEquals($model->priceExclusive, 4.0);
            $this->assertEquals($model->additionalPriceListId, 5.0);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(AdditionalItemPrice::class, 1, true);
    }

    public function testDeleteFails()
    {
        $this->verifyDelete(AdditionalItemPrice::class, 1, false);
    }
    
    public function testSave()
    {
        $this->verifySave(AdditionalItemPrice::class, function ($model) {
            $model->id = 1;
            $model->itemId = 2;
            $model->priceInclusive = 3.0;
            $model->priceExclusive = 4.0;
            $model->additionalPriceListId = 5.0;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->itemId, 2);
            $this->assertEquals($savedModel->priceInclusive, 3.0);
            $this->assertEquals($savedModel->priceExclusive, 4.0);
            $this->assertEquals($savedModel->additionalPriceListId, 5.0);
        });
    }
}
