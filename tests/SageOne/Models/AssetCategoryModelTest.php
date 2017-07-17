<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AssetCategory;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class AssetCategoryModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AssetCategory::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AssetCategory::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AssetCategory::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AssetCategory::class, 'id');
    }
    
    public function testAttributes()
    {
        $this->verifyAttributes(AssetCategory::class, [
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
            'modified' =>[
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => true,
            ],
            'created' =>[
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => true,
            ],
        ]);
    }
    public function testFeatures()
    {
        $this->verifyFeatures(AssetCategory::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AssetCategory::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals('sample string 1', $results[0]->description);
            $this->assertEquals(2, $results[0]->id);
            $this->assertEquals('2017-07-17', $results[0]->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $results[0]->created->format('Y-m-d'));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AssetCategory::class, 2, function ($model) {
            $this->assertInstanceOf(AssetCategory::class, $model);
            $this->assertEquals('sample string 1', $model->description);
            $this->assertEquals(2, $model->id);
            $this->assertEquals('2017-07-17', $model->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->created->format('Y-m-d'));
        });
    }

    public function testSave()
    {
        $this->verifySave(AssetCategory::class, function ($model) {
            $model->description = 'sample string 1';
            $model->id = 2;
        }, function ($savedModel) {
            $this->assertInstanceOf(AssetCategory::class, $savedModel);
            $this->assertEquals('sample string 1', $savedModel->description);
            $this->assertEquals(2, $savedModel->id);
        });
    }
}
