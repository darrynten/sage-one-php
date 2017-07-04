<?php

namespace DarrynTen\SageOne\Tests\SageOne;

use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Request\RequestHandler;
use DarrynTen\SageOne\Exception\ApiException;
use DarrynTen\SageOne\Exception\ExceptionMessages;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class ApiExceptionTest extends \PHPUnit_Framework_TestCase
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

    public function testApiExceptionMessages()
    {
        $this->assertEquals(10, sizeof(ExceptionMessages::$strings));
    }

    public function testBadVerbException()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(405);

        $request = new RequestHandler($this->config);
        $request->request('XXX', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiException()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);

        $request = new RequestHandler($this->config);
        $request->request('GET', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiPostException()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);

        $request = new RequestHandler($this->config);
        $request->request('POST', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiPutException()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);

        $request = new RequestHandler($this->config);
        $request->request('PUT', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiDeleteException()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);

        $request = new RequestHandler($this->config);
        $request->request('DELETE', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiJsonException()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode('419');
        $this->expectExceptionMessage('419: I\'m a teapot - Teapot - errors: {"code":419}');

        throw new ApiException(
            json_encode(
                [
                    'errors' => [
                        'code' => 419,
                    ],
                    'status' => '419',
                    'title' => 'I\'m a teapot',
                    'detail' => 'Teapot'
                ]
            ),
            419
        );
    }

    public function testApi400()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/400?apikey=key')
            ->then()
                ->statusCode(400)
                // TODO actual error responses
                ->body('{}')
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/400?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '400: A malformed request was sent through or when a '
                  . 'validation rule failed. Validation messages are returned '
                  . 'in the response body. - Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/400?apikey=key` '
                  . "resulted in a `400 Bad Request` response:\n{}";

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(400);

        $request->request('GET', 'Fail', '400');
    }

    public function testApi401()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/401?apikey=key')
            ->then()
                ->statusCode(401)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/401?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '401: The user is not correctly authenticated and the call '
                  . 'requires authentication. The user does not have access '
                  . 'rights for this method. - Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/401?apikey=key` '
                  . 'resulted in a `401 Unauthorized` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(401);

        $request->request('GET', 'Fail', '401');
    }

    public function testApi402()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/402?apikey=key')
            ->then()
                ->statusCode(402)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/402?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '402: The registration has expired and payment is required. '
                  . '- Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/402?apikey=key` '
                  . 'resulted in a `402 Payment Required` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(402);

        $request->request('GET', 'Fail', '402');
    }

    public function testApi404()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/404?apikey=key')
            ->then()
                ->statusCode(404)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/404?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '404: The requested entity was not found. Entities are '
                  . 'bound to companies. Ensure the entity belongs to the '
                  . 'company. - Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/404?apikey=key` '
                  . 'resulted in a `404 Not Found` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(404);

        $request->request('GET', 'Fail', '404');
    }

    public function testApi405()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/405?apikey=key')
            ->then()
                ->statusCode(405)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/405?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '405: HTTP Verb is not specified or incorrect verb is used. '
                  . 'Or The user does not have access to the specified method. '
                  . 'This applies to invited users. - Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/405?apikey=key` '
                  . 'resulted in a `405 Method Not Allowed` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(405);

        $request->request('GET', 'Fail', '405');
    }

    public function testApi409()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/409?apikey=key')
            ->then()
                ->statusCode(409)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/409?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '409: Attempting to delete an item that is currently in use. '
                  . '- Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/409?apikey=key` '
                  . 'resulted in a `409 Conflict` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(409);

        $request->request('GET', 'Fail', '409');
    }

    public function testApi415()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/415?apikey=key')
            ->then()
                ->statusCode(415)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/415?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '415: A valid Content-Type header such as application/json '
                  . 'is required on all requests. - Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/415?apikey=key` '
                  . 'resulted in a `415 Unsupported Media Type` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(415);

        $request->request('GET', 'Fail', '415');
    }

    public function testApi429()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/429?apikey=key')
            ->then()
                ->statusCode(429)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/429?apikey=key',
                []
            );
        } catch (ClientException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '429: The limit of 100 requests per minute per company is '
                  . 'exceeded or more there are more than 20 failed login '
                  . 'attempts. - Client error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/429?apikey=key` '
                  . 'resulted in a `429 Too Many Requests` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(429);

        $request->request('GET', 'Fail', '429');
    }

    public function testApi500()
    {
        $this->http->mock
            ->when()
                ->methodIs('GET')
                ->pathIs('/1.1.2/Fail/500?apikey=key')
            ->then()
                ->statusCode(500)
                // TODO actual error responses
                ->body(null)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        /**
         * We make a local client to connect to our mock and get the
         * expected result
         */
        $localClient = new Client();

        try {
            $localClient->request(
                'GET',
                'http://localhost:8082/1.1.2/Fail/500?apikey=key',
                []
            );
        } catch (ServerException $exception) {
        }

        /**
         * We then make a mock client, and tell the mock client that it
         * should return what the local client got from the mock
         */
        $mockClient = \Mockery::mock(
            'Client'
        );

        $mockClient->shouldReceive('request')
            ->once()
            ->andThrow($exception);

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

        $expected = '500: Internal server error - Server error: '
                  . '`GET http://localhost:8082/1.1.2/Fail/500?apikey=key` '
                  . 'resulted in a `500 Internal Server Error` response';

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage($expected);
        $this->expectExceptionCode(500);

        $request->request('GET', 'Fail', '500');
    }



    // test requests
}
