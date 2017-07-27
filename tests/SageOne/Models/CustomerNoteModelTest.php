<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\CustomerNote;

class CustomerNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(CustomerNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(CustomerNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(CustomerNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(CustomerNote::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(CustomerNote::class, 'customerId');
    }

    public function testNameLength()
    {
        $this->verifyBadStringLengthException(
            CustomerNote::class,
            'subject',
            0,
            100,
            str_repeat('x', 101)
        );
    }

    public function testAttributes()
    {
        $this->verifyAttributes(CustomerNote::class, [
            'customerId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'customerName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'notePriority' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'noteType' => [
                'type' => 'integer',
                'nullable' => true,
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
                'nullable' =>  true,
                'readonly' => false,
            ],
            'note' => [
                'type' => 'string',
                'nullable' =>  false,
                'readonly' => false,
            ],
            'hasAttachments' => [
                'type' => 'boolean',
                'nullable' =>  true,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(CustomerNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(CustomerNote::class, function ($results) {
            $this->assertCount(2, $results);

            $model1 = $results[0];
            $model2 = $results[1];
            $this->assertInstanceOf(CustomerNote::class, $model1);
            $this->assertInstanceOf(CustomerNote::class, $model2);
            $this->assertCount(15, json_decode($model1->toJson(), true));
            $this->assertCount(15, json_decode($model2->toJson(), true));

            $this->assertEquals(1, $model1->customerId);
            $this->assertEquals('sample string 2', $model1->customerName);
            $this->assertEquals(1, $model1->notePriority);
            $this->assertEquals(1, $model1->noteType);
            $this->assertEquals(1, $model1->userId);
            $this->assertEquals(1, $model1->priority);
            $this->assertEquals(1, $model1->noteCategoryId);
            $this->assertTrue($model1->notifyAssignee);
            $this->assertEquals(3, $model1->id);
            $this->assertEquals('sample string 4', $model1->subject);
            $this->assertEquals('2017-07-27', $model1->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-27', $model1->actionDate->format('Y-m-d'));
            $this->assertTrue($model1->status);
            $this->assertEquals('sample string 5', $model1->note);
            $this->assertTrue($model1->hasAttachments);

            $this->assertEquals(10, $model2->customerId);
            $this->assertEquals('sample string 11', $model2->customerName);
            $this->assertEquals(12, $model2->notePriority);
            $this->assertEquals(13, $model2->noteType);
            $this->assertEquals(14, $model2->userId);
            $this->assertEquals(15, $model2->priority);
            $this->assertEquals(16, $model2->noteCategoryId);
            $this->assertTrue($model2->notifyAssignee);
            $this->assertEquals(17, $model2->id);
            $this->assertEquals('sample string 18', $model2->subject);
            $this->assertEquals('2017-07-27', $model2->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-27', $model2->actionDate->format('Y-m-d'));
            $this->assertTrue($model2->status);
            $this->assertEquals('sample string 19', $model2->note);
            $this->assertTrue($model2->hasAttachments);


        });
    }

    public function testGetId()
    {
        $this->verifyGetId(CustomerNote::class, 36, function ($model) {
            $this->assertInstanceOf(CustomerNote::class, $model);
            $this->assertCount(15, json_decode($model->toJson(), true));

            $this->assertEquals(1, $model->customerId);
            $this->assertEquals('sample string 2', $model->customerName);
            $this->assertEquals(1, $model->notePriority);
            $this->assertEquals(1, $model->noteType);
            $this->assertEquals(1, $model->userId);
            $this->assertEquals(1, $model->priority);
            $this->assertEquals(1, $model->noteCategoryId);
            $this->assertTrue($model->notifyAssignee);
            $this->assertEquals(3, $model->id);
            $this->assertEquals('sample string 4', $model->subject);
            $this->assertEquals('2017-07-27', $model->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-27', $model->actionDate->format('Y-m-d'));
            $this->assertTrue($model->status);
            $this->assertEquals('sample string 5', $model->note);
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testSave()
    {
        $this->verifySave(CustomerNote::class, function ($model) {
            $model->customerId = 1;
            $model->customerName = 'sample string 2';
            $model->notePriority = 1;
            $model->noteType = 1;
            $model->userId = 1;
            $model->priority = 1;
            $model->noteCategoryId = 1;
            $model->notifyAssignee = true;
            $model->id = 3;
            $model->subject = 'sample string 4';
            $model->entryDate = '2017-07-27';
            $model->actionDate = '2017-07-27';
            $model->status = true;
            $model->note = 'sample string 5';
            $model->hasAttachments = true;
        }, function ($savedModel) {
            $this->assertEquals(1, $savedModel->customerId);
            $this->assertEquals('sample string 2', $savedModel->customerName);
            $this->assertEquals(1, $savedModel->notePriority);
            $this->assertEquals(1, $savedModel->noteType);
            $this->assertEquals(1, $savedModel->userId);
            $this->assertEquals(1, $savedModel->priority);
            $this->assertEquals(1, $savedModel->noteCategoryId);
            $this->assertTrue($savedModel->notifyAssignee);
            $this->assertEquals(3, $savedModel->id);
            $this->assertEquals('sample string 4', $savedModel->subject);
            $this->assertEquals('2017-07-27', $savedModel->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-27', $savedModel->actionDate->format('Y-m-d'));
            $this->assertTrue($savedModel->status);
            $this->assertEquals('sample string 5', $savedModel->note);
            $this->assertTrue($savedModel->hasAttachments);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(CustomerNote::class, 3, true);
    }
}
