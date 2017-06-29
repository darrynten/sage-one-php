<?php

namespace DarrynTen\SageOne\Tests\SageOne;

use DarrynTen\SageOne\Request\RequestHandler;
use DarrynTen\SageOne\Exception\ApiException;

class ApiExceptionTest extends \PHPUnit_Framework_TestCase
{
    private $config = [
        'username' => 'username',
        'password' => 'password',
        'key' => 'key',
        'endpoint' => '//localhost:8082',
        'version' => '1.1.2',
        'clientId' => null
    ];

    public function testApiException()
    {
        $this->expectException(ApiException::class);
        $request = new RequestHandler($this->config);
        $request->request('GET', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiPostException()
    {
        $this->expectException(ApiException::class);
        $request = new RequestHandler($this->config);
        $request->request('POST', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiPutException()
    {
        $this->expectException(ApiException::class);
        $request = new RequestHandler($this->config);
        $request->request('PUT', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiDeleteException()
    {
        $this->expectException(ApiException::class);
        $request = new RequestHandler($this->config);
        $request->request('DELETE', 'Fail', 'Fail', ['foo' => 'bar']);
    }

    public function testApiJsonException()
    {
        $this->expectException(ApiException::class);

        throw new ApiException(
            json_encode(
                [
                    'errors' => [
                        'code' => 1,
                    ],
                    'status' => '404',
                    'title' => 'Not Found',
                    'detail' => 'Detail'
                ]
            )
        );
    }

    // test requests
}
