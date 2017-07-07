<?php
/**
 * SageOne
 *
 * @category Base
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne;

use DarrynTen\SageOne\Config;
use DarrynTen\SageOne\Request\RequestHandler;
use DarrynTen\AnyCache\AnyCache;

/**
 * Base class for SageOne manipulation
 *
 * @package SageOne
 */
class SageOne
{
    /**
     * Configuration
     *
     * @var Config $config
     */
    public $config;

    /**
     * API Request Handler
     *
     * @var RequestHandler $request
     */
    private $request;

    /**
     * The local cache
     *
     * @var AnyCache $cache
     */
    private $cache;

    /**
     * SageOne constructor
     *
     * @param array $config The API client config details
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
        $this->cache = new AnyCache();
        $this->request = new RequestHandler($this->config->getRequestHandlerConfig());
    }

    /**
     * @return RequestHandler
     */
    public function getRequest()
    {
        return $this->request;
    }
}
