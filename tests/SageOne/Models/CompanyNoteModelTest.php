<?php


namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\CompanyNote;

class CompanyNoteModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(CompanyNote::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(CompanyNote::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(CompanyNote::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(CompanyNote::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(CompanyNote::class, 'entryDate');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(CompanyNote::class, [
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

    public function testFeatures()
    {
        $this->verifyFeatures(CompanyNote::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(CompanyNote::class, function ($model) {
            $this->assertEquals(1, $model->id);
            $this->assertEquals('sample string 2', $model->subject);
            $this->assertEquals('2017-07-25', $model->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-25', $model->actionDate->format('Y-m-d'));
            $this->assertTrue($model->status);
            $this->assertEquals('sample string 3', $model->note);
            $this->assertTrue($model->hasAttachments);
            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(7, $objArray);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(CompanyNote::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(CompanyNote::class, $results[0]);
            $this->assertInstanceOf(CompanyNote::class, $results[1]);

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals('sample string 2', $results[0]->subject);
            $this->assertEquals('2017-07-25', $results[0]->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-25', $results[0]->actionDate->format('Y-m-d'));
            $this->assertTrue($results[0]->status);
            $this->assertEquals('sample string 3', $results[0]->note);
            $this->assertTrue($results[0]->hasAttachments);

            $this->assertEquals(5, $results[1]->id);
            $this->assertEquals('sample string', $results[1]->subject);
            $this->assertEquals('2017-07-24', $results[1]->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-29', $results[1]->actionDate->format('Y-m-d'));
            $this->assertEquals(false, $results[1]->status);
            $this->assertEquals('sample string 55', $results[1]->note);
            $this->assertEquals(false, $results[1]->hasAttachments);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(CompanyNote::class, 1, function ($model) {
            $this->assertEquals(1, $model->id);
            $this->assertEquals('sample string 2', $model->subject);
            $this->assertEquals('2017-07-25', $model->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-25', $model->actionDate->format('Y-m-d'));
            $this->assertTrue($model->status);
            $this->assertEquals('sample string 3', $model->note);
            $this->assertTrue($model->hasAttachments);
        });
    }

    public function testSave()
    {
        $this->verifySave(CompanyNote::class, function ($model) {
            $model->id = 1;
            $model->subject = 'sample string 2';
            $model->entryDate = '2017-07-25';
            $model->actionDate = '2017-07-25';
            $model->status = true;
            $model->note = 'sample string 3';
            $model->hasAttachments = true;
        }, function ($savedModel) {
            $this->assertEquals(1, $savedModel->id);
            $this->assertEquals('sample string 2', $savedModel->subject);
            $this->assertEquals('2017-07-25', $savedModel->entryDate->format('Y-m-d'));
            $this->assertEquals('2017-07-25', $savedModel->actionDate->format('Y-m-d'));
            $this->assertTrue($savedModel->status);
            $this->assertEquals('sample string 3', $savedModel->note);
            $this->assertTrue($savedModel->hasAttachments);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(CompanyNote::class, 1, function () {
            // TODO do actual checks
        });
    }

    public function testGetCompanyNotes()
    {
        $model1 = $this->setUpRequestMock('GET', CompanyNote::class, 'CompanyNote/GetCompanyNotes/1', 'CompanyNote/GET_CompanyNote_GetCompanyNotes_1.json');
        $allModels = $model1->getCompanyNotes(1);
        $this->assertEquals(2, $allModels->returnedResults);
        $model1 = $allModels->results[0];
        $model2 = $allModels->results[1];

        $this->assertInstanceOf(CompanyNote::class, $model1);
        $this->assertInstanceOf(CompanyNote::class, $model2);

        $this->assertEquals(1, $model1->id);
        $this->assertEquals('sample string 2', $model1->subject);
        $this->assertEquals('2017-07-25', $model1->entryDate->format('Y-m-d'));
        $this->assertEquals('2017-07-25', $model1->actionDate->format('Y-m-d'));
        $this->assertTrue($model1->status);
        $this->assertEquals('sample string 3', $model1->note);
        $this->assertTrue($model1->hasAttachments);

        $this->assertEquals(5, $model2->id);
        $this->assertEquals('sample string', $model2->subject);
        $this->assertEquals('2017-07-24', $model2->entryDate->format('Y-m-d'));
        $this->assertEquals('2017-07-29', $model2->actionDate->format('Y-m-d'));
        $this->assertEquals(false, $model2->status);
        $this->assertEquals('sample string 55', $model2->note);
        $this->assertEquals(false, $model2->hasAttachments);
    }
}
