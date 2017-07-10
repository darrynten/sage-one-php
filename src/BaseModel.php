<?php
/**
 * SageOne Library - Base Model
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 * @version  PHP 7+
 */

namespace DarrynTen\SageOne;

use DarrynTen\SageOne\Request\RequestHandler;
use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Validation;

/**
 * This is the base class for all the Sage Models.
 *
 * This class covers all/get/save/delete calls for all models that require it.
 *
 * It also handles conversion between our Model objects, and JSON that is
 * compliant with the Sage API format.
 *
 * In order to provide ORM type functionality we support re-hydrating any
 * model with its defined JSON fragment.
 */
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
     * A models configuration is stored here
     *
     * @var array $config
     */
    protected $config = null;

    /**
     * A models fields are stored here
     *
     * @var array $fieldsData
     */
    private $fieldsData = [];

    /**
     * Make a new model
     *
     * Setup a request handler and bind the config
     *
     * @param array $config The config for the model
     */
    public function __construct(array $config)
    {
        // TODO can't be spawning a million of these and passing in
        // config the whole time
        $this->request = new RequestHandler($config);
        $this->config = $config;
    }

    /**
     * Ensure attempted sets are valid
     *
     * The key has to be defined in the field map
     * The key needs to be checked if it is read only
     * The key cannot set null if it is not nullable
     * The value for the key must pass validation
     *
     * @var string $key The property
     * @var mixed $value The desired value
     */
    public function __set($key, $value)
    {
        $this->checkDefined($key, $value);
        $this->checkReadOnly($key, $value);
        $this->checkNullable($key, $value);
        $this->checkValidation($key, $value);

        $this->fieldsData[$key] = $value;
    }

    /**
     * __get
     *
     * @param string $key Desired property
     *
     * @thows ModelException
     */
    public function __get($key)
    {
        if (array_key_exists($key, $this->fields)) {
            // there is some data loaded so we return it
            if (array_key_exists($key, $this->fieldsData)) {
                return $this->fieldsData[$key];
            }

            // there is some default value
            if (array_key_exists('default', $this->fields[$key])) {
                return $this->fields[$key]['default'];
            }

            // Accessing $obj->key when no default data is set returns null
            // so we return it as default value for any described but not loaded property
            return null;
        }

        $this->throwException(ModelException::GETTING_UNDEFINED_PROPERTY, sprintf('key %s', $key));
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
     * @param integer $id The ID to delete
     *
     * @return void
     */
    public function delete(string $id)
    {
        if (!$this->features['delete']) {
            $this->throwException(ModelException::NO_DELETE_SUPPORT, sprintf('id %s', $id));
        }

        // TODO Response handle?
        $this->request->request('DELETE', $this->endpoint, sprintf('Delete/%s', $id));
    }

    /**
     * Submits a save call to Sage
     *
     * TODO: Actually perform this action!
     *
     * @return stdClass Representaion of response
     */
    public function save()
    {
        if (!$this->features['save']) {
            $this->throwException(ModelException::NO_SAVE_SUPPORT);
        }

        // TODO Submission Body and Validation
        return $this->request->request('POST', $this->endpoint, 'Save');
    }

    /**
     * Returns a JSON representation of the Model
     *
     * Conforms 100% to Sage responses and can load into other copies
     *
     * @return string JSON representation of the Model
     */
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
     *
     * @return string Remote key
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

    /**
     * Prepare an object row for export
     *
     * @var string $key The objects key
     * @var array $config The configuration for the object field
     *
     * @return mixed
     */
    private function prepareObjectRow($key, $config)
    {
        $value = $this->__get($key);

        // If null and allowed to be null, return null
        if (is_null($value) && $this->fields[$key]['nullable']) {
            return null;
        }

        // If null and can't be null then throw
        if (is_null($value) && !$this->fields[$key]['nullable']) {
            $this->throwException(ModelException::NULL_WITHOUT_NULLABLE, sprintf('key %s', $key));
        }

        // If it's a valid primitive
        if (Validation::isValidPrimitive($value, $config['type'])) {
            return $this->$key;
        }

        // If it's a date we return a valid format
        if ($config['type'] === 'DateTime') {
            return $value->format('Y-m-d');
        }

        // At this stage we would be dealing with a related Model
        $class = $this->getModelWithNamespace($config['type']);

        // So if the class doesn't exist, throw
        if (!class_exists($class)) {
            $this->throwException(ModelException::UNEXPECTED_PREPARE_CLASS, sprintf(
                'Received unexpected namespaced class "%s" when preparing an object row',
                $class
            ));
        }

        // And finally return an Object representation of the related Model
        return $value->toObject();
    }

    /**
     * Turns the model into an object for exporting.
     *
     * Loops through valid fields and exports only those, so as to match the
     * Sage API responses.
     *
     * @return object
     */
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
     * Process an item during loading a payload
     *
     * @var $resultItem The item to load
     * @var $config The configuration for the item
     *
     * @return mixed
     */
    private function processResultItem($resultItem, $config)
    {
        if (Validation::isValidPrimitive($resultItem, $config['type'])) {
            return $resultItem;
        }

        // If it's a date we return a new DateTime object
        if ($config['type'] === \DateTime::class) {
            return new \DateTime($resultItem);
        }

        // At this stage, any type is going to be a model that needs to be loaded
        $class = $this->getModelWithNamespace($config['type']);

        // So if the class doesn't exist, throw
        if (!class_exists($class)) {
            $this->throwException(ModelException::PROPERTY_WITHOUT_CLASS, sprintf(
                'Received namespaced class "%s" when defined type is "%s"',
                $class,
                gettype($resultItem),
                $resultItem
            ));
        }

        // Make a new instance of the class and load the item
        $instance = new $class($this->config);
        $instance->loadResult($resultItem);

        // Return that instance
        return $instance;
    }

    /**
     * Loads up a result from an object
     *
     * The object can be created by json_decode of a Sage response
     *
     * Used for restoring and loading related models
     *
     * @var object $result A raw object representation
     */
    public function loadResult(\stdClass $result)
    {
        // We only care about entires that are defined in the model
        foreach ($this->fields as $key => $config) {
            $remoteKey = $this->getRemoteKey($key);

            // If the payload is missing an item
            if (!property_exists($result, $remoteKey)) {
                $this->throwException(ModelException::INVALID_LOAD_RESULT_PAYLOAD, sprintf(
                    'Defined key "%s" not present in payload',
                    $key
                ));
            }

            $value = $this->processResultItem($result->$remoteKey, $config);

            // This is similar to __set but it can fill read only fields
            $this->checkDefined($key, $value);
            $this->checkNullable($key, $value);
            $this->checkValidation($key, $value);

            $this->fieldsData[$key] = $value;
        }
    }

    /**
     * Ensure the field is defined
     *
     * @var string $key
     * @var string|integer $value
     * @thows ModelException
     */
    private function checkDefined($key, $value)
    {
        if (!array_key_exists($key, $this->fields)) {
            $this->throwException(ModelException::SETTING_UNDEFINED_PROPERTY, sprintf('key %s value %s', $key, $value));
        }
    }

    /**
     * Check if the field is read only
     *
     * @var string $key
     * @var string|integer $value
     * @thows ModelException
     */
    private function checkReadOnly($key, $value)
    {
        if ($this->fields[$key]['readonly']) {
            $this->throwException(ModelException::SETTING_READ_ONLY_PROPERTY, sprintf('key %s value %s', $key, $value));
        }
    }

    /**
     * Check if the field can be set to null
     *
     * @var string $key
     * @var string|integer $value
     * @thows ModelException
     */
    private function checkNullable($key, $value)
    {
        if (!$this->fields[$key]['nullable'] && is_null($value)) {
            $this->throwException(ModelException::NULL_WITHOUT_NULLABLE, sprintf('attempting to nullify key %s', $key));
        }
    }

    /**
     * Check min-max and regex validation
     *
     * @var string $key
     * @var string|integer $value
     * @thows ModelException
     */
    private function checkValidation($key, $value)
    {
        // If values have a defined min/max then validate
        if ((array_key_exists('min', $this->fields[$key])) && (array_key_exists('max', $this->fields[$key]))) {
            Validation::validateRange($value, $this->fields[$key]['min'], $this->fields[$key]['max']);
        }

        // If values have a defined regex then validate
        if (array_key_exists('regex', $this->fields[$key])) {
            Validation::validateRegex($value, $this->fields[$key]['regex']);
        }
    }

    /**
     * Properly handles and throws ModelExceptions
     *
     * @var integer $code The exception code
     * @var string $message Any additional information
     *
     * @throws ModelException
     */
    public function throwException($code, $message = '')
    {
        throw new ModelException($this->endpoint, $code, $message);
    }

    /**
     * Used to determine namespace for related models
     *
     * @var string Name of the model
     *
     * @return string The full namespace for a Model
     */
    private function getModelWithNamespace(string $model)
    {
        return sprintf(
            '%s\Models\%s',
            __NAMESPACE__,
            $model
        );
    }
}
