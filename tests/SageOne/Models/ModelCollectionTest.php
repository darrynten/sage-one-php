<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelCollectionException;
use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Models\Example;
use DarrynTen\SageOne\Models\ExampleCategory;
use DarrynTen\SageOne\Models\SimpleExample;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;

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

    public function testExceptionWhileLoadingModelWithCollection()
    {
        $exampleModel = new Example($this->config);
        $exampleFields = [
            'someCollection' => [
                'type' => 'SomeInvalidClass',
                'nullable' => false,
                'readonly' => false,
                'collection' => true,
            ],
        ];

        $reflection = new ReflectionClass($exampleModel);
        $reflectedModel = $reflection->getProperty('fields');
        $reflectedModel->setAccessible(true);
        $reflectedModel->setValue($exampleModel, $exampleFields);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" class "DarrynTen\SageOne\Models\SomeInvalidClass" ModelCollection is referencing an undefined, non-primitive class');
        $this->expectExceptionCode(10117);

        $obj = new \stdClass;
        $obj->SomeCollection = [];
        $exampleModel->loadResult($obj);
    }

    public function testExceptionWhileExportingModelWithCollection()
    {
        $exampleModel = new Example($this->config);
        $exampleFields = [
            'someCollection' => [
                'type' => 'SomeInvalidClass',
                'nullable' => false,
                'readonly' => false,
                'collection' => true,
            ],
        ];
        $modelCollection = new ModelCollection(Example::class, $this->config, []);
        $exampleFieldsData = [
            'someCollection' => $modelCollection
        ];

        $reflection = new ReflectionClass($exampleModel);
        $reflectedModel = $reflection->getProperty('fields');
        $reflectedModel->setAccessible(true);
        $reflectedModel->setValue($exampleModel, $exampleFields);
        $reflectedModel = $reflection->getProperty('fieldsData');
        $reflectedModel->setAccessible(true);
        $reflectedModel->setValue($exampleModel, $exampleFieldsData);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" Class "DarrynTen\SageOne\Models\SomeInvalidClass" for collection does not exist ModelCollection is referencing an undefined, non-primitive class');
        $this->expectExceptionCode(10117);

        $exampleModel->toJson();
    }

    public function testCollectionExtend()
    {
        $obj1 = new \stdClass;
        $obj1->ID = 10;
        $obj2 = new \stdClass;
        $obj2->ID = 20;
        $obj3 = new \stdClass;
        $obj3->ID = 30;

        $results = new \stdClass;
        $results->TotalResults = 3;
        $results->ReturnedResults = 1;
        $results->Results = [$obj1];

        $collection = new ModelCollection(SimpleExample::class, $this->config, $results);

        $this->assertEquals(3, $collection->totalResults);
        $this->assertEquals(1, $collection->returnedResults);
        $this->assertCount(1, $collection->results);

        $results = new \stdClass;
        $results->TotalResults = 3;
        $results->ReturnedResults = 2;
        $results->Results = [$obj2, $obj3];
        $otherCollection = new ModelCollection(SimpleExample::class, $this->config, $results);

        $collection->extend($otherCollection);
        $this->assertEquals(3, $collection->totalResults);
        $this->assertEquals(3, $collection->returnedResults);
        $this->assertCount(3, $collection->results);
        $this->assertEquals(10, $collection->results[0]->id);
        $this->assertEquals(20, $collection->results[1]->id);
        $this->assertEquals(30, $collection->results[2]->id);
    }

    public function testCollectionGetAllMany()
    {
        $apikey = urlencode('{key}');
        $path = 'SimpleExample/Get';
        $url1 = sprintf('/1.1.2/%s?apikey=%s', $path, $apikey);
        $url2 = sprintf('/1.1.2/%s?$skip=100apikey=%s', $path, $apikey);
        $url3 = sprintf('/1.1.2/%s?$skip=200=%s', $path, $apikey);

        $response1 = [
            'TotalResults' => 204,
            'ReturnedResults' => 100,
            'Results' => []
        ];
        $response2 = [
            'TotalResults' => 204,
            'ReturnedResults' => 100,
            'Results' => []
        ];
        $response3 = [
            'TotalResults' => 204,
            'ReturnedResults' => 4,
            'Results' => []
        ];

        for ($i = 1; $i <= 100; $i++) {
            $response1['Results'][] = [
                'ID' => $i
            ];
        }

        for ($i = 101; $i <= 200; $i++) {
            $response2['Results'][] = [
                'ID' => $i
            ];
        }

        for ($i = 201; $i <= 204; $i++) {
            $response3['Results'][] = [
                'ID' => $i
            ];
        }

        $response1 = json_encode($response1);
        $response2 = json_encode($response2);
        $response3 = json_encode($response3);

        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs($url1)
            ->then()
            ->body($response1)
            ->end();
        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs($url2)
            ->then()
            ->body($response2)
            ->end();
        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs($url3)
            ->then()
            ->body($response3)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        $localClient = new Client();
        $localResult1 = $localClient->request(
            'GET',
            '//localhost:8082' . $url1
        );
        $localResult2 = $localClient->request(
            'GET',
            '//localhost:8082' . $url2
        );
        $localResult3 = $localClient->request(
            'GET',
            '//localhost:8082' . $url3
        );

        $mockClient = \Mockery::mock(
            'Client'
        );

        $params1 = [
            'query' => [
                'apikey' => $apikey
            ],
            'headers' => [
                'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ='
            ],
        ];
        $params2 = [
            'query' => [
                'apikey' => $apikey,
                '$skip' => '100'
            ],
            'headers' => [
                'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ='
            ],
        ];
        $params3 = [
            'query' => [
                'apikey' => $apikey,
                '$skip' => '200'
            ],
            'headers' => [
                'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ='
            ],
        ];

        $mockClient->shouldReceive('request')
            ->once()
            ->with('GET', '//localhost:8082/1.1.2/SimpleExample/Get/', $params1)
            ->andReturn($localResult1);

        $mockClient->shouldReceive('request')
            ->once()
            ->with('GET', '//localhost:8082/1.1.2/SimpleExample/Get/', $params2)
            ->andReturn($localResult2);

        $mockClient->shouldReceive('request')
            ->once()
            ->with('GET', '//localhost:8082/1.1.2/SimpleExample/Get/', $params3)
            ->andReturn($localResult3);

        $reflection = new ReflectionClass($request);
        $reflectedClient = $reflection->getProperty('client');
        $reflectedClient->setAccessible(true);
        $reflectedClient->setValue($request, $mockClient);

        $model = new SimpleExample($this->config);

        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);

        $response = $model->all();

        $this->assertInstanceOf(ModelCollection::class, $response);
        $this->assertEquals(204, $response->totalResults);
        $this->assertEquals(204, $response->returnedResults);
        $this->assertCount(204, $response->results);
    }
}
