<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AssetLocation;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class AssetLocationModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AssetLocation::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AssetLocation::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AssetLocation::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AssetLocation::class, 'id');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AssetLocation::class, [
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
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AssetLocation::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AssetLocation::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals('sample string 2', $results[0]->description);
            $this->assertEquals(1, $results[0]->id);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AssetLocation::class, 2, function ($model) {
            $this->assertInstanceOf(AssetLocation::class, $model);
            $this->assertEquals('sample string 2', $model->description);
            $this->assertEquals(1, $model->id);
        });
    }

    public function testSave()
    {
        $this->verifySave(AssetLocation::class, function ($model) {
            $model->description = 'sample string 2';
            $model->id = 1;
        }, function ($savedModel) {
            $this->assertInstanceOf(AssetLocation::class, $savedModel);
            $this->assertEquals('sample string 2', $savedModel->description);
            $this->assertEquals(1, $savedModel->id);
        });
    }
}
