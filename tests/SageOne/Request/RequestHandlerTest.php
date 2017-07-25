<?php

namespace DarrynTen\SageOne\Tests\SageOne\Request;

use DarrynTen\SageOne\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use ReflectionClass;

class RequestHandlerTest extends \PHPUnit_Framework_TestCase
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
        $request = new RequestHandler($this->config);
        $this->assertInstanceOf(RequestHandler::class, $request);
    }

    public function testRequest()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Account/GET_Account_Get.json');

        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Account/Get?apikey=%7Bkey%7D')
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
            'http://localhost:8082/1.1.2/Account/Get?apikey=%7Bkey%7D',
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

        // Call it
        $this->assertEquals(
            json_decode($data),
            $request->request('GET', 'Account', 'Get', [])
        );
    }

    public function testRequestWithCompanyId()
    {
        $data = file_get_contents(__DIR__ . '/../../mocks/Account/GET_Account_Get_xx.json');

        $this->config['companyId'] = 8;

        $this->http->mock
            ->when()
            ->methodIs('GET')
            ->pathIs('/1.1.2/Account/Get/11?companyId=8&apikey=%7Bkey%7D')
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
            'GET',
            'http://localhost:8082/1.1.2/Account/Get/11?companyId=8&apikey=%7Bkey%7D',
            [ 'key' => 'value' ]
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
            json_decode($data),
            $request->request('GET', 'Account', 'Get/11', ['key' => 'value'])
        );
    }

    public function testRequestPostWithJson()
    {
        $parameters = ['data123' => 'value'];
        $data = '{\'key\':\'data\'}';

        $this->http->mock
            ->when()
            ->methodIs('POST')
            ->pathIs('/1.1.2/Account/Save?apikey=%7Bkey%7D')
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
            'http://localhost:8082/1.1.2/Account/Save?apikey=%7Bkey%7D',
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

        $this->assertEquals(
            json_decode($data),
            $request->request('POST', 'Account', 'Save', [], $parameters)
        );
    }

    public function testRequestDelete()
    {
        $this->http->mock
            ->when()
            ->methodIs('DELETE')
            ->pathIs('/1.1.2/Account/Delete/11?apikey=%7Bkey%7D')
            ->then()
            ->statusCode(204)
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
            'http://localhost:8082/1.1.2/Account/Delete/11?apikey=%7Bkey%7D',
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

        $response = $request->request('DELETE', 'Account', 'Delete/11', []);
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertEquals(null, (string)$response->getBody());
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
                        'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
                    ],
                    'query' => [
                        'apikey' => '%7Bkey%7D'
                    ]
                ],
                []
            )
            // TODO not the actual response...
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
                        'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
                    ],
                    'query' => [
                        'apikey' => '%7Bkey%7D'
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
