<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountantTaskRecurrence;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

class AccountantTaskRecurrenceModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AccountantTaskRecurrence::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AccountantTaskRecurrence::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AccountantTaskRecurrence::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AccountantTaskRecurrence::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(AccountantTaskRecurrence::class, 'numberOfOccurrences');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AccountantTaskRecurrence::class, 'companyId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AccountantTaskRecurrence::class, [
            'companyId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'frequencyType' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'frequencyInterval' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'frequencyRelativeInterval' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'frequencyRecurrenceFactor' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'frequencyYearlyMonth' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'recurrenceRangeType' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'startDate' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'endDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'numberOfOccurrences' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'taskDuration' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AccountantTaskRecurrence::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => false
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(AccountantTaskRecurrence::class, function ($model) {
            $this->assertEquals($model->companyId, 1);
            $this->assertEquals($model->frequencyType, 2);
            $this->assertEquals($model->frequencyInterval, 3);
            $this->assertEquals($model->frequencyRelativeInterval, 4);
            $this->assertEquals($model->frequencyRecurrenceFactor, 5);
            $this->assertEquals($model->frequencyYearlyMonth, 6);
            $this->assertEquals($model->recurrenceRangeType, 7);
            $this->assertEquals($model->startDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model->endDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model->numberOfOccurrences, 1);
            $this->assertEquals($model->taskDuration, 9);
            $this->assertEquals($model->id, 10);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(12, $objArray);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AccountantTaskRecurrence::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(AccountantTaskRecurrence::class, $results[0]);
            $this->assertInstanceOf(AccountantTaskRecurrence::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->companyId, 1);
            $this->assertEquals($model1->frequencyType, 2);
            $this->assertEquals($model1->frequencyInterval, 3);
            $this->assertEquals($model1->frequencyRelativeInterval, 4);
            $this->assertEquals($model1->frequencyRecurrenceFactor, 5);
            $this->assertEquals($model1->frequencyYearlyMonth, 6);
            $this->assertEquals($model1->recurrenceRangeType, 7);
            $this->assertEquals($model1->startDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model1->endDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model1->numberOfOccurrences, 1);
            $this->assertEquals($model1->taskDuration, 9);
            $this->assertEquals($model1->id, 10);

            $model2 = $results[1];
            $this->assertEquals($model2->companyId, 1);
            $this->assertEquals($model2->frequencyType, 2);
            $this->assertEquals($model2->frequencyInterval, 3);
            $this->assertEquals($model2->frequencyRelativeInterval, 4);
            $this->assertEquals($model2->frequencyRecurrenceFactor, 5);
            $this->assertEquals($model2->frequencyYearlyMonth, 6);
            $this->assertEquals($model2->recurrenceRangeType, 7);
            $this->assertEquals($model2->startDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model2->endDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model2->numberOfOccurrences, 1);
            $this->assertEquals($model2->taskDuration, 9);
            $this->assertEquals($model2->id, 11);

            $this->assertCount(12, json_decode($model1->toJson(), true));
            $this->assertCount(12, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AccountantTaskRecurrence::class, 10, function ($model) {
            $this->assertEquals($model->companyId, 1);
            $this->assertEquals($model->frequencyType, 2);
            $this->assertEquals($model->frequencyInterval, 3);
            $this->assertEquals($model->frequencyRelativeInterval, 4);
            $this->assertEquals($model->frequencyRecurrenceFactor, 5);
            $this->assertEquals($model->frequencyYearlyMonth, 6);
            $this->assertEquals($model->recurrenceRangeType, 7);
            $this->assertEquals($model->startDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model->endDate->format('Y-m-d'), "2017-07-24");
            $this->assertEquals($model->numberOfOccurrences, 1);
            $this->assertEquals($model->taskDuration, 9);
            $this->assertEquals($model->id, 10);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(AccountantTaskRecurrence::class, 10, true);
    }
    
    public function testDeleteFails()
    {
        $this->verifyDelete(AccountantTaskRecurrence::class, 10 ,false);
    }
}
