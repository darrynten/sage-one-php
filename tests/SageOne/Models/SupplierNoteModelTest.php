<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierNote;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class SupplierNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierNote::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(SupplierNote::class, 'priority');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierNote::class, [
            'supplierId' => [
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

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierNote::class, function ($results) {
            $this->assertEquals(2, count($results));            
            $this->assertEquals(1, $results[0]->supplierId);
            $this->assertEquals(5, $results[1]->supplierId);
            $this->assertEquals(1, $results[0]->userId);
            $this->assertEquals(4, $results[1]->userId);
            $this->assertEquals(1, $results[0]->priority);
            $this->assertEquals(3, $results[1]->priority);
            $this->assertEquals(1, $results[0]->noteCategoryId);
            $this->assertEquals(3, $results[1]->noteCategoryId);
            $this->assertTrue($results[0]->notifyAssignee);
            $this->assertEquals(false, $results[1]->notifyAssignee);
            $this->assertEquals(2, $results[0]->id);
            $this->assertEquals(8, $results[1]->id);
            $this->assertEquals('sample string 3', $results[0]->subject);
            $this->assertEquals('sample string 20', $results[1]->subject);
            $this->assertEquals('2017-07-18', $results[0]->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-14', $results[1]->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-18', $results[0]->actionDate->format('Y-m-d'));
            $this->assertEquals('2017-07-14', $results[1]->actionDate->format('Y-m-d'));
            $this->assertTrue($results[0]->status);
            $this->assertEquals(false, $results[1]->status);
            $this->assertEquals('sample string 4', $results[0]->note);
            $this->assertEquals('sample string 43', $results[1]->note);
            $this->assertTrue($results[0]->hasAttachments);
            $this->assertEquals(false, $results[1]->hasAttachments);
        }); 
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierNote::class, 2, function ($model) {
            $this->assertInstanceOf(SupplierNote::class, $model);            
            $this->assertEquals(1, $model->supplierId);
            $this->assertEquals(1, $model->userId);
            $this->assertEquals(1, $model->priority);
            $this->assertEquals(1, $model->noteCategoryId);
            $this->assertTrue($model->notifyAssignee);
            $this->assertEquals(2, $model->id);
            $this->assertEquals('sample string 3', $model->subject);
            $this->assertEquals('2017-07-18', $model->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-18', $model->actionDate->format('Y-m-d'));
            $this->assertTrue($model->status);
            $this->assertEquals('sample string 4', $model->note);
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testSave()
    {
        $this->verifySave(SupplierNote::class, function ($model) {
            $model->supplierId = 1;
            $model->userId = 1;
            $model->priority = 1;
            $model->noteCategoryId = 1;
            $model->notifyAssignee = true;
            $model->id = 2;
            $model->subject = 'sample string 3';
            $model->entryDate = '2017-07-18';
            $model->actionDate = '2017-07-18';
            $model->status = true;
            $model->note = 'sample string 4';
            $model->hasAttachments = true;
        }, function ($savedModel) {
            $this->assertInstanceOf(SupplierNote::class, $savedModel);
            $this->assertInstanceOf(SupplierNote::class, $savedModel);            
            $this->assertEquals(1, $savedModel->supplierId);
            $this->assertEquals(1, $savedModel->userId);
            $this->assertEquals(1, $savedModel->priority);
            $this->assertEquals(1, $savedModel->noteCategoryId);
            $this->assertTrue($savedModel->notifyAssignee);
            $this->assertEquals(2, $savedModel->id);
            $this->assertEquals('sample string 3', $savedModel->subject);
            $this->assertEquals('2017-07-18', $savedModel->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-18', $savedModel->actionDate->format('Y-m-d'));
            $this->assertTrue($savedModel->status);
            $this->assertEquals('sample string 4', $savedModel->note);
            $this->assertTrue($savedModel->hasAttachments);
        });
    }
}
