<?php
/**
 * SageOne Library - Base Model
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne;

use DarrynTen\SageOne\Request\RequestHandler;

class BaseModel
{
    protected $request;

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false
    ];

    public function __construct(array $config)
    {
        // TODO can't be spawning a million of these and passing in
        // config the whole time
        $this->request = new RequestHandler($config);
    }

    public function all()
    {
        if (!$this->features['all']) {
            throw new ModelException('Model does not support the `all` call', 101);
        }

        $results = $this->request->request('GET', $this->endpoint, 'Get');

        return $results;
    }

    public function get(string $id)
    {
        if (!$this->features['get']) {
            throw new ModelException('Model does not support the `get` call', 102);
        }
    }

    public function save()
    {
        if (!$this->features['save']) {
            throw new ModelException('Model does not support the `save` call', 103);
        }
    }

    public function delete()
    {
        if (!$this->features['delete']) {
            throw new ModelException('Model does not support the `delete` call', 104);
        }
    }

    public function loadFromJson(string $json)
    {
        $object = json_decode($json, true);

        foreach ($object as $key => $value) {
            $this->$key = $value;
        }
    }
}
