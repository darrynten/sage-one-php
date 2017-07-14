<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\CustomerCategory;

class CustomerCategoryModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(CustomerCategory::class, 'description');
    }

    public function testSetReadOnly()
    {
        $this->verifySetReadOnly(CustomerCategory::class, 'created');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(CustomerCategory::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
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
        $this->verifyFeatures(CustomerCategory::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(CustomerCategory::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertEquals(2, $results[0]->id);
            $this->assertEquals('sample string 1', $results[0]->description);
            $this->assertEquals('2017-07-14', $results[0]->created->format('Y-m-d'));
            $this->assertEquals('2017-07-14', $results[0]->modified->format('Y-m-d'));

            $this->assertEquals(2, $results[1]->id);
            $this->assertEquals('sample string 1', $results[1]->description);
            $this->assertEquals('2017-07-14', $results[1]->created->format('Y-m-d'));
            $this->assertEquals('2017-07-14', $results[1]->modified->format('Y-m-d'));

            $this->assertCount(4, json_decode($results[0]->toJson(), true));
            $this->assertCount(4, json_decode($results[1]->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(CustomerCategory::class, 2, function ($model) {
            $this->assertInstanceOf(CustomerCategory::class, $model);
            $this->assertEquals(2, $model->id);
            $this->assertEquals('sample string 1', $model->description);
            $this->assertEquals('2017-07-14', $model->created->format('Y-m-d'));
            $this->assertEquals('2017-07-14', $model->modified->format('Y-m-d'));

            $this->assertCount(4, json_decode($model->toJson(), true));
        });
    }

    public function testSave()
    {
        $this->verifySave(CustomerCategory::class, function ($model) {
            $model->description = 'sample string 1';
        }, function ($savedModel) {
            $this->assertInstanceOf(CustomerCategory::class, $savedModel);
            $this->assertEquals('sample string 1', $savedModel->description);

            $this->assertCount(4, json_decode($savedModel->toJson(), true));
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(CustomerCategory::class, 2, function ($response) {
            // TODO actual checks
        });
    }
}
