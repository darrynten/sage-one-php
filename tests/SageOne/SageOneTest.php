<?php

namespace DarrynTen\SageOne\Tests\SageOne;

use DarrynTen\SageOne\SageOne;
use DarrynTen\SageOne\Request\RequestHandler;
use DarrynTen\SageOne\Exception\ApiException;
use DarrynTen\SageOne\Tests\SageOne\Helpers\DataHelper;

class SageOneTest extends \PHPUnit_Framework_TestCase
{
    use DataHelper;

    /**
     * @var SageOne
     */
    private $sage;

    /**
     * @var array
     */
    private $config = [
      'username' => 'xxx',
      'password' => 'xxx',
      'key' => 'xxx',
    ];

    public function setUp()
    {
        $this->sage = new SageOne($this->config);

        $this->assertEquals($this->sage->config->version, '1.1.2');
        $this->assertEquals($this->sage->config->endpoint, '//accounting.sageone.co.za');
        $this->assertEquals($this->sage->config->cache, true);
        $this->assertEquals($this->sage->config->rateLimit, 5000);
        $this->assertEquals($this->sage->config->rateLimitPeriod, 86400);
        $this->assertEquals($this->sage->config->retries, 3);

        $expected = [
            'key' => 'xxx',
            'username' => 'xxx',
            'password' => 'xxx',
            'endpoint' => '//accounting.sageone.co.za',
            'version' => '1.1.2',
            'companyId' => null
        ];
        $this->assertEquals($this->sage->config->getRequestHandlerConfig(), $expected);
    }

    public function testWithOverrides()
    {
        $this->sage = new SageOne([
            'key' => 'xxx',
            'username' => 'xxx',
            'password' => 'xxx',
            'endpoint' => 'xxx',
            'version' => 'xxx',
            'companyId' => 2,
            'cache' => false
        ]);

        $this->assertEquals($this->sage->config->version, 'xxx');
        $this->assertEquals($this->sage->config->endpoint, 'xxx');
        $this->assertEquals($this->sage->config->cache, false);

        $expected = [
            'key' => 'xxx',
            'username' => 'xxx',
            'password' => 'xxx',
            'endpoint' => 'xxx',
            'version' => 'xxx',
            'companyId' => 2
        ];
        $this->assertEquals($this->sage->config->getRequestHandlerConfig(), $expected);
    }

    public function testMissingUsername()
    {
        $this->expectException(ApiException::class);
        $request = new SageOne([]);
        $this->assertEquals($request->config->version, '1.1.2');
    }

    public function testMissingPassword()
    {
        $this->expectException(ApiException::class);
        $request = new SageOne([
            'username' => 'username'
        ]);
        $this->assertEquals($request->config->version, '1.1.2');
    }

    public function testMissingKey()
    {
        $this->expectException(ApiException::class);
        $request = new SageOne([
            'username' => 'username',
            'password' => 'password'
        ]);
        $this->assertEquals($request->config->version, '1.1.2');
    }

    public function testRequestGetterResult()
    {
        $this->assertInstanceOf(
            RequestHandler::class,
            $this->sage->getRequest()
        );
    }
}
