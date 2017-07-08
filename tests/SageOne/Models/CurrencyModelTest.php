<?php

namespace DarrynTen\SageOne\Tests\SageOne;

use DarrynTen\SageOne\Models\Currency;
use DarrynTen\SageOne\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;

class CurrencyModelTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;

    private $config = [
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

    public function testInstanceOf()
    {
        $request = new Currency($this->config);
        $this->assertInstanceOf(Currency::class, $request);
    }

    public function testSaveException()
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Currency"  Save is not supported');
        $this->expectExceptionCode(10103);

        $model = new Currency($this->config);
        $model->save();
    }

    public function testDeleteException()
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "Currency" id 1 Delete is not supported');
        $this->expectExceptionCode(10104);

        $model = new Currency($this->config);
        $model->delete(1);
    }

    public function testGetAll()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Currency/GET_Currency_Get.json');

        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Currency/Get?apikey=key')
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
            'http://localhost:8082/1.1.2/Currency/Get?apikey=key',
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

        $currencyModel = new Currency($this->config);

        /**
         * We then reflect into the example model
         */
        $currencyReflection = new ReflectionClass($currencyModel);
        $reflectedRequest = $currencyReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($currencyModel, $request);

        // Make sure you have all the attributes
        $this->assertObjectHasAttribute('id', new Currency($this->config));
        $this->assertObjectHasAttribute('code', new Currency($this->config));
        $this->assertObjectHasAttribute('description', new Currency($this->config));
        $this->assertObjectHasAttribute('symbol', new Currency($this->config));

        // Check default values
        $this->assertNull($currencyModel->id);
        $this->assertNull($currencyModel->code);
        $this->assertNull($currencyModel->description);
        $this->assertNull($currencyModel->symbol);

        // Check any protected/private properties via reflection
        $reflect = new ReflectionClass($currencyModel);

        // Fields mapping
        $reflectValue = $reflect->getProperty('fields');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Currency($this->config));

        $this->assertCount(4, $value);
        $this->assertEquals('integer', $value['id']['type']);
        $this->assertFalse($value['id']['nullable']);
        $this->assertTrue($value['id']['persistable']);
        $this->assertFalse($value['code']['nullable']);
        $this->assertTrue($value['code']['persistable']);
        $this->assertFalse($value['description']['nullable']);
        $this->assertTrue($value['description']['persistable']);
        $this->assertFalse($value['symbol']['nullable']);
        $this->assertTrue($value['symbol']['persistable']);

        // Features mapping
        $reflectValue = $reflect->getProperty('features');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Currency($this->config));
        $this->assertArrayHasKey('all', $value);
        $this->assertCount(4, $value);
        $this->assertEquals(true, $value['all']);
        $this->assertEquals(true, $value['get']);
        $this->assertEquals(false, $value['save']);
        $this->assertEquals(false, $value['delete']);

        // Test injecting a result
        $data = json_decode(file_get_contents(__DIR__ . '/../../mocks/Currency/GET_Currency_Get_xx.json'));
        $currencyModel->loadResult($data);

        // Check values on all child properties to match the mock it received
        $this->assertEquals($currencyModel->id, 11);
        $this->assertEquals($currencyModel->code, 'code 11');
        $this->assertEquals($currencyModel->description, 'description 11');
        $this->assertEquals($currencyModel->symbol, 'symbol 11');

        // Test retrieving valid json
        $json = $currencyModel->toJson();
        $this->assertEquals(json_encode($data), $json);

        // Perform the action
        $allCurrencies = json_decode($currencyModel->all(), true);
        $this->assertArrayHasKey('Results', $allCurrencies);
        $this->assertEquals(2, count($allCurrencies['Results']));
        $this->assertEquals('code 1', $allCurrencies['Results'][0]['Code']);
    }

    public function testGetId()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Currency/GET_Currency_Get_xx.json');

        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs('/1.1.2/Currency/Get/11?apikey=key')
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
            'http://localhost:8082/1.1.2/Currency/Get/11?apikey=key',
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

        $currencyModel = new Currency($this->config);

        /**
         * We then reflect into the account model
         */
        $currencyReflection = new ReflectionClass($currencyModel);
        $reflectedRequest = $currencyReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($currencyModel, $request);

        // Check defaults
        $this->assertNull($currencyModel->id);
        $this->assertNull($currencyModel->code);
        $this->assertNull($currencyModel->description);
        $this->assertNull($currencyModel->symbol);

        // Fetch an id
        $currencyModel->get(11);

        // Make sure related models are of the right types
        $this->assertInstanceOf(Currency::class, $currencyModel);

        // Ensure the instance has expected properties
        $this->assertObjectHasAttribute('id', $currencyModel);
        $this->assertEquals('integer', gettype($currencyModel->id));
        $this->assertObjectHasAttribute('code', $currencyModel);
        $this->assertEquals('string', gettype($currencyModel->code));
        $this->assertObjectHasAttribute('description', $currencyModel);
        $this->assertEquals('string', gettype($currencyModel->description));
        $this->assertObjectHasAttribute('symbol', $currencyModel);
        $this->assertEquals('string', gettype($currencyModel->symbol));

        // Check values on all child properties to match the mock it received
        $this->assertEquals($currencyModel->id, 11);
        $this->assertEquals($currencyModel->code, 'code 11');
        $this->assertEquals($currencyModel->description, 'description 11');
        $this->assertEquals($currencyModel->symbol, 'symbol 11');

        // Check any protected/private properties via reflection
    }
}
