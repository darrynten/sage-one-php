<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AdditionalPriceList;
use DarrynTen\SageOne\Models\ModelCollection;

class AdditionalPriceListModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AdditionalPriceList::class, 'description');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AdditionalPriceList::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'isDefault' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testDescriptionLength()
    {
        $this->verifyBadStringLengthException(
            AdditionalPriceList::class,
            'description',
            0,
            100,
            str_repeat('x', 101)
        );
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AdditionalPriceList::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AdditionalPriceList::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals('sample string 2', $results[0]->description);
            $this->assertEquals(true, $results[0]->isDefault);

            $this->assertEquals(1, $results[1]->id);
            $this->assertEquals('sample string 2', $results[1]->description);
            $this->assertEquals(true, $results[1]->isDefault);

            $this->assertCount(3, json_decode($results[0]->toJson(), true));
            $this->assertCount(3, json_decode($results[1]->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AdditionalPriceList::class, 1, function ($model) {
            $this->assertInstanceOf(AdditionalPriceList::class, $model);
            $this->assertEquals(1, $model->id);
            $this->assertEquals('sample string 2', $model->description);
            $this->assertEquals(true, $model->isDefault);
            $this->assertCount(3, json_decode($model->toJson(), true));
        });
    }

    public function testSave()
    {
        $this->verifySave(AdditionalPriceList::class, function ($model) {
            $model->description = 'sample string 2';
            $model->isDefault = true;
        }, function ($savedModel) {
            $this->assertInstanceOf(AdditionalPriceList::class, $savedModel);
            $this->assertEquals('sample string 2', $savedModel->description);
            $this->assertEquals(true, $savedModel->isDefault);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(AdditionalPriceList::class, 1, function ($response) {
            // TODO actual checks
        });
    }

    public function testAllowDelete()
    {
        $model = $this->setUpRequestMock(
            'POST',
            AdditionalPriceList::class,
            'AllowDelete',
            'AdditionalPriceList/POST_AdditionalPriceList_AllowDelete_RESP.json',
            'AdditionalPriceList/POST_AdditionalPriceList_AllowDelete_REQ.json'
        );

        $this->assertEquals(true, $model->allowDelete());
    }

    public function testGetListsById()
    {
        $model = $this->setUpRequestMock(
            'POST',
            AdditionalPriceList::class,
            'Get',
            'AdditionalPriceList/POST_AdditionalPriceList_Get_RESP.json',
            'AdditionalPriceList/POST_AdditionalPriceList_Get_REQ.json'
        );

        /**
         * TODO https://accounting.sageone.co.za/api/1.1.2/Help/Api/POST-AdditionalPriceList-Get
         * It shows that ID in results is 1
         * I guess it is wrong, need to check
         */
        $response = $model->getListsById([1, 2]);
        $this->assertInstanceOf(ModelCollection::class, $response);

        $this->assertEquals(1, $response->results[0]->id);
        $this->assertEquals('sample string 2', $response->results[0]->description);
        $this->assertEquals(true, $response->results[0]->isDefault);

        $this->assertEquals(1, $response->results[1]->id);
        $this->assertEquals('sample string 2', $response->results[1]->description);
        $this->assertEquals(true, $response->results[1]->isDefault);
    }
}
