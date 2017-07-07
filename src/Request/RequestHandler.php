<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Request;

use DarrynTen\SageOne\Exception\ApiException;
use DarrynTen\SageOne\Exception\ExceptionMessages;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * RequestHandler Class
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */
class RequestHandler
{
    /**
     * GuzzleHttp Client
     *
     * @var Client $client
     */
    private $client;

    /**
     * The SageOne url
     *
     * @var string $endpoint
     */
    private $endpoint = '//accounting.sageone.co.za';

    /**
     * The version of the SageOne API
     *
     * @var string $version
     */
    private $version = '1.1.2';

    /**
     * SageOne username
     *
     * @var string $username
     */
    private $username;

    /**
     * SageOne password
     *
     * @var string $username
     */
    private $password;

    /**
     * The api key
     *
     * @var string $key
     */
    private $key;

    /**
     * SageOne Token
     *
     * @var string $token
     */
    private $token;

    /**
     * SageOne Token type
     *
     * @var string $token
     */
    private $tokenType;

    /**
     * Valid HTTP Verbs for this API
     *
     * @var array $verbs
     */
    private $verbs = [
        'GET',
        'POST',
        'PUT',
        'DELETE'
    ];

    /**
     * Request handler constructor
     *
     * @param array $config The connection config
     */
    public function __construct(array $config)
    {
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->key = $config['key'];
        $this->endpoint = $config['endpoint'];
        $this->version = $config['version'];

        if (array_key_exists('companyId', $config)) {
            $this->companyId = $config['companyId'];
        }

        $this->client = new Client();
    }

    /**
     * Makes a request using Guzzle
     *
     * @param string $verb The HTTP request verb (GET/POST/etc)
     * @param string $service The api service
     * @param string $method The services method
     * @param array $options Request options
     * @param array $parameters Request parameters
     *
     * @see RequestHandler::request()
     *
     * @return array
     * @throws ApiException
     */
    public function handleRequest(string $method, string $uri, array $options, array $parameters = [])
    {
        if (!in_array($method, $this->verbs)) {
            throw new ApiException('405 Bad HTTP Verb', 405);
        }

        if (!empty($parameters)) {
            if ($method === 'GET') {
                // Send as get params
                foreach ($parameters as $key => $value) {
                    $options['query'][$key] = $value;
                }
            } elseif ($method === 'POST' || $method === 'PUT' || $method === 'DELETE') {
                // Otherwise send JSON in the body
                $options['json'] = (object)$parameters;
            }
        }

        // Let's go
        try {
            $response = $this->client->request($method, $uri, $options);
        } catch (RequestException $exception) {
            $this->handleException($exception);
        }

        return json_decode($response->getBody());
    }

    /**
     * Handles all API exceptions, and adds the official exception terms
     * to the message.
     *
     * @param RequestException the original exception
     *
     * @throws ApiException
     */
    private function handleException($exception)
    {
        $code = $exception->getCode();
        $message = $exception->getMessage();

        $title = sprintf(
            '%s: %s - %s',
            $code,
            ExceptionMessages::$strings[$code],
            $message
        );

        throw new ApiException($title, $exception->getCode(), $exception);
    }

    /**
     * Get token for SageOne API requests
     *
     * @return string
     */
    private function getAuthToken()
    {
        // Generate a new token if current is expired or empty
        if (!$this->token || !$this->tokenType) {
            $this->requestToken();
        }

        return $this->tokenType . ' ' . $this->token;
    }

    /**
     * Make request to SageOne API for the new token
     */
    private function requestToken()
    {
        $this->token = base64_encode($this->username . ':' . $this->password);
        $this->tokenType = 'Basic';
    }

    /**
     * Makes a request to SageOne
     *
     * @param string $method The API method
     * @param string $path The path
     * @param array $parameters The request parameters
     *
     * @return []
     *
     * @throws ApiException
     */
    public function request(string $verb, string $service, string $method, array $parameters = [])
    {
        $options = [
            'headers' => [
                'Authorization' => $this->getAuthToken(),
            ],
        ];

        // We sometimes add a companyId to the URL
        if (isset($this->companyId) && !empty($this->companyId)) {
            $options['query']['CompanyId'] = $this->companyId;
        }

        // We always add the API key to the URL
        $options['query']['apikey'] = $this->key;

        // Append version to the endpoint
        $uri = sprintf(
            '%s/%s/%s/%s/',
            $this->endpoint,
            $this->version,
            $service,
            $method
        );

        return $this->handleRequest(
            $verb,
            $uri,
            $options,
            $parameters
        );
    }
}
