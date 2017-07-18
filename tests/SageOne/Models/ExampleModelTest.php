<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Example;
// use DarrynTen\SageOne\Models\ExampleCategory; // any related models

use DarrynTen\SageOne\Exception\ValidationException;
use DarrynTen\SageOne\Exception\ModelException;
use ReflectionClass;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;

class ExampleModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(Example::class);
    }

    public function testAllException()
    {
        $this->verifyAllException(Example::class);
    }

    public function testGetException()
    {
        $this->verifyGetException(Example::class);
    }

    public function testSaveException()
    {
        $this->verifySaveException(Example::class);
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(Example::class);
    }

    public function testCustomExceptions()
    {
        /**
         * The exceptions listed are examples, and must be removed and
         * replaced with your own custom exceptions!
         */
        $exampleModel = new Example($this->config);

        // Try to get null property without null permission
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" key id Property is null without nullable permission');
        $this->expectExceptionCode(10111);
        $exampleModel->toJson();
    }

    public function testBadClass()
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" Received namespaced class "DarrynTen\SageOne\Models\SomeInvalidClass" when defined type is "string" Property is referencing an undefined, non-primitive class');
        $this->expectExceptionCode(10110);

        $exampleModel = new Example($this->config);
        $exampleBadFields = [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'exampleWithCamel' => [
                'type' => 'SomeInvalidClass',
                'nullable' => true,
                'readonly' => true,
            ],
        ];

        $reflection = new ReflectionClass($exampleModel);
        $reflectedModel = $reflection->getProperty('fields');
        $reflectedModel->setAccessible(true);
        $reflectedModel->setValue($exampleModel, $exampleBadFields);

        // Test
        $data = json_decode(file_get_contents(__DIR__ . '/../../mocks/Example/GET_Example_Get_xx.json'));
        $exampleModel->loadResult($data);
    }

    public function testBadExportable()
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" Received unexpected namespaced class "DarrynTen\SageOne\Models\integerzzz');
        $this->expectExceptionCode(10115);

        $exampleModel = new Example($this->config);
        $exampleBadFields = [
            'exampleWithCamel' => [
                'type' => 'SomeInvalidClass',
                'nullable' => true,
                'readonly' => false,
            ],
            'id' => [
                'type' => 'integerzzz',
                'nullable' => false,
                'readonly' => false,
            ],
        ];

        $reflection = new ReflectionClass($exampleModel);
        $reflectedModel = $reflection->getProperty('fields');
        $reflectedModel->setAccessible(true);
        $reflectedModel->setValue($exampleModel, $exampleBadFields);

        $exampleModel->id = 12;
        $exampleModel->exampleWithCamel = null;
        $exampleModel->toJson();
    }

    public function testCannotSet()
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" key exampleWithCamel value xx Attempting to set a read-only property');
        $this->expectExceptionCode(10114);

        $exampleModel = new Example($this->config);

        $exampleModel->id = 12;
        $exampleModel->exampleWithCamel = 'xx';
    }

    public function testBadIntegerRange()
    {
        $this->verifyBadIntegerRangeException(Example::class, 'integerRange', 1, 2147483647, -1);
    }

    public function testBadStringLength()
    {
        $this->verifyBadStringLengthException(
            Example::class,
            'stringRange',
            2,
            10,
            'This string is too long!'
        );
    }

    public function testBadRangeType()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Validation error value 1 is type boolean Validation type is invalid');
        $this->expectExceptionCode(10004);

        $exampleModel = new Example($this->config);

        $exampleModel->id = 939393;
        $exampleModel->stringRange = true;
    }

    public function testBadRegexSet()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Validation error value badguid failed to validate String did not match validation regex');
        $this->expectExceptionCode(10003);

        $exampleModel = new Example($this->config);

        $exampleModel->id = 1386847;
        $exampleModel->guidRegex = 'badguid';
    }

    public function testBadValidation()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Validation error value bademail failed to validate filter_var failed to validate');
        $this->expectExceptionCode(10005);

        $exampleModel = new Example($this->config);

        $exampleModel->id = 1386847;
        $exampleModel->emailAddress = 'bademail';
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(Example::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(Example::class);
    }

    public function testCannotNullify()
    {
        $this->verifyCanNotNullify(Example::class, 'emailAddress');
    }

    public function testDefaultProperties()
    {
        $exampleModel = new Example($this->config);

        $this->assertNull($exampleModel->id);
        $this->assertEquals('some default value', $exampleModel->stringWithDefault);
        $exampleModel->stringWithDefault = 'non default value';
        $this->assertEquals('non default value', $exampleModel->stringWithDefault);
    }

    public function testCustomMethod()
    {
        $exampleModel = new Example($this->config);
        $result = $exampleModel->anExampleCustomMethod();
        $this->assertEquals('Example Model Custom Method Call', $result);
    }

    /**
     * Test injecting a bad result
     */
    public function testBadImport()
    {
        $this->verifyBadImport(Example::class, 'exampleWithCamel');
    }

    public function testExamples()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Example/GET_Example_Get.json');

        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Example/Get?apikey=key')
            ->then()
                ->body($data)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        $localResult = $localClient->request(
            'GET',
            'http://localhost:8082/1.1.2/Example/Get?apikey=key',
            []
        );

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andReturn($localResult);

        /**
         * Insert the mocked client into the request class via reflection
         *
         * This will pass the desired mock object back to the assertion
         * as it replaces the legit Client() object
         */
        $reflection = new ReflectionClass($request);
        $reflectedClient = $reflection->getProperty('client');
        $reflectedClient->setAccessible(true);
        $reflectedClient->setValue($request, $mockClient);

        $exampleModel = new Example($this->config);

        /**
         * We then reflect into the example model
         */
        $exampleReflection = new ReflectionClass($exampleModel);
        $reflectedRequest = $exampleReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($exampleModel, $request);
        // etc

        // Check default values
        $this->assertNull($exampleModel->id);
        $this->assertNull($exampleModel->exampleWithCamel);
        // etc

        // Check any protected/private properties via reflection
        $reflect = new ReflectionClass($exampleModel);

        // Fields mapping
        $reflectValue = $reflect->getProperty('fields');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Example($this->config));

        $this->assertCount(11, $value);
        $this->assertEquals('integer', $value['id']['type']);
        $this->assertEquals('boolean', gettype($value['exampleWithCamel']['nullable']));
        $this->assertEquals(true, is_array($value['exampleWithCamel']));
        $this->assertCount(3, $value['id']);
        $this->assertFalse($value['id']['readonly']);
        $this->assertFalse($value['id']['nullable']);
        $this->assertEquals('boolean', gettype($value['id']['nullable']));
        $this->assertCount(3, $value['exampleWithCamel']);
        $this->assertTrue($value['exampleWithCamel']['readonly']);
        $this->assertTrue($value['exampleWithCamel']['nullable']);
        $this->assertEquals('boolean', gettype($value['exampleWithCamel']['readonly']));
        $this->assertCount(3, $value['someBoolean']);
        $this->assertFalse($value['someBoolean']['readonly']);
        $this->assertFalse($value['someBoolean']['nullable']);
        $this->assertCount(4, $value['requiredString']);
        $this->assertFalse($value['requiredString']['readonly']);
        $this->assertFalse($value['requiredString']['nullable']);
        $this->assertArrayHasKey('required', $value['requiredString']);
        $this->assertCount(4, $value['stringWithDefault']);
        $this->assertFalse($value['stringWithDefault']['readonly']);
        $this->assertTrue($value['stringWithDefault']['nullable']);
        $this->assertArrayHasKey('default', $value['stringWithDefault']);
        $this->assertCount(5, $value['stringRange']);
        $this->assertFalse($value['stringRange']['readonly']);
        $this->assertTrue($value['stringRange']['nullable']);
        $this->assertArrayHasKey('min', $value['stringRange']);
        $this->assertEquals(2, $value['stringRange']['min']);
        $this->assertEquals('integer', gettype($value['stringRange']['min']));
        $this->assertArrayHasKey('max', $value['stringRange']);
        $this->assertEquals(10, $value['stringRange']['max']);
        $this->assertEquals('integer', gettype($value['stringRange']['max']));
        $this->assertCount(5, $value['integerRange']);
        $this->assertFalse($value['integerRange']['readonly']);
        $this->assertFalse($value['integerRange']['nullable']);
        $this->assertCount(6, $value['emailAddress']);
        $this->assertFalse($value['emailAddress']['readonly']);
        $this->assertFalse($value['emailAddress']['nullable']);
        $this->assertArrayHasKey('min', $value['emailAddress']);
        $this->assertEquals(0, $value['emailAddress']['min']);
        $this->assertEquals('integer', gettype($value['emailAddress']['min']));
        $this->assertArrayHasKey('max', $value['emailAddress']);
        $this->assertEquals(100, $value['emailAddress']['max']);
        $this->assertEquals('integer', gettype($value['emailAddress']['max']));
        $this->assertArrayHasKey('validate', $value['emailAddress']);
        $this->assertEquals('integer', gettype($value['emailAddress']['validate']));
        $this->assertArrayHasKey('regex', $value['guidRegex']);
        $this->assertEquals("/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/",
            $value['guidRegex']['regex']);
        $this->assertRegExp($value['guidRegex']['regex'], 'e2605371-fa91-4269-9ecb-b0b57bdef52e');
        $this->assertRegExp($value['guidRegex']['regex'], 'c37fbc7d-0a09-4990-9a55-b889f6699617');
        // etc etc...

        // Features mapping
        $reflectValue = $reflect->getProperty('features');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Example($this->config));
        $this->assertArrayHasKey('all', $value);
        $this->assertCount(4, $value);
        $this->assertEquals(false, $value['all']);
        $this->assertEquals(false, $value['get']);
        $this->assertEquals(false, $value['save']);
        $this->assertEquals(false, $value['delete']);

        // Test injecting a result
        $data = json_decode(file_get_contents(__DIR__ . '/../../mocks/Example/GET_Example_Get_xx.json'));
        $exampleModel->loadResult($data);

        // Check values on all child properties to match the mock it received
        $this->assertEquals(gettype($exampleModel->id), 'integer');
        $this->assertEquals($exampleModel->id, 1);
        $this->assertEquals($exampleModel->exampleWithCamel, 'exampleWithCamel');
        $this->assertEquals(gettype($exampleModel->stringWithDefault), 'string');
        $this->assertEquals($exampleModel->stringWithDefault, 'default string changed');
        $this->assertEquals(gettype($exampleModel->someBoolean), 'boolean');
        $this->assertTrue($exampleModel->someBoolean);
        $this->assertEquals($exampleModel->stringRange, 'example');
        $this->assertEquals(gettype($exampleModel->integerRange), 'integer');
        $this->assertEquals($exampleModel->integerRange, 134522342);
        $this->assertEquals($exampleModel->requiredString, 'required information');
        $this->assertEquals($exampleModel->emailAddress, 'user@example.com');

        // Test retrieving valid json
        $json = $exampleModel->toJson();
        $this->assertJsonStringEqualsJsonString(json_encode($data), $json);

        // Test actual working base methods that fetch from the API

        /**
         * The example model has all base calls disabled for testing purposes
         *
         * Remove this expected exception when writing your tests
         */
        $this->expectException(ModelException::class);

        // Perform the action
        $allExamples = json_decode($exampleModel->all(), true);

        /**
         * All of the below are examples to get you started and are not
         * run in this test due to exception above
         */

        /**
         * Additional examples for models with relationships
         */
        // models
        $this->assertEquals($exampleModel->type->id, 1);
        $this->assertEquals($exampleModel->type->hasActivity, true);
        // dates
        $this->assertEquals($exampleModel->created->format('Y-m-d'), '2017-06-30');
        $this->assertEquals($exampleModel->modified->getTimezone()->getName(), 'UTC');
        $this->assertEquals($exampleModel->category->format('Y-m-d'), '2017-06-30');
        $this->assertEquals($exampleModel->type->modified->format('Y-m-d'), '2017-06-30');

        $this->assertInstanceOf(ExampleCategory::class, $exampleModel->someCollection->results[0]);

        // You must made tests for each of the CRUD calls in use
        // and split each one into its own test method. Do not put
        // all tests in a single method

        // Example for getting a single ID
        $allExamples = json_decode($exampleModel->get(1), true);

        // Example for deleting
        $exampleModel->get(1);

        // Example for saving
        $exampleModel->save();

        /**
         * Here is where you would add your post-action assertions
         *
         * https://phpunit.de/manual/current/en/appendixes.assertions.html
         */

        // Examples for ORM style relationships and datetime types
        $this->assertInstanceOf(ExampleCategory::class, $exampleModel->category);
        $this->assertInstanceOf(ExampleType::class, $exampleModel->exampleType);
        $this->assertInstanceOf(\DateTime::class, $exampleModel->created);

        $this->assertEquals(3, count($allExamples));
        $this->assertArrayHasKey('Results', $allExamples);
        $this->assertEquals(2, count($allExamples['Results']));
        $this->assertEquals('sample string 2', $allExamples['Results'][0]['Name']);
        $this->assertTrue($allExamples['Results'][1]['Active']);
    }

    public function testRequestWithAuth()
    {
        $config = [
          'username' => 'username',
          'password' => 'password',
          'key' => 'key',
          'endpoint' => '//accounting.sageone.co.za',
          'version' => '1.1.2',
          'companyId' => null
        ];

        // Creates a partially mock of RequestHandler with mocked `handleRequest` method
        $request = \Mockery::mock(
            'DarrynTen\SageOne\Request\RequestHandler[handleRequest]',
            [
                $config,
            ]
        );

        $request->shouldReceive('handleRequest')
            ->once()
            ->with(
                'POST',
                '//accounting.sageone.co.za/1.1.2/Example/Save/',
                [
                    'headers' => [
                        'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
                    ],
                    'query' => [
                        'apikey' => 'key'
                    ]
                ],
                []
            )
            ->andReturn('OK');

        $this->assertEquals(
            'OK',
            $request->request('POST', 'Example', 'Save', [])
        );

        $request->shouldReceive('handleRequest')
            ->once()
            ->with(
                'GET',
                '//accounting.sageone.co.za/1.1.2/Example/Get/111/',
                [
                    'headers' => [
                        'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
                    ],
                    'query' => [
                        'apikey' => 'key'
                    ]
                ],
                ['keyx' => 'value']
            )
            ->andReturn('OK');

        $result = $request->request('GET', 'Example', 'Get/111', ['keyx' => 'value']);

        $this->assertEquals(
            'OK',
            $result
        );
    }

    public function testCollectionWithoutClass()
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Example" class "DarrynTen\SageOne\Models\InvalidClass" ModelCollection is referencing ad undefined, non-primitive class');
        $this->expectExceptionCode(10117);

        $exampleModel = new Example($this->config);
        $exampleBadFields = [
            'someCollection' => [
                'type' => 'InvalidClass',
                'nullable' => false,
                'readonly' => false,
                'collection' => true
            ],
        ];

        $reflection = new ReflectionClass($exampleModel);
        $reflectedModel = $reflection->getProperty('fields');
        $reflectedModel->setAccessible(true);
        $reflectedModel->setValue($exampleModel, $exampleBadFields);

        $data = json_decode(file_get_contents(__DIR__ . '/../../mocks/Example/GET_Example_Get_xx.json'));
        $exampleModel->loadResult($data);
    }

    public function testAttributes()
    {
        $this->verifyAttributes(Example::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'exampleWithCamel' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => true,
            ],
            'stringRange' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
                'min' => 2,
                'max' => 10,
            ],
            'stringWithDefault' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
                'default' => 'some default value',
            ],
            'stringWithNullDefault' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
                'default' => null
            ],
            'integerRange' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'min' => 1,
                'max' => 2147483647,
            ],
            'someBoolean' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'requiredString' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'emailAddress' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
                'validate' => FILTER_VALIDATE_EMAIL,
            ],
            'guidRegex' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'regex' => "/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/",
            ],
            'someCollection' => [
                'type' => 'ExampleCategory',
                'collection' => true,
                'nullable' => false,
                'readonly' => false
            ]
        ]);
    }
}
