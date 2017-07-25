<?php

namespace DarrynTen\SageOne;

use DarrynTen\SageOne\Exception\ConfigException;
use Psr\Cache\CacheItemPoolInterface;
use DarrynTen\SageOne\Exception\ApiException;

/**
 * SageOne Config
 *
 * @category Configuration
 * @package  SageOnePHP
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */
class Config
{
    /**
     * SageOne key
     *
     * @var string $apiKey
     */
    private $key = null;

    /**
     * The username
     *
     * @var string $username
     */
    private $username = null;

    /**
     * Password
     *
     * @var string $password
     */
    private $password = null;

    /**
     * Company ID
     *
     * Individual customer calls require this to be set.
     *
     * Off by default
     *
     * @var int $companyId
     */
    private $companyId = null;

    /**
     * The api version
     *
     * API version to connect to
     *
     * @var string $model
     */
    public $version = '1.1.2';

    /**
     * The project ID
     *
     * @var string $projectId
     */
    public $endpoint = '//accounting.sageone.co.za';

    /**
     * Whether or not to use caching.
     *
     * The default is true as this is a good idea.
     *
     * @var boolean $cache
     */
    public $cache = true;

    /**
     * Rate Limit
     *
     * All Sage One companies have a request limit of 5000 API requests
     * per day. A maximum of 100 results will be returned for list
     * methods, regardless of the parameter sent through.
     *
     * @var int $rateLimit
     */
    public $rateLimit = 5000;

    /**
     * Rate Limit Period (in seconds)
     *
     * 1 day = 60 * 60 * 24 = 86400
     *
     * @var int $rateLimitPeriod
     */
    public $rateLimitPeriod = 86400;

    /**
     * The number of times to retry failed calls
     *
     * @var integer $retries
     */
    public $retries = 3;

    /**
     * Construct the config object
     *
     * @param array $config An array of configuration options
     */
    public function __construct($config)
    {
        // Throw exceptions on essentials
        $this->checkAndSetEssentials($config);

        // optionals
        $this->checkAndSetOverrides($config);
    }

    /**
     * Check and set essential configuration elements.
     *
     * Required:
     *
     *   - API Key
     *   - Username
     *   - Password
     *
     * @param array $config An array of configuration options
     */
    private function checkAndSetEssentials($config)
    {
        if (!isset($config['username']) || empty($config['username'])) {
            throw new ConfigException(ConfigException::MISSING_USERNAME);
        }
        if (!isset($config['password']) || empty($config['password'])) {
            throw new ConfigException(ConfigException::MISSING_PASSWORD);
        }
        if (!isset($config['key']) || empty($config['key'])) {
            throw new ConfigException(ConfigException::MISSING_API_KEY);
        }

        $this->username = (string)$config['username'];
        $this->password = (string)$config['password'];
        $this->key = (string)$config['key'];
    }

    /**
     * Check and set any overriding elements.
     *
     * Optionals:
     *
     *   - Version
     *   - Endpoint
     *   - Caching
     *   - Rate Limit
     *   - Rate Limit Window
     *   - Error Retries
     *
     * @param array $config An array of configuration options
     */
    private function checkAndSetOverrides($config)
    {
        if (isset($config['companyId']) && !empty($config['companyId'])) {
            $this->companyId = (string)$config['companyId'];
        }

        if (isset($config['version']) && !empty($config['version'])) {
            $this->version = (string)$config['version'];
        }

        if (isset($config['endpoint']) && !empty($config['endpoint'])) {
            $this->endpoint = (string)$config['endpoint'];
        }

        if (isset($config['cache'])) {
            $this->cache = (bool)$config['cache'];
        }

        /**
         * TODO
         *
        if (isset($config['rate_limit']) && !empty($config['rate_limit'])) {
            $this->rateLimit = (int)$config['rateLimit'];
        }

        if (isset($config['rate_limit_period']) && !empty($config['rate_limit_period'])) {
            $this->rateLimitPeriod = (int)$config['rateLimitPeriod'];
        }

        if (isset($config['retries']) && !empty($config['retries'])) {
            $this->retries = (int)$config['retries'];
        }
        *
         */
    }

    /**
     * Retrieves the expected config for the API
     *
     * @return array
     */
    public function getRequestHandlerConfig()
    {
        $config = [
            'key' => $this->key,
            'username' => $this->username,
            'password' => $this->password,
            'endpoint' => $this->endpoint,
            'version' => $this->version,
            'companyId' => $this->companyId,
        ];

        return $config;
    }
}
