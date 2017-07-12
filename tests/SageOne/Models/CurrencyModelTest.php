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
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'code' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'symbol' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
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
        $this->verifyGetAll(Currency::class, function ($results) {
            $this->assertEquals(2, count($results));

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals('code 1', $results[0]->code);
            $this->assertEquals('description 1', $results[0]->description);
            $this->assertEquals('symbol 1', $results[0]->symbol);

            $this->assertEquals(2, $results[1]->id);
            $this->assertEquals('code 2', $results[1]->code);
            $this->assertEquals('description 2', $results[1]->description);
            $this->assertEquals('symbol 2', $results[1]->symbol);

            $this->assertCount(4, json_decode($results[0]->toJson(), true));
            $this->assertCount(4, json_decode($results[1]->toJson(), true));
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
