<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\DocumentMessage;

class DocumentMessageModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(DocumentMessage::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(DocumentMessage::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(DocumentMessage::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(DocumentMessage::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(DocumentMessage::class, 'documentTypeId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(DocumentMessage::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'documentTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'message' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(DocumentMessage::class, function ($model) {
            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(3, $objArray);

            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->documentTypeId, 2);
            $this->assertEquals($model->message, 'sample string 3');
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(DocumentMessage::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(DocumentMessage::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(DocumentMessage::class, $results[0]);
            $this->assertInstanceOf(DocumentMessage::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->documentTypeId, 2);
            $this->assertEquals($model1->message, 'sample string 3');

            $model2 = $results[1];
            $this->assertEquals($model2->id, 11);
            $this->assertEquals($model2->documentTypeId, 12);
            $this->assertEquals($model2->message, 'sample string 13');

            $this->assertCount(3, json_decode($model1->toJson(), true));
            $this->assertCount(3, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(DocumentMessage::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->documentTypeId, 2);
            $this->assertEquals($model->message, 'sample string 3');
        });
    }


    public function testSave()
    {
        $this->verifySave(DocumentMessage::class, function ($model) {
            $model->id = 1;
            $model->documentTypeId = 2;
            $model->message = 'sample string 3';
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->documentTypeId, 2);
            $this->assertEquals($savedModel->message, 'sample string 3');
        });
    }
}
