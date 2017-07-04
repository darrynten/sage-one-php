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
use DarrynTen\SageOne\Exception\ModelException;

// TODO Should be abstract
class BaseModel
{
    /**
     * A request object
     *
     * TODO this should be refactored out
     */
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
        $this->config = $config;
    }

    /**
     * Returns 'all' of something
     *
     * All methods that retrieve a collection follow the same pattern, and this
     * method here allows any compatible method to be called with something like:
     *
     * NB: Does not load an account into the class! Returns a raw representation
     * from the Sage API.
     *
     * $account = new Account;
     * $allAccounts = $account->all();
     *
     * @return json A collection of entities in raw json from Sage
     */
    public function all()
    {
        if (!$this->features['all']) {
            throw new ModelException('Model does not support the `all` call', 101);
        }

        $results = $this->request->request('GET', $this->endpoint, 'Get');

        return json_encode($results);
    }

    /**
     * Returns 'one' of something
     *
     * All methods that retrieve a single entity follow the same pattern, and this
     * method here allows any compatible method to be called with something like:
     *
     * $account = new Account;
     * $account->get(11);
     *
     * @return object A single entity
     */
    public function get(string $id)
    {
        if (!$this->features['get']) {
            throw new ModelException('Model does not support the `get` call', 102);
        }

        $result = $this->request->request('GET', $this->endpoint, sprintf('Get/%s', $id));

        // die(var_dump($resultObject));
        $this->loadResult($result);
    }

    /**
     * Delete an entity
     *
     * All methods that retrieve a single entity follow the same pattern, and this
     * method here allows any compatible method to be called with something like:
     *
     * $account = new Account;
     * $account->delete(11);
     *
     * @return void
     */
    public function delete(string $id)
    {
        if (!$this->features['delete']) {
            throw new ModelException('Model does not support the `delete` call', 104);
        }

        $result = $this->request->request('DELETE', $this->endpoint, sprintf('Delete/%s', $id));
    }

    public function save()
    {
        if (!$this->features['save']) {
            throw new ModelException('Model does not support the `save` call', 103);
        }

        $result = $this->request->request('POST', $this->endpoint, 'Save');
    }

    public function toJson()
    {
        return json_encode($this->toObject());
    }

    private function toObject()
    {
        $result = [];
        foreach ($this->fields as $key => $config) {
            if ($key === 'id') {
                $result['ID'] = $this->id;
            } else {
                $remoteKey = ucfirst($key);

                if ($config['type'] === gettype($this->$key)) {
                    $result[$remoteKey] = $this->$key;
                } else {
                    $class = $this->getModelWithNamespace($config['type']);

                    if ($config['type'] === 'DateTime') {
                        $result[$remoteKey] = $this->$key->format('Y-m-d');
                    } elseif (!class_exists($class)) {
                        die('class not exist');
                    } else {
                        // if (!$this->$key) {
                        // }
                        try {
                            var_dump($this->$key);
                            $result[$remoteKey] = $this->$key->toObject();
                        } catch (Exception $e) {
                            die(var_dump('NULL?', $key, $config, $result, $remoteKey, $e));
                          
                        }
                    }
                }
            }
        }
        return $result;
    }

    private function processResultItem($resultItem, $config)
    {
        // The type of the item matches the required type
        if ($config['type'] === gettype($resultItem)) {
            return $resultItem;
        }

        // If it's a date we return a new DateTime object
        if ($config['type'] === 'DateTime') {
            return new \DateTime($resultItem);
        }

        // At this stage, any type is going to be a model that needs to be loaded
        $class = $this->getModelWithNamespace($config['type']);

        // So if the class doesn't exist, throw
        if (!class_exists($class)) {
            die(var_dump('NO CLASS', $class, $config, gettype($resultItem), $resultItem));
            throw new ModelException('Model contains a model property defined without a corresponding class', 110);
        }

        // Make a new instance of the class and load the item
        $instance = new $class($this->config);

        return $instance->loadResult($resultItem);
    }

    public function loadResult(\stdClass $result)
    {
        foreach ($this->fields as $key => $config) {
            // Sage is PascalCase ours is camelCase
            $remoteKey = ucfirst($key);

            // Unless id - theirs is uppercase ours is lowercase
            if ($key === 'id') {
                $remoteKey = 'ID';
            }

            // Load up the value from the object
            $resultItem = $result->$remoteKey;

            $value = $this->processResultItem($resultItem, $config);

            $this->$key = $value;
        }
    }

    private function getModelWithNamespace(string $model)
    {
        return sprintf(
            '%s\Models\%s',
            __NAMESPACE__,
            $model
        );
    }
}
