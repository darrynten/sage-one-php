<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

abstract class BaseModelTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;

    protected $config = [
        'username' => 'username',
        'password' => 'password',
        'key' => 'key',
        'endpoint' => '//localhost:8082',
        'version' => '1.1.2',
        'companyId' => null
    ];

    public static function setUpBeforeClass()
    {
        static::setUpHttpMockBeforeClass('8082', 'localhost');
    }

    public static function tearDownAfterClass()
    {
        static::tearDownHttpMockAfterClass();
    }

    public function setUp()
    {
        $this->setUpHttpMock();
    }

    public function tearDown()
    {
        $this->tearDownHttpMock();
    }

    /**
     * Extracts className from path A\B\C\ClassName
     *
     * @param string $classPath Full path to the class
     */
    private function getClassName(string $class)
    {
        $classPath = explode('\\', $class);
        $className = $classPath[ count($classPath) - 1];
        return $className;
    }

    /**
     * Verifies that passed $class (as string) is instance of $class
     *
     * @param string $class Full path to the class
     */
    protected function verifyInstanceOf(string $class)
    {
        $request = new $class($this->config);
        $this->assertInstanceOf($class, $request);
    }

    /**
     * Verifies that when we try to set undefined property it throws expected exception
     *
     * @param string $class Full path to the class
     */
    protected function verifySetUndefined(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" key doesNotExist value xyz Attempting to set a property that is not defined in the model");
        $this->expectExceptionCode(10113);

        $model = new $class($this->config);
        $model->doesNotExist = 'xyz';
    }

    /**
     * Verifies that when we try to get undefined property it throws expected exception
     *
     * @param string $class Full path to the class
     */
    protected function verifyGetUndefined(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" key doesNotExist Attempting to get an undefined property");
        $this->expectExceptionCode(10116);

        $model = new $class($this->config);
        $throw = $model->doesNotExist;
    }

    /**
     * Verifies that when we try to set property to null and it can not be null it throws expected exception
     *
     * @param string $class Full path to the class
     * @param string $key Valid not nullable field for this class
     */
    protected function verifyCanNotNullify(string $class, string $key)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" attempting to nullify key {$key} Property is null without nullable permission");
        $this->expectExceptionCode(10111);

        $model = new $class($this->config);
        $model->{$key} = null;
    }

    /**
     * Verifies that when we try to set property to null and it can be null it does not throw exception
     *
     * @param string $class Full path to the class
     * @param string $key Valid nullable field for this class
     */
    protected function verifyCanNullify(string $class, string $key)
    {
        $className = $this->getClassName($class);

        $model = new $class($this->config);
        $model->{$key} = null;
        $this->assertNull($model->{$key});
    }

    /**
     * Verifies that when we try to load data for model without required fields it throws expected exception
     *
     * @param string $class Full path to the class
     * @param string $key Valid field for this $class (because of the loading logic it should be first field in $fields attribute after 'id'
     */
    protected function verifyBadImport(string $class, string $key)
    {
        $className = $this->getClassName($class);

        $model = new $class($this->config);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" Defined key \"{$key}\" not present in payload A property is missing in the loadResult payload");
        $this->expectExceptionCode(10112);

        $obj = new \stdClass;
        $obj->ID = 1;
        $model->loadResult($obj);
    }

    /**
     * Verifies that all fields has expected types, nullable and read only properties
     *
     * @param string $class Full path to the class
     * @param array $attributes
     *      Contains data in the following format
     *      ['name of the key' =>
     *          'type' => 'name of the type, like integer or DateTime',
     *          'nullable' => true, // if field can be null
     *          'readonly' => false // if field is not read only
     *      ]
     */
    protected function verifyAttributes(string $class, array $attributes)
    {
        $model = new $class($this->config);
        $className = $this->getClassName($class);

        // Fields mapping
        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('fields');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new $class($this->config));

        $fieldsCount = count($attributes);

        $this->assertCount($fieldsCount, $value);

        foreach ($attributes as $name => $options) {
            $this->assertEquals(true, is_array($value[$name]));
            $this->assertEquals(
                $options['type'],
                $value[$name]['type'],
                "Model {$className} Key {$name} Expected type {$options['type']} got {$value[$name]['type']}"
            );
            $this->assertEquals('boolean', gettype($value[$name]['nullable']));
            $this->assertEquals('boolean', gettype($value[$name]['readonly']));

            $nullable = $options['nullable'];
            $nullableText = $nullable ? 'true': 'false';
            $nullableOptionText = $value[$name]['nullable'] ? 'true' : 'false';
            $this->assertEquals(
                $nullable,
                $value[$name]['nullable'],
                "Model {$className} Key {$name} Expected nullable to be {$nullableText} got {$nullableOptionText}"
            );

            $readonly = $options['readonly'];
            $readonlyText = $readonly ? 'true' : 'false';
            $readonlyOptionText = $value[$name]['readonly'] ? 'true' : 'false';

            $this->assertEquals(
                $readonly,
                $value[$name]['readonly'],
                "Model {$className} Key {$name} Expected readonly to be {$readonlyText} got {$readonlyOptionText}"
            );
        }
    }

    /**
     * Verifies that features are set as expected
     * Available features are: all, get, save, delete
     *
     * @param string $class Full path to the class
     * @param array $features
     */
    protected function verifyFeatures(string $class, array $features)
    {
        $model = new $class($this->config);
        $reflect = new ReflectionClass($model);
        $className = $this->getClassName($class);

        $reflectValue = $reflect->getProperty('features');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue($model);
        $this->assertArrayHasKey('all', $value);
        $this->assertArrayHasKey('get', $value);
        $this->assertArrayHasKey('save', $value);
        $this->assertArrayHasKey('delete', $value);
        $this->assertCount(4, $value);

        foreach (['all', 'get', 'save', 'delete'] as $feature) {
            $expected = $features[$feature] ? 'true' : 'false';
            $actual = $value[$feature] ? 'true' : 'false';
            $this->assertEquals(
                $features[$feature],
                $value[$feature],
                "Model {$className} Feature {$feature} expected {$expected} got {$actual}"
            );
        }
    }

    /**
     * Verifies that we can load object from passed data (data should be valid, of course)
     *
     * @param string $class Full path to the class
     * @param callable $whatToCheck Verifies fields on loaded model
     */
    protected function verifyInject(string $class, callable $whatToCheck)
    {
        $className = $this->getClassName($class);

        $model = new $class($this->config);
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/{$className}/GET_{$className}_Get_xx.json"));
        $model->loadResult($data);

        $whatToCheck($model, $data);
    }

    /**
     * Verifies that we can load list of models
     *
     * @param string $class Full path to the class
     * @param callable $whatToCheck Verifies fields on result
     */
    protected function verifyGetAll(string $class, callable $whatToCheck)
    {
        $className = $this->getClassName($class);
        $data = file_get_contents(__DIR__ . "/../../mocks/{$className}/GET_{$className}_Get.json");

        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs("/1.1.2/{$className}/Get?apikey=key")
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
            "http://localhost:8082/1.1.2/{$className}/Get?apikey=key",
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

        $model = new $class($this->config);

        /**
         * We then reflect into the model
         */
        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);

        $allInstances = json_decode($model->all(), true);

        $this->assertEquals(3, count($allInstances));
        $this->assertArrayHasKey('Results', $allInstances);
        $this->assertArrayHasKey('ReturnedResults', $allInstances);
        $this->assertArrayHasKey('TotalResults', $allInstances);

        $whatToCheck($allInstances['Results'], $data);
    }

    /**
     * Verifies that we can load single model
     *
     * @param string $class Full path to the class
     * @param ind $id id of the model
     * @param callable $whatToCheck Verifies fields on single model
     */
    protected function verifyGetId(string $class, int $id, callable $whatToCheck)
    {
        $className = $this->getClassName($class);
        $data = file_get_contents(__DIR__ . "/../../mocks/{$className}/GET_{$className}_Get_xx.json");

        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs("/1.1.2/{$className}/Get/{$id}?apikey=key")
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
            "http://localhost:8082/1.1.2/{$className}/Get/{$id}?apikey=key",
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

        $model = new $class($this->config);

        /**
         * We then reflect into the account model
         */
        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);

        // Fetch an id
        $model->get($id);

        $whatToCheck($model);
    }

    /**
     * Verifies that we can save model
     *
     * @param string $class Full path to the class
     * @param callable $whatToCheck Verifies response after saving model
     */
    protected function verifySave(string $class, callable $whatToCheck)
    {
        $className = $this->getClassName($class);
        $data = file_get_contents(__DIR__ . "/../../mocks/{$className}/POST_{$className}_Save_RESP.json");
        $dataArray = json_decode($data, true);

        $this->http->mock
            ->when()
            ->methodIs('POST')
            ->pathIs("/1.1.2/{$className}/Save?apikey=key")
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
            'POST',
            "http://localhost:8082/1.1.2/{$className}/Save?apikey=key",
            $dataArray
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

        $model = new $class($this->config);

        /**
         * We then reflect into the model
         */
        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);

        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/{$className}/POST_{$className}_Save_REQ.json"));
        $model->loadResult($data);

        $response = $model->save();
        $whatToCheck($response);
    }

    /**
     * Verifies that we can delete model
     *
     * @param string $class Full path to the class
     * @param int $id Id of the model
     * @param callable $whatToCheck Verifies response
     */
    public function verifyDelete(string $class, int $id, callable $whatToCheck)
    {
        $className = $this->getClassName($class);
        $url = sprintf('/1.1.2/%s/Delete/%s?apikey=key', $className, $id);
        $this->http->mock
            ->when()
            ->methodIs('DELETE')
            ->pathIs($url)
            ->then()
            ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        $localResult = $localClient->request(
            'DELETE',
            'http://localhost:8082' . $url,
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

        $model = new $class($this->config);

        /**
         * We then reflect into the model
         */
        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);

        $model->delete($id);
    }

    public function verifySaveException(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\"  Save is not supported");
        $this->expectExceptionCode(10103);

        $model = new $class($this->config);
        $model->save();
    }

    public function verifyDeleteException(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" id 1 Delete is not supported");
        $this->expectExceptionCode(10104);

        $model = new $class($this->config);
        $model->delete(1);
    }

    public function verifyRequestWithAuth(string $class, string $method)
    {
        $className = $this->getClassName($class);

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
                sprintf('//accounting.sageone.co.za/1.1.2/%s/%s/', $className, $method),
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
            $request->request('POST', $className, $method, [])
        );
    }

    protected function setUpRequestMock(string $class, string $path, string $method, string $mockFileResponse = null, string $mockFileRequest = null) {
        $url = sprintf('/1.1.2/%s?apikey=key', $path);

        $responseData = null;
        if ($mockFileResponse) {
            $responseData = file_get_contents(__DIR__ . '/../../mocks/' . $mockFileResponse);
        }
        $requestData = [];
        if ($mockFileRequest) {
            $requestData= json_decode(file_get_contents(__DIR__ . '/../../mocks/' . $mockFileRequest), true);
        }

        $this->http->mock
            ->when()
            ->methodIs($method)
            ->pathIs($url)
            ->then()
            ->body($responseData)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        $localClient = new Client();
        $localResult = $localClient->request(
            $method,
            'http://localhost:8082' . $url,
            []
        );

        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andReturn($localResult);

        $reflection = new ReflectionClass($request);
        $reflectedClient = $reflection->getProperty('client');
        $reflectedClient->setAccessible(true);
        $reflectedClient->setValue($request, $mockClient);

        $model = new $class($this->config);

        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);

        return $model;
    }
}
