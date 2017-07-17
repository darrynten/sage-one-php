<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Asset;
use DarrynTen\SageOne\Models\AssetCategory;
use DarrynTen\SageOne\Models\AssetLocation;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class AssetModelTest extends BaseModelTest
{
	public function testInstanceOf()
    {
        $this->verifyInstanceOf(Asset::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(Asset::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(Asset::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(Asset::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(Asset::class, 'purchasePrice');
    }

   

    public function testAttributes()
    {
        $this->verifyAttributes(Asset::class, [
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
	        'category' => [
	            'type' => 'AssetCategory',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'location' => [
	            'type' => 'AssetLocation',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'datePurchased' => [
	            'type' => 'DateTime',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'serialNumber' => [
	            'type' => 'string',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'boughtFrom' => [
	            'type' => 'string',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'purchasePrice' => [
	            'type' => 'double',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'currentValue' => [
	            'type' => 'double',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'replacementValue' => [
	            'type' => 'double',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'textField1' => [
	            'type' => 'string',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'textField2' => [
	            'type' => 'string',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'textField3' => [
	            'type' => 'string',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'numericField1' => [
	            'type' => 'double',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'numericField2' => [
	            'type' => 'double',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'numericField3' => [
	            'type' => 'double',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'yesNoField1' => [
	            'type' => 'boolean',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'yesNoField2' => [
	            'type' => 'boolean',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'yesNoField3' => [
	            'type' => 'boolean',
	            'nullable' => false,
	            'readonly' => false,
	        ],
	        'dateField1' => [
	            'type' => 'DateTime',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'dateField2' => [
	            'type' => 'DateTime',
	            'nullable' => true,
	            'readonly' => false,
	        ],
	        'dateField3' => [
	            'type' => 'DateTime',
	            'nullable' => true,
	            'readonly' => false,
	        ],
        ]);
    }
    public function testFeatures()
    {
        $this->verifyFeatures(Asset::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(Asset::class, function ($results) {
            $this->assertEquals(2, count($results));
            $this->assertEquals("sample string 1", $results[0]->description);
            $this->assertInstanceOf(AssetCategory::class, $results[0]->category);
            $this->assertEquals("sample string 1", $results[0]->category->description);
            $this->assertEquals(2, $results[0]->category->id);
            $this->assertEquals('2017-07-17', $results[0]->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $results[0]->category->created->format('Y-m-d'));
            $this->assertInstanceOf(AssetLocation::class, $results[0]->location);
            $this->assertEquals(1, $results[0]->location->id);
            $this->assertEquals("sample string 2", $results[0]->location->description);
            $this->assertEquals('2017-07-17', $results[0]->datePurchased->format('Y-m-d'));
            $this->assertEquals("sample string 3", $results[0]->serialNumber);
            $this->assertEquals("sample string 4", $results[0]->boughtFrom);
            $this->assertEquals(1.0, $results[0]->purchasePrice);
            $this->assertEquals(1.0, $results[0]->currentValue);
            $this->assertEquals(1.0, $results[0]->replacementValue);
            $this->assertEquals("sample string 5", $results[0]->textField1);
            $this->assertEquals("sample string 6", $results[0]->textField2);
            $this->assertEquals("sample string 7", $results[0]->textField3);
            $this->assertEquals(1.0, $results[0]->numericField1);
            $this->assertEquals(1.0, $results[0]->numericField2);
            $this->assertEquals(1.0, $results[0]->numericField3);
            $this->assertTrue($results[0]->yesNoField1);
            $this->assertTrue($results[0]->yesNoField2);
            $this->assertTrue($results[0]->yesNoField3);
            $this->assertEquals('2017-07-17', $results[0]->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $results[0]->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $results[0]->dateField3->format('Y-m-d'));
            $this->assertEquals(11, $results[0]->id);
        });
    }
    public function testGetId(){
    	$this->verifyGetId(Asset::class, 2, function($model){
    		$this->assertInstanceOf(Asset::class, $model);
            $this->assertEquals("sample string 1", $model->description);
            $this->assertInstanceOf(AssetCategory::class, $model->category);
            $this->assertEquals("sample string 1", $model->category->description);
            $this->assertEquals(2, $model->category->id);
            $this->assertEquals('2017-07-17', $model->category->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->category->created->format('Y-m-d'));
            $this->assertInstanceOf(AssetLocation::class, $model->location);
            $this->assertEquals(1, $model->location->id);
            $this->assertEquals("sample string 2", $model->location->description);
            $this->assertEquals('2017-07-17', $model->datePurchased->format('Y-m-d'));
            $this->assertEquals("sample string 3", $model->serialNumber);
            $this->assertEquals("sample string 4", $model->boughtFrom);
            $this->assertEquals(1.0, $model->purchasePrice);
            $this->assertEquals(1.0, $model->currentValue);
            $this->assertEquals(1.0, $model->replacementValue);
            $this->assertEquals("sample string 5", $model->textField1);
            $this->assertEquals("sample string 6", $model->textField2);
            $this->assertEquals("sample string 7", $model->textField3);
            $this->assertEquals(1.0, $model->numericField1);
            $this->assertEquals(1.0, $model->numericField2);
            $this->assertEquals(1.0, $model->numericField3);
            $this->assertTrue($model->yesNoField1);
            $this->assertTrue($model->yesNoField2);
            $this->assertTrue($model->yesNoField3);
            $this->assertEquals('2017-07-17', $model->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $model->dateField3->format('Y-m-d'));
            $this->assertEquals(11, $model->id);    		
    	});
    }
    public function testSave(){
    	$this->verifySave(Asset::class, function($model){
    		$model->description = "sample string 1";
    		$model->category->description = "sample string 1";
    		$model->category->id = 2;
    		$model->location->id = 1;
    		$model->location->description = "sample string 2";
    		$model->datePurchased = "2017-07-17";
    		$model->serialNumber = "sample string 3";
    		$model->boughtFrom = "sample string 4";
    		$model->purchasePrice = 1.0;
    		$model->currentValue = 1.0;
    		$model->replacementValue = 1.0;
    		$model->textField1 = "sample string 5";
    		$model->textField2 = "sample string 6";
    		$model->textField3 = "sample string 7";
    		$model->numericField1 = 1.0;
    		$model->numericField2 = 1.0;
    		$model->numericField3 = 1.0;
    		$model->yesNoField1 = true;
    		$model->yesNoField2 = true;
    		$model->yesNoField3 = true;
    		$model->dateField1 = "2017-07-17";
    		$model->dateField2 = "2017-07-17";
    		$model->dateField3 = "2017-07-17";
    		$model->id = 11;
    	}, function($savedModel){
    		$this->assertInstanceOf(Asset::class, $savedModel);
            $this->assertEquals("sample string 1", $savedModel->description);
            $this->assertInstanceOf(AssetCategory::class, $savedModel->category);
            $this->assertEquals("sample string 1", $savedModel->category->description);
            $this->assertEquals(2, $savedModel->category->id);
            $this->assertInstanceOf(AssetLocation::class, $savedModel->location);
            $this->assertEquals(1, $savedModel->location->id);
            $this->assertEquals("sample string 2", $savedModel->location->description);
            $this->assertEquals('2017-07-17', $savedModel->datePurchased->format('Y-m-d'));
            $this->assertEquals("sample string 3", $savedModel->serialNumber);
            $this->assertEquals("sample string 4", $savedModel->boughtFrom);
            $this->assertEquals(1.0, $savedModel->purchasePrice);
            $this->assertEquals(1.0, $savedModel->currentValue);
            $this->assertEquals(1.0, $savedModel->replacementValue);
            $this->assertEquals("sample string 5", $savedModel->textField1);
            $this->assertEquals("sample string 6", $savedModel->textField2);
            $this->assertEquals("sample string 7", $savedModel->textField3);
            $this->assertEquals(1.0, $savedModel->numericField1);
            $this->assertEquals(1.0, $savedModel->numericField2);
            $this->assertEquals(1.0, $savedModel->numericField3);
            $this->assertTrue($savedModel->yesNoField1);
            $this->assertTrue($savedModel->yesNoField2);
            $this->assertTrue($savedModel->yesNoField3);
            $this->assertEquals('2017-07-17', $savedModel->dateField1->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->dateField2->format('Y-m-d'));
            $this->assertEquals('2017-07-17', $savedModel->dateField3->format('Y-m-d'));
            $this->assertEquals(11, $savedModel->id);  
    	});
    }

}