<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankAccountNote;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class BankAccountNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankAccountNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankAccountNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankAccountNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankAccountNote::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(BankAccountNote::class, 'entryDate');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(BankAccountNote::class, 'bankAccountId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(BankAccountNote::class, [
            'bankAccountId' => [
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
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(BankAccountNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testDelete()
    {
        $this->verifyDelete(BankAccountNote::class, 2, true);
    }

    public function testDeleteFails()
    {
        $this->verifyDelete(BankAccountNote::class, 2, false);
    }

    public function testInject()
    {
        $this->verifyInject(BankAccountNote::class, function ($model) {
            $this->assertEquals($model->bankAccountId, 1);
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

    public function testGetId()
    {
        $this->verifyGetId(BankAccountNote::class, 2, function ($model) {
            $this->assertEquals($model->bankAccountId, 1);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->subject, "sample string 3");
            $this->assertEquals($model->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model->status);
            $this->assertEquals($model->note, "sample string 4");
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(BankAccountNote::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(BankAccountNote::class, $results[0]);
            $this->assertInstanceOf(BankAccountNote::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->bankAccountId, 1);
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->subject, "sample string 3");
            $this->assertEquals($model1->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model1->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model1->status);
            $this->assertEquals($model1->note, "sample string 4");
            $this->assertTrue($model1->hasAttachments);

            $model2 = $results[0];
            $this->assertEquals($model2->bankAccountId, 1);
            $this->assertEquals($model2->id, 2);
            $this->assertEquals($model2->subject, "sample string 3");
            $this->assertEquals($model2->entryDate->format('Y-m-d'), '2017-07-25');
            $this->assertEquals($model2->actionDate->format('Y-m-d'), '2017-07-25');
            $this->assertTrue($model2->status);
            $this->assertEquals($model2->note, "sample string 4");
            $this->assertTrue($model2->hasAttachments);
        });
    }

    public function testSave()
    {
        $this->verifySave(BankAccountNote::class, function ($model) {
            $model->bankAccountId = 1;
            $model->id = 2;
            $model->subject = 'sample string 3';
            $model->entryDate = "2017-07-25";
            $model->actionDate = "2017-07-25";
            $model->status = true;
            $model->note = "sample string 4";
            $model->hasAttachments = true;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->bankAccountId, 1);
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
