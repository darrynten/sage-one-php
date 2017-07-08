<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Currency;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class CurrencyModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(Currency::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(Currency::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(Currency::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(Currency::class, 'code');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(Currency::class, 'code');
    }

    public function testInject()
    {
        $this->verifyInject(Currency::class, function ($model, $data) {
            $this->assertEquals($model->id, 11);
            $this->assertEquals($model->code, 'code 11');
            $this->assertEquals($model->description, 'description 11');
            $this->assertEquals($model->symbol, 'symbol 11');

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(4, $objArray);
        });
    }

    public function testAttributes()
    {
        $this->verifyAttributes(Currency::class, [
            'id' => [
                'type' => 'integer', 'persistable' => true
            ],
            'code' => [
                'type' => 'string', 'persistable' => true
            ],
            'description' => [
                'type' => 'string', 'persistable' => true
            ],
            'symbol' => [
                'type' => 'string', 'persistable' => true
            ]
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(Currency::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(Currency::class, function ($results, $data) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(1, $results[0]['ID']);
            $this->assertEquals('code 1', $results[0]['Code']);
            $this->assertEquals('description 1', $results[0]['Description']);
            $this->assertEquals('symbol 1', $results[0]['Symbol']);
            $this->assertCount(4, $results[0]);
            $this->assertCount(4, $results[1]);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(Currency::class, 11, function ($model) {
            $this->assertEquals(11, $model->id);
            $this->assertEquals('code 11', $model->code);
            $this->assertEquals('description 11', $model->description);
            $this->assertEquals('symbol 11', $model->symbol);
        });
    }
}
