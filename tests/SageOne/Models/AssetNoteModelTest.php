<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AssetNote;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class AssetNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AssetNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AssetNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AssetNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AssetNote::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(AssetNote::class, 'entryDate');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AssetNote::class, 'assetId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AssetNote::class, [
            'assetId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'subject' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
                'min' => 0,
                'max' => 100,
            ],
            'entryDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'actionDate' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'status' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
            ],
            'note' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'hasAttachments' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(AssetNote::class, function ($model) {
            $this->assertEquals($model->assetId, 1);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->subject, "sample string 3");
            $this->assertEquals($model->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model->status);
            $this->assertEquals($model->note, "sample string 4");
            $this->assertTrue($model->hasAttachments);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(8, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AssetNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AssetNote::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(AssetNote::class, $results[0]);
            $this->assertInstanceOf(AssetNote::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->assetId, 1);
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->subject, "sample string 3");
            $this->assertEquals($model1->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model1->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model1->status);
            $this->assertEquals($model1->note, "sample string 4");
            $this->assertTrue($model1->hasAttachments);

            $model2 = $results[1];
            $this->assertEquals($model2->assetId, 2);
            $this->assertEquals($model2->id, 2);
            $this->assertEquals($model2->subject, "sample string 3");
            $this->assertEquals($model2->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model2->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model2->status);
            $this->assertEquals($model2->note, "sample string 4");
            $this->assertTrue($model2->hasAttachments);

            $this->assertCount(8, json_decode($model1->toJson(), true));
            $this->assertCount(8, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AssetNote::class, 33, function ($model) {
            $this->assertEquals($model->assetId, 1);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->subject, "sample string 3");
            $this->assertEquals($model->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model->status);
            $this->assertEquals($model->note, "sample string 4");
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(AssetNote::class, 2, function () {
            // TODO do actual checks
        });
    }

    public function testSave()
    {
        $this->verifySave(AssetNote::class, function ($model) {
            $model->assetId = 1;
            $model->id = 2;
            $model->subject = "sample string 3";
            $model->entryDate = "2017-07-25";
            $model->actionDate = "2017-07-25";
            $model->status = true;
            $model->note = "sample string 4";
            $model->hasAttachments = true;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->assetId, 1);
            $this->assertEquals($savedModel->id, 2);
            $this->assertEquals($savedModel->subject, "sample string 3");
            $this->assertEquals($savedModel->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($savedModel->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($savedModel->status);
            $this->assertEquals($savedModel->note, "sample string 4");
            $this->assertTrue($savedModel->hasAttachments);
        });
    }
}
