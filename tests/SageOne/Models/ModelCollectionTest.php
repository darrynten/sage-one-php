<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelCollectionException;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Models\Example;

class ModelCollectionTest extends BaseModelTest
{
    public function testException()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('ModelCollection Access to undefined property undefinedProperty');
        $this->expectExceptionCode(10300);

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
        $this->expectExceptionCode(10301);

        $results = new \stdClass;
        $collection = new ModelCollection(Example::class, $this->config, $results);
    }

    public function testRequireReturnedResults()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('Missing required property in object ReturnedResults');
        $this->expectExceptionCode(10301);

        $results = new \stdClass;
        $results->TotalResults = 1;
        $collection = new ModelCollection(Example::class, $this->config, $results);
    }

    public function testRequireResults()
    {
        $this->expectException(ModelCollectionException::class);
        $this->expectExceptionMessage('Missing required property in object Results');
        $this->expectExceptionCode(10301);

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
        $this->assertEquals(2, count($collection->results));
        $this->assertInstanceOf(Example::class, $collection->results[0]);
        $this->assertInstanceOf(Example::class, $collection->results[1]);

        $example1 = $collection->results[0];
        $this->assertEquals(1, $example1->id);
        $this->assertTrue($example1->someBoolean);
        $this->assertEquals('example', $example1->stringRange);
        $this->assertEquals(134522342, $example1->integerRange);

        $example2 = $collection->results[1];
        $this->assertEquals(2, $example2->id);
        $this->assertFalse($example2->someBoolean);
        $this->assertEquals('example 2', $example2->stringRange);
        $this->assertEquals(134522343, $example2->integerRange);
    }
}
