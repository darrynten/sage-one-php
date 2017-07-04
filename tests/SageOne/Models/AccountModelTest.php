<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Account;
use DarrynTen\SageOne\Models\AccountCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use ReflectionClass;

class AccountModelTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;

    private $config = [
        'username' => 'username',
        'password' => 'password',
        'key' => 'key',
        'endpoint' => '//localhost:8082',
        'version' => '1.1.2',
        'clientId' => null
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
        $request = new Account($this->config);
        $this->assertInstanceOf(Account::class, $request);
    }

    public function testGetAll()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Account/GET_Account_Get.json');

        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Account/Get?apikey=key')
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
            'http://localhost:8082/1.1.2/Account/Get?apikey=key',
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

        $accountModel = new Account($this->config);

        /**
         * We then reflect into the account model
         */
        $accountReflection = new ReflectionClass($accountModel);
        $reflectedRequest = $accountReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($accountModel, $request);

        $allAccounts = json_decode($accountModel->all(), true);

        $this->assertEquals(3, count($allAccounts));
        $this->assertArrayHasKey('Results', $allAccounts);
        $this->assertEquals(2, count($allAccounts['Results']));
        $this->assertEquals('sample string 2', $allAccounts['Results'][0]['Name']);
        $this->assertTrue($allAccounts['Results'][1]['Active']);

        // Final check
        $this->assertEquals(
            json_decode($data, true),
            $allAccounts
        );
    }

    public function testGetId()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Account/GET_Account_Get_xx.json');

        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs('/1.1.2/Account/Get/11?apikey=key')
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
            'http://localhost:8082/1.1.2/Account/Get/11?apikey=key',
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

        $accountModel = new Account($this->config);

        /**
         * We then reflect into the account model
         */
        $accountReflection = new ReflectionClass($accountModel);
        $reflectedRequest = $accountReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($accountModel, $request);

        // Check defaults
        $this->assertNull($accountModel->id);
        $this->assertNull($accountModel->name);
        $this->assertNull($accountModel->created);
        $this->assertNull($accountModel->balance);
        $this->assertNull($accountModel->category);
        $this->assertNull($accountModel->defaultTaxType);

        // Fetch an id
        $accountModel->get(11);

        // Make sure related models are of the right types
        $this->assertInstanceOf(Account::class, $accountModel);
        $this->assertInstanceOf(AccountCategory::class, $accountModel->category);
        $this->assertInstanceOf(TaxType::class, $accountModel->defaultTaxType);
        $this->assertInstanceOf(\DateTime::class, $accountModel->created);

        // Ensure the instance has expected properties
        $this->assertObjectHasAttribute('id', new Account($this->config));

        // Expected lengths
        $this->assertEquals(20, count((array)$accountModel));
        $this->assertEquals(11, count((array)$accountModel->category));
        $this->assertEquals(13, count((array)$accountModel->defaultTaxType));

        // Check values on all child properties to match the mock it received
        $this->assertEquals($accountModel->id, 11);
        $this->assertEquals($accountModel->category->order, 6);
        $this->assertEquals($accountModel->defaultTaxType->id, 1);
        $this->assertEquals($accountModel->defaultTaxType->hasActivity, true);
        $this->assertEquals($accountModel->created->format('Y-m-d'), '2017-06-30');
        $this->assertEquals($accountModel->modified->getTimezone()->getName(), 'UTC');
        $this->assertEquals($accountModel->category->created->format('Y-m-d'), '2017-06-30');
        $this->assertEquals($accountModel->defaultTaxType->modified->format('Y-m-d'), '2017-06-30');

        // Check any protected/private properties via reflection
        $reflect = new ReflectionClass($accountModel);

        $reflectValue = $reflect->getProperty('features');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Account($this->config));
        $this->assertArrayHasKey('all', $value);
        $this->assertEquals(4, sizeof($value));
        $this->assertEquals(true, $value['all']);
        $this->assertEquals(true, $value['get']);
        $this->assertEquals(true, $value['save']);
        $this->assertEquals(true, $value['delete']);

        $reflectValue = $reflect->getProperty('fields');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Account($this->config));
        $this->assertEquals(15, sizeof($value));
        $this->assertEquals(3, sizeof($value['name']));
        $this->assertEquals(true, $value['name']['persistable']);
        $this->assertEquals(false, $value['category']['nullable']);

        $reflectValue = $reflect->getProperty('endpoint');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new Account($this->config));
        $this->assertEquals('Account', $value);
    }

    public function testSave()
    {
        $parameters = ['data123' => 'value'];
        $data = '{\'key\':\'data\'}';

        $this->http->mock
            ->when()
            ->methodIs('POST')
            ->pathIs('/1.1.2/Account/Save?apikey=key')
            ->then()
            ->body($data)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        // TODO these are copy-pastes (naughty)

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        $localResult = $localClient->request(
            'POST',
            'http://localhost:8082/1.1.2/Account/Save?apikey=key',
            $parameters
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

        $accountModel = new Account($this->config);

        /**
         * We then reflect into the account model
         */
        $accountReflection = new ReflectionClass($accountModel);
        $reflectedRequest = $accountReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($accountModel, $request);

        // Load an id
        $data = json_decode(file_get_contents(__DIR__ . '/../../mocks/Account/GET_Account_Get_xx.json'));
        $accountModel->loadResult($data);

        $accountModel->name = 'New Name';

        $accountModel->save();
        // (var_dump($accountModel->toJson()));

        // $this->assertEquals(
            // $data,
            // $request->request('POST', 'Account', 'Save', [], $parameters)
        // );
    }

    public function testRequestDelete()
    {
        $this->http->mock
            ->when()
            ->methodIs('DELETE')
            ->pathIs('/1.1.2/Account/Delete/11?apikey=key')
            ->then()
            ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        // TODO these are copy-pastes (naughty)

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        $localResult = $localClient->request(
            'DELETE',
            'http://localhost:8082/1.1.2/Account/Delete/11?apikey=key',
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

        $this->assertEquals(
            null,
            $request->request('DELETE', 'Account', 'Delete/11', [])
        );
    }

    public function testRequestWithAuth()
    {
        $config = [
          'username' => 'username',
          'password' => 'password',
          'key' => 'key',
          'endpoint' => '//accounting.sageone.co.za',
          'version' => '1.1.2',
          'clientId' => null
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
                '//accounting.sageone.co.za/1.1.2/Account/Save/',
                [
                    'headers' => [
                        'Authorization' => 'Basic Og==',
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
            $request->request('POST', 'Account', 'Save', [])
        );

        $request->shouldReceive('handleRequest')
            ->once()
            ->with(
                'GET',
                '//accounting.sageone.co.za/1.1.2/Account/Get/111/',
                [
                    'headers' => [
                        'Authorization' => 'Basic Og==',
                    ],
                    'query' => [
                        'apikey' => 'key'
                    ]
                ],
                ['keyx' => 'value']
            )
            ->andReturn('OK');

            $result = $request->request('GET', 'Account', 'Get/111', ['keyx' => 'value']);

        $this->assertEquals(
            'OK',
            $result
        );

    }
}
