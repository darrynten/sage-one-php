<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountNote;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class AccountNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AccountNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AccountNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AccountNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AccountNote::class, 'accountId');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(AccountNote::class, 'userId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AccountNote::class, 'accountId');
    }

    public function testInject()
    {
        $this->verifyInject(AccountNote::class, function ($model, $data) {
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->userId, 1);
            $this->assertEquals($model->accountId, 1);
            $this->assertEquals($model->subject, 'sample string 3');
            $this->assertEquals($model->entryDate->format('Y-m-d'), '2017-07-01');
            $this->assertEquals($model->actionDate->format('Y-m-d'), '2017-07-01');
            $this->assertTrue($model->status);
            $this->assertEquals($model->note, 'sample string 4');
            $this->assertTrue($model->hasAttachments);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(9, $objArray);
        });
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AccountNote::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'accountId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'userId' => [
                'type' => 'integer',
                'nullable' => true,
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
            ]
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AccountNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AccountNote::class, function ($results, $data) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(1, $results[0]['AccountId']);
            $this->assertEquals(1, $results[0]['UserId']);
            $this->assertEquals(2, $results[0]['ID']);
            $this->assertEquals('sample string 3', $results[0]['Subject']);
            $this->assertEquals('2017-07-01', $results[0]['EntryDate']);
            $this->assertEquals('2017-07-01', $results[0]['ActionDate']);
            $this->assertTrue($results[0]['Status']);
            $this->assertEquals('sample string 4', $results[0]['Note']);
            $this->assertTrue($results[0]['HasAttachments']);
            $this->assertCount(9, $results[0]);
            $this->assertCount(9, $results[1]);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AccountNote::class, 2, function ($model) {
            $this->assertEquals(2, $model->id);
            $this->assertEquals(1, $model->accountId);
            $this->assertEquals(1, $model->userId);
            $this->assertEquals('sample string 3', $model->subject);
            $this->assertEquals('2017-07-01', $model->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-01', $model->actionDate->format('Y-m-d'));
            $this->assertTrue($model->status);
            $this->assertEquals('sample string 4', $model->note);
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testSave()
    {
        $this->verifySave(AccountNote::class, function ($response) {
            $this->assertEquals(2, $response->ID);
            // TODO Do actual checks
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(AccountNote::class, 11, function () {
            // TODO do actual checks
        });
    }
}
