<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountNote;
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
        $this->verifyBadImport(AccountNote::class, 'subject');
    }

    public function testInject()
    {
        $this->verifyInject(AccountNote::class, function ($model) {
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
                'optional' => true,
            ],
            'accountId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'optional' => true,
            ],
            'userId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
                'optional' => true,
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
                'optional' => true,
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
                'optional' => true,
            ],
            'note' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'optional' => true,
            ],
            'hasAttachments' => [
                'type' => 'boolean',
                'nullable' => true,
                'readonly' => false,
                'optional' => true,
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
        $this->verifyGetAll(AccountNote::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(1, $results[0]->accountId);
            $this->assertEquals(1, $results[0]->userId);
            $this->assertEquals(2, $results[0]->id);
            $this->assertEquals('sample string 3', $results[0]->subject);
            $this->assertEquals('2017-07-01', $results[0]->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-01', $results[0]->actionDate->format('Y-m-d'));
            $this->assertTrue($results[0]->status);
            $this->assertEquals('sample string 4', $results[0]->note);
            $this->assertTrue($results[0]->hasAttachments);
            $this->assertCount(9, json_decode($results[0]->toJson(), true));
            $this->assertCount(9, json_decode($results[1]->toJson(), true));
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
        $this->verifySave(AccountNote::class, function ($model) {
            $model->accountId = 1;
            $model->userId = 1;
            $model->subject = "sample string 3";
            $model->status = true;
        }, function ($savedModel) {
            $this->assertEquals(1, $savedModel->accountId);
            $this->assertEquals(1, $savedModel->userId);
            $this->assertEquals('sample string 3', $savedModel->subject);
            $this->assertEquals(true, $savedModel->status);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(AccountNote::class, 11, true);
    }

    public function testSaveReal()
    {
        $model = $this->setUpRequestMock(
            'POST',
            AccountNote::class,
            'AccountNote/Save',
            'AccountNote/POST_AccountNote_Save_RESP_real.json',
            'AccountNote/POST_AccountNote_Save_REQ_real.json'
        );

        $model->loadResult(
            json_decode(
                file_get_contents(__DIR__ . '/../../mocks/AccountNote/POST_AccountNote_Save_REQ_real.json')
            )
        );

        $response = $model->save();

        $newModel = new AccountNote($this->config);
        $newModel->loadResult($response);
        $this->assertEquals(0, $newModel->accountId);
        $this->assertEquals(3367, $newModel->id);
        $this->assertEquals('testing account note save', $newModel->subject);
        $this->assertEquals('2018-01-01', $newModel->actionDate->format('Y-m-d'));
    }

    public function testGetIdReal()
    {
        $model = $this->setUpRequestMock(
            'GET',
            AccountNote::class,
            'AccountNote/Get/3367',
            'AccountNote/GET_AccountNote_Get_xx_real.json'
        );

        $response = $model->get(3367);
        $this->assertEquals(0, $response->accountId);
        $this->assertEquals(3367, $response->id);
        $this->assertEquals('testing account note save', $response->subject);
        $this->assertEquals('2018-01-01', $response->actionDate->format('Y-m-d'));
    }

    public function testGetAllReal()
    {
        $model = $this->setUpRequestMock(
            'GET',
            AccountNote::class,
            'AccountNote/Get',
            'AccountNote/GET_AccountNote_Get_real.json'
        );

        $response = $model->all();
        $this->assertEquals(2, $response->totalResults);
        $this->assertCount(2, $response->results);

        $model1 = $response->results[0];
        $this->assertEquals(1, $model1->accountId);
        $this->assertEquals(3366, $model1->id);
        $this->assertEquals('testing account note save', $model1->subject);
        $this->assertEquals('2017-01-01', $model1->actionDate->format('Y-m-d'));
        $this->assertEquals('2017-01-01', $model1->entryDate->format('Y-m-d'));
        $this->assertEquals(true, $model1->status);
        $this->assertEquals('here note comes', $model1->note);
        $this->assertEquals(true, $model1->hasAttachments);

        $model2 = $response->results[1];
        $this->assertEquals(0, $model2->accountId);
        $this->assertEquals(3367, $model2->id);
        $this->assertEquals('testing account note save', $model2->subject);
        $this->assertEquals('2018-01-01', $model2->actionDate->format('Y-m-d'));
    }

    public function testNullableException()
    {
        $model = new AccountNote($this->config);

        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('fields');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue($model);
        $value['id']['optional'] = false;
        $reflectValue->setValue($model, $value);

        $obj = new \stdClass;
        $obj->Subject = 'test';
        $obj->ActionDate = '2018-01-01';

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "AccountNote" Defined key "id" not present in payload A property is missing in the loadResult payload');
        $this->expectExceptionCode(10112);

        $model->loadResult($obj);
    }
}
