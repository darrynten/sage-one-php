<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\ItemNote;

class ItemNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(ItemNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(ItemNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(ItemNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(ItemNote::class, 'itemId');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(ItemNote::class, 'userId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(ItemNote::class, 'itemId');
    }

    public function testNameLength()
    {
        $this->verifyBadStringLengthException(
            ItemNote::class,
            'subject',
            0,
            100,
            str_repeat('x', 101)
        );
    }

    public function testAttributes()
    {
        $this->verifyAttributes(ItemNote::class, [
            'itemId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'userId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'priority' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'noteCategoryId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'notifyAssignee' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
            ],
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'subject' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
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
        $this->verifyInject(ItemNote::class, function ($model) {
            $this->assertEquals($model->itemId, 1);
            $this->assertEquals($model->userId, 1);
            $this->assertEquals($model->priority, 1);
            $this->assertEquals($model->noteCategoryId, 1);
            $this->assertTrue($model->notifyAssignee);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->subject, 'sample string 3');
            $this->assertEquals($model->entryDate->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->actionDate->Format('Y-m-d'), '2017-07-28');
            $this->assertTrue($model->status);
            $this->assertEquals($model->note, 'sample string 4');
            $this->assertTrue($model->hasAttachments);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(12, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(ItemNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(ItemNote::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(ItemNote::class, $results[0]);
            $this->assertInstanceOf(ItemNote::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->itemId, 1);
            $this->assertEquals($model1->userId, 1);
            $this->assertEquals($model1->priority, 1);
            $this->assertEquals($model1->noteCategoryId, 1);
            $this->assertTrue($model1->notifyAssignee);
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->subject, 'sample string 3');
            $this->assertEquals($model1->entryDate->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model1->actionDate->Format('Y-m-d'), '2017-07-28');
            $this->assertTrue($model1->status);
            $this->assertEquals($model1->note, 'sample string 4');
            $this->assertTrue($model1->hasAttachments);

            $model2 = $results[1];
            $this->assertEquals($model2->itemId, 11);
            $this->assertEquals($model2->userId, 11);
            $this->assertEquals($model2->priority, 11);
            $this->assertEquals($model2->noteCategoryId, 11);
            $this->assertTrue($model2->notifyAssignee);
            $this->assertEquals($model2->id, 12);
            $this->assertEquals($model2->subject, 'sample string 13');
            $this->assertEquals($model2->entryDate->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model2->actionDate->Format('Y-m-d'), '2017-07-28');
            $this->assertTrue($model2->status);
            $this->assertEquals($model2->note, 'sample string 14');
            $this->assertTrue($model2->hasAttachments);

            $this->assertCount(12, json_decode($model1->toJson(), true));
            $this->assertCount(12, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(ItemNote::class, 2, function ($model) {
            $this->assertEquals($model->itemId, 1);
            $this->assertEquals($model->userId, 1);
            $this->assertEquals($model->priority, 1);
            $this->assertEquals($model->noteCategoryId, 1);
            $this->assertTrue($model->notifyAssignee);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->subject, 'sample string 3');
            $this->assertEquals($model->entryDate->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($model->actionDate->Format('Y-m-d'), '2017-07-28');
            $this->assertTrue($model->status);
            $this->assertEquals($model->note, 'sample string 4');
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(ItemNote::class, 2, true);
    }

    public function testSave()
    {
        $this->verifySave(ItemNote::class, function ($model) {
            $model->itemId = 1;
            $model->priority = 1;
            $model->noteCategoryId = 1;
            $model->notifyAssignee = true;
            $model->id = 2;
            $model->subject = 'sample string 3';
            $model->entryDate = '2017-07-28';
            $model->actionDate = '2017-07-28';
            $model->status = true;
            $model->note = 'sample string 4';
            $model->hasAttachments = true;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->itemId, 1);
            $this->assertEquals($savedModel->userId, 1);
            $this->assertEquals($savedModel->priority, 1);
            $this->assertEquals($savedModel->noteCategoryId, 1);
            $this->assertTrue($savedModel->notifyAssignee);
            $this->assertEquals($savedModel->id, 2);
            $this->assertEquals($savedModel->subject, 'sample string 3');
            $this->assertEquals($savedModel->entryDate->Format('Y-m-d'), '2017-07-28');
            $this->assertEquals($savedModel->actionDate->Format('Y-m-d'), '2017-07-28');
            $this->assertTrue($savedModel->status);
            $this->assertEquals($savedModel->note, 'sample string 4');
            $this->assertTrue($savedModel->hasAttachments);
        });
    }
}
