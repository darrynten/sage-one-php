<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AnalysisCategory;

class AnalysisCategoryModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AnalysisCategory::class, 'id');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AnalysisCategory::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'analysisTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
        ]);
    }

    public function testDescriptionLength()
    {
        $this->verifyBadStringLengthException(
            AnalysisCategory::class,
            'description',
            0,
            100,
            str_repeat('x', 101)
        );
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AnalysisCategory::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AnalysisCategory::class, function ($results) {
            $this->assertCount(2, $results);
            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(5, $results[1]->id);
            $this->assertEquals(2, $results[0]->analysisTypeId);
            $this->assertEquals(1, $results[1]->analysisTypeId);
            $this->assertEquals('sample string 3', $results[0]->description);
            $this->assertEquals('sample string 7', $results[1]->description);
            
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(AnalysisCategory::class, 1, function ($model) {
            $this->assertInstanceOf(AnalysisCategory::class, $model);
            $this->assertEquals(1, $model->id);
            $this->assertEquals(2, $model->analysisTypeId);
            $this->assertEquals('sample string 3', $model->description);
        });
    }

    public function testSave()
    {
        $this->verifySave(AnalysisCategory::class, function ($model) {
            $model->id = 1;
            $model->analysisTypeId = 2;
            $model->description = 'sample string 3';
        }, function ($savedModel) {
            $this->assertInstanceOf(AnalysisCategory::class, $savedModel);
            $this->assertEquals(1, $savedModel->id);
            $this->assertEquals(2, $savedModel->analysisTypeId);
            $this->assertEquals('sample string 3', $savedModel->description);
        });
    }

    public function testAllowDelete()
    {
        $model = $this->setUpRequestMock(
            'POST',
            AnalysisCategory::class,
            'AnalysisCategory/AllowDelete',
            'AnalysisCategory/POST_AnalysisCategory_AllowDelete_RESP.json',
            'AnalysisCategory/POST_AnalysisCategory_AllowDelete_REQ.json'
        );
        $this->assertEquals(true, $model->allowDelete());
    }
}