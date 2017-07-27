<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\DateFormat;

class DateFormatModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(DateFormat::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(DateFormat::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(DateFormat::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(DateFormat::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(DateFormat::class, 'displayAs');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(DateFormat::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'displayAs' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'dotNetFormat' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'dotNetAltFormats' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'JSFormat' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'JSAltFormats' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(DateFormat::class, function ($model) {

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(6, $objArray);

            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->displayAs, 'sample string 2');
            $this->assertEquals($model->dotNetFormat, 'sample string 3');
            $this->assertEquals($model->dotNetAltFormats, 'sample string 4');
            $this->assertEquals($model->JSFormat, 'sample string 5');
            $this->assertEquals($model->JSAltFormats, 'sample string 6');
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(DateFormat::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(DateFormat::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(DateFormat::class, $results[0]);
            $this->assertInstanceOf(DateFormat::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->displayAs, 'sample string 2');
            $this->assertEquals($model1->dotNetFormat, 'sample string 3');
            $this->assertEquals($model1->dotNetAltFormats, 'sample string 4');
            $this->assertEquals($model1->JSFormat, 'sample string 5');
            $this->assertEquals($model1->JSAltFormats, 'sample string 6');

            $model2 = $results[1];
            $this->assertEquals($model2->id, 11);
            $this->assertEquals($model2->displayAs, 'sample string 12');
            $this->assertEquals($model2->dotNetFormat, 'sample string 13');
            $this->assertEquals($model2->dotNetAltFormats, 'sample string 14');
            $this->assertEquals($model2->JSFormat, 'sample string 15');
            $this->assertEquals($model2->JSAltFormats, 'sample string 16');

            $this->assertCount(6, json_decode($model1->toJson(), true));
            $this->assertCount(6, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(DateFormat::class, 6, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->displayAs, 'sample string 2');
            $this->assertEquals($model->dotNetFormat, 'sample string 3');
            $this->assertEquals($model->dotNetAltFormats, 'sample string 4');
            $this->assertEquals($model->JSFormat, 'sample string 5');
            $this->assertEquals($model->JSAltFormats, 'sample string 6');
        });
    }
}
