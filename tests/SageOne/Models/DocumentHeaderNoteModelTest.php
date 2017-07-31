<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\DocumentHeaderNote;

class DocumentHeaderNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(DocumentHeaderNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(DocumentHeaderNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(DocumentHeaderNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(DocumentHeaderNote::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(DocumentHeaderNote::class, 'companyId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(DocumentHeaderNote::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'companyId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'documentHeaderId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'noteTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'userId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'username' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'actionDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'note' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'completed' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(DocumentHeaderNote::class, function ($model) {
            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(10, $objArray);

            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->companyId, 2);
            $this->assertEquals($model->documentHeaderId, 3);
            $this->assertEquals($model->noteTypeId, 4);
            $this->assertEquals($model->userId, 5);
            $this->assertEquals($model->username, 'sample string 6');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->actionDate->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->note, 'sample string 8');
            $this->assertTrue($model->completed);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(DocumentHeaderNote::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(DocumentHeaderNote::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(DocumentHeaderNote::class, $results[0]);
            $this->assertInstanceOf(DocumentHeaderNote::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->companyId, 2);
            $this->assertEquals($model1->documentHeaderId, 3);
            $this->assertEquals($model1->noteTypeId, 4);
            $this->assertEquals($model1->userId, 5);
            $this->assertEquals($model1->username, 'sample string 6');
            $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->actionDate->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->note, 'sample string 8');
            $this->assertTrue($model1->completed);

            $model2 = $results[1];
            $this->assertEquals($model2->id, 11);
            $this->assertEquals($model2->companyId, 12);
            $this->assertEquals($model2->documentHeaderId, 13);
            $this->assertEquals($model2->noteTypeId, 14);
            $this->assertEquals($model2->userId, 15);
            $this->assertEquals($model2->username, 'sample string 16');
            $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->actionDate->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->note, 'sample string 18');
            $this->assertTrue($model2->completed);

            $this->assertCount(10, json_decode($model1->toJson(), true));
            $this->assertCount(10, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(DocumentHeaderNote::class, 6, function ($model) {
            $model->id = 1;
            $model->companyId = 2;
            $model->documentHeaderId = 3;
            $model->noteTypeId = 4;
            $model->userId = 5;
            $model->username = 'sample string 6';
            $model->created = '2017-07-28';
            $model->actionDate = '2017-07-28';
            $model->note = 'sample string 8';
            $model->completed = true;
        });
    }

    public function testSave()
    {
        $this->verifySave(DocumentHeaderNote::class, function ($model) {
            $model->id = 33;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->companyId, 2);
            $this->assertEquals($savedModel->documentHeaderId, 3);
            $this->assertEquals($savedModel->noteTypeId, 4);
            $this->assertEquals($savedModel->userId, 5);
            $this->assertEquals($savedModel->username, 'sample string 6');
            $this->assertEquals($savedModel->created->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($savedModel->actionDate->format('Y-m-d'), '2017-07-28');
            $this->assertEquals($savedModel->note, 'sample string 8');
            $this->assertTrue($savedModel->completed);
        });
    }
}
