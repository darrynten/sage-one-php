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

abstract class BaseModel
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

    /**
     * Valid primitive types
     *
     * Used to verify field definitions
     *
     * @var array $validPrimitiveTypes
     */
    private $validPrimitiveTypes = [
        'string',
        'integer',
        'boolean',
        'double',
    ];

    protected $config;

    public function __construct(array $config)
    {
        // TODO can't be spawning a million of these and passing in
        // config the whole time
        $this->request = new RequestHandler($config);
        $this->config = $config;
    }

    public function __set($key, $value)
    {
        if ($key === 'config') {
            $this->config = $config;
            return;
        }

        if (!array_key_exists($key, $this->fields)) {
            $this->throwException(ModelException::SETTING_UNDEFINED_PROPERTY, sprintf('key %s', $key));
        }

        if ($this->fields[$key]['persistable'] === false) {
            $this->throwException(ModelException::SETTING_READ_ONLY_PROPERTY, sprintf('key %s', $key));
        }

        $this->$key = $value;
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
            $this->throwException(ModelException::NO_GET_ALL_SUPPORT);
        }

        $results = $this->request->request('GET', $this->endpoint, 'Get');

        return json_encode($results);
    }

    public function throwException($code, $message = '')
    {
        throw new ModelException($this->endpoint, $code, $message);
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
            $this->throwException(ModelException::NO_GET_ONE_SUPPORT, sprintf('id %s', $id));
        }

        $result = $this->request->request('GET', $this->endpoint, sprintf('Get/%s', $id));

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
        if (!$this->features['all']) {
            $this->throwException(ModelException::NO_DELETE_SUPPORT, sprintf('id %s', $id));
        }

        $this->request->request('DELETE', $this->endpoint, sprintf('Delete/%s', $id));
    }

    public function save()
    {
        if (!$this->features['all']) {
            $this->throwException(ModelException::NO_SAVE_SUPPORT);
        }

        // TODO
        $this->request->request('POST', $this->endpoint, 'Save');
    }

    public function toJson()
    {
        return json_encode($this->toObject());
    }

    /**
     * Switches between our id format and sages id format
     *
     * Sage is PascalCase ours is camelCase
     *
     * @var string $localKey
     */
    private function getRemoteKey($localKey)
    {
        $remoteKey = ucfirst($localKey);

        // Unless id - theirs is uppercase ours is lowercase
        if ($localKey === 'id') {
            $remoteKey = 'ID';
        }

        return $remoteKey;
    }

    private function prepareObjectRow($key, $config)
    {
        if (is_null($this->$key) && $this->fields[$key]['nullable']) {
            return null;
        }

        if (is_null($this->$key) && !$this->fields[$key]['nullable']) {
            $this->throwException(ModelException::NULL_WITHOUT_NULLABLE, sprintf('key %s', $key));
        }

        if ($this->isValidPrimitive($this->$key, $config['type'])) {
            return $this->$key;
        }

        // If it's a date we return a valid format
        if ($config['type'] === 'DateTime') {
            return $this->$key->format('Y-m-d');
        }

        $class = $this->getModelWithNamespace($config['type']);

        // So if the class doesn't exist, throw
        if (!class_exists($class)) {
            $this->throwException(ModelException::UNEXPECTED_PREPARE_CLASS, sprintf(
                'Received unexpected namespaced class "%s" with config "%s" when preparing an object row',
                $class,
                var_dump($config)
            ));
        }

        return $this->$key->toObject();
    }

    private function toObject()
    {
        $result = [];
        foreach ($this->fields as $localKey => $config) {
            $remoteKey = $this->getRemoteKey($localKey);
            $result[$remoteKey] = $this->prepareObjectRow($localKey, $config);
        }
        return $result;
    }

    /**
     * Check if the type matches a valid primitive
     *
     * @var string $type
     */
    private function isValidPrimitive($resultItem, $definedType)
    {
        // The type of the item matches the required type
        $itemType = gettype($resultItem);
        if (in_array($itemType, $this->validPrimitiveTypes) && ($itemType === $definedType)) {
            return true;
        }

        return false;
    }

    private function processResultItem($resultItem, $config)
    {
        if ($this->isValidPrimitive($resultItem, $config['type'])) {
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
            $this->throwException(ModelException::PROPERTY_WITHOUT_CLASS, sprintf(
                'Received namespaced class "%s" with config "%s" when resultitem "%s" has actual type "%s"',
                $class,
                var_dump($config),
                var_dump($resultItem),
                gettype($resultItem)
            ));
        }

        // Make a new instance of the class and load the item
        $instance = new $class($this->config);
        $instance->loadResult($resultItem);

        return $instance;
    }

    public function loadResult(\stdClass $result)
    {
        foreach ($this->fields as $key => $config) {
            $remoteKey = $this->getRemoteKey($key);

            if (!property_exists($result, $remoteKey)) {
                $this->throwException(ModelException::INVALID_LOAD_RESULT_PAYLOAD, sprintf(
                    'Defined key "%s" not present in payload',
                    $key
                ));
            }

            $value = $this->processResultItem($result->$remoteKey, $config);

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
