<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelCollectionException;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Models\Example;
use DarrynTen\SageOne\Models\ExampleCategory;

class ModelCollectionTest extends BaseModelTest
{
    public function testException()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('ModelCollection Attempting to access undefined property undefinedProperty');
        $this->expectExceptionCode(10201);

        $results = new \stdClass;
        $results->TotalResults = 0;
        $results->ReturnedResults = 0;
        $results->Results = [];
        $collection = new ModelCollection(Example::class, $this->config, $results);
        $undefinedProperty = $collection->undefinedProperty;
    }

    public function testRequiredTotalResults()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('Missing required property in object TotalResults');
        $this->expectExceptionCode(10202);

        $results = new \stdClass;
        $collection = new ModelCollection(Example::class, $this->config, $results);
    }

    public function testRequireReturnedResults()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('Missing required property in object ReturnedResults');
        $this->expectExceptionCode(10202);

        $results = new \stdClass;
        $results->TotalResults = 1;
        $collection = new ModelCollection(Example::class, $this->config, $results);
    }

    public function testRequireResults()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('Missing required property in object Results');
        $this->expectExceptionCode(10202);

        $results = new \stdClass;
        $results->TotalResults = 1;
        $results->ReturnedResults = 1;
        $collection = new ModelCollection(Example::class, $this->config, $results);
    }

    public function testProperties()
    {
        $results = json_decode(file_get_contents(__DIR__ . "/../../mocks/Example/GET_Example_Get.json"));
        $collection = new ModelCollection(Example::class, $this->config, $results);
        $this->assertEquals(1, $collection->totalResults);
        $this->assertEquals(2, $collection->returnedResults);
        $this->assertCount(2, $collection->results);
        $this->assertInstanceOf(Example::class, $collection->results[0]);
        $this->assertInstanceOf(Example::class, $collection->results[1]);

        $example1 = $collection->results[0];
        $this->assertEquals(1, $example1->id);
        $this->assertTrue($example1->someBoolean);
        $this->assertEquals('boolean', gettype($example1->someBoolean));
        $this->assertEquals('example', $example1->stringRange);
        $this->assertEquals('string', gettype($example1->stringRange));
        $this->assertEquals(134522342, $example1->integerRange);

        $example2 = $collection->results[1];
        $this->assertEquals(2, $example2->id);
        $this->assertFalse($example2->someBoolean);
        $this->assertNull($example2->stringRange);
        $this->assertEquals(134522343, $example2->integerRange);
        $this->assertEquals('integer', gettype($example2->integerRange));
    }

    public function testToJson()
    {
        $exampleModelData = json_decode(file_get_contents(__DIR__ . "/../../mocks/Example/GET_Example_Get_xx.json"));
        $model = new Example($this->config);
        $model->loadResult($exampleModelData);
        $json = $model->toJson();
        $decoded = json_decode($json);
            
        $newModel = new Example($this->config);
        $newModel->loadResult($decoded);
        $this->assertEquals(1, $newModel->id);
        $this->assertInstanceOf(ModelCollection::class, $newModel->someCollection);
        $this->assertInstanceOf(ExampleCategory::class, $newModel->someCollection->results[0]);
        $this->assertInstanceOf(ExampleCategory::class, $newModel->someCollection->results[1]);
        $this->assertEquals(1, $newModel->someCollection->results[0]->id);
        $this->assertEquals(2, $newModel->someCollection->results[1]->id);
        $this->assertCount(2, $newModel->someCollection->results);
    }
}
