<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Exception\NotYetImplementedException;
use DarrynTen\SageOne\Models\AnalysisType;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class AnalysisTypeModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AnalysisType::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AnalysisType::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AnalysisType::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AnalysisType::class, 'id');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AnalysisType::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'analysisCategories' => [
                'type' => 'AnalysisCategory',
                'collection' => true,
                'nullable' => false,
                'readonly' => false,
            ],
            'active' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AnalysisType::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AnalysisType::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(5, $results[1]->id);
            $this->assertEquals('sample string 2', $results[0]->description);
            $this->assertEquals('sample string 8', $results[1]->description);
            $this->assertEquals(2, count($results[0]->analysisCategories->results));
            $this->assertEquals(1, $results[0]->analysisCategories->results[0]->id);
            $this->assertEquals(2, $results[0]->analysisCategories->results[0]->analysisTypeId);
            $this->assertEquals('sample string 3', $results[0]->analysisCategories->results[0]->description);
            $this->assertEquals(6, $results[0]->analysisCategories->results[1]->id);
            $this->assertEquals(1, $results[0]->analysisCategories->results[1]->analysisTypeId);
            $this->assertEquals('sample string 4', $results[0]->analysisCategories->results[1]->description);
            $this->assertEquals(true, $results[0]->active);
            $this->assertEquals(2, count($results[1]->analysisCategories->results));
            $this->assertEquals(3, $results[1]->analysisCategories->results[0]->id);
            $this->assertEquals(7, $results[1]->analysisCategories->results[0]->analysisTypeId);
            $this->assertEquals('sample string 20', $results[1]->analysisCategories->results[0]->description);
            $this->assertEquals(11, $results[1]->analysisCategories->results[1]->id);
            $this->assertEquals(21, $results[1]->analysisCategories->results[1]->analysisTypeId);
            $this->assertEquals('sample string 30', $results[1]->analysisCategories->results[1]->description);
            $this->assertEquals(false, $results[1]->active);
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AnalysisType::class, 1, function ($model) {
            $this->assertEquals(1, $model->id);
            $this->assertEquals('sample string 2', $model->description);
            $this->assertEquals(1, $model->analysisCategories->results[0]->id);
            $this->assertEquals(2, $model->analysisCategories->results[0]->analysisTypeId);
            $this->assertEquals('sample string 3', $model->analysisCategories->results[0]->description);
            $this->assertEquals(3, $model->analysisCategories->results[1]->id);
            $this->assertEquals(1, $model->analysisCategories->results[1]->analysisTypeId);
            $this->assertEquals('sample string 8', $model->analysisCategories->results[1]->description);
            $this->assertTrue($model->active);
        });
    }

    public function testSave()
    {
        $this->verifySave(AnalysisType::class, function ($model) {
            $model->id = 1;
            $model->description = "sample string 2";
            $model->active = true;
        }, function ($savedModel) {
            $this->assertEquals(1, $savedModel->id);
            $this->assertEquals('sample string 2', $savedModel->description);
            $this->assertEquals(1, $savedModel->analysisCategories->results[0]->id);
            $this->assertEquals(2, $savedModel->analysisCategories->results[0]->analysisTypeId);
            $this->assertEquals('sample string 3', $savedModel->analysisCategories->results[0]->description);
            $this->assertEquals(5, $savedModel->analysisCategories->results[1]->id);
            $this->assertEquals(3, $savedModel->analysisCategories->results[1]->analysisTypeId);
            $this->assertEquals('sample string 1', $savedModel->analysisCategories->results[1]->description);
            $this->assertEquals(true, $savedModel->active);
        });
    }

    public function testSaveBatch()
    {
        $model = $this->setUpRequestMock(
            'POST',
            AnalysisType::class,
            'AnalysisType/SaveBatch',
            'AnalysisType/POST_AnalysisType_SaveBatch_RESP.json',
            'AnalysisType/POST_AnalysisType_SaveBatch_REQ.json'
        );
        $modelData = json_decode(file_get_contents(__DIR__ . '/../../mocks/AnalysisType/POST_AnalysisType_SaveBatch_REQ.json'));
        $model->loadResult($modelData[0]);
        $this->expectException(NotYetImplementedException::class);
        $this->expectExceptionMessage("Error, \"\DarrynTen\SageOne\Models\AnalysisType::saveBatch\" Method not yet implemented. This still needs to be added, please consider contributing to the project.");
        $this->expectExceptionCode(10301);
        $model->SaveBatch();
    }
}
