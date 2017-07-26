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
use DarrynTen\SageOne\Models\ModelCollection;

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
    use Validation;
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
     * Features HTTP methods
     * Not all models follow same conventions like GET for all()
     * Example AccountBalance all() requires POST method
     * or SupplierStatement get() requires POST method
     * @var array $featureMethods
     */
    protected $featureMethods = [
        'all' => 'GET',
        'get' => 'GET',
        'save' => 'POST',
        'delete' => 'DELETE'
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
    protected $fieldsData = [];

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
        if (!array_key_exists($key, $this->fields)) {
            $this->throwException(ModelException::GETTING_UNDEFINED_PROPERTY, sprintf('key %s', $key));
        }

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
     * @param array $parameters Some models support passing arguments to all()
     * @return ModelCollection A collection of entities
     */
    public function all(array $parameters = [])
    {
        if (!$this->features['all']) {
            $this->throwException(ModelException::NO_GET_ALL_SUPPORT);
        }

        $results = $this->request->request($this->featureMethods['all'], $this->endpoint, 'Get', $parameters);

        return new ModelCollection(static::class, $this->config, $results);
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

        $result = $this->request->request($this->featureMethods['get'], $this->endpoint, sprintf('Get/%s', $id));

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
     * @return bool
     */
    public function delete(string $id)
    {
        if (!$this->features['delete']) {
            $this->throwException(ModelException::NO_DELETE_SUPPORT, sprintf('id %s', $id));
        }

        // On success it returns 204 HTTP code with empty body
        $response = $this->request->request(
            $this->featureMethods['delete'],
            $this->endpoint,
            sprintf('Delete/%s', $id)
        );
        if ($response->getStatusCode() === 204) {
            return true;
        }
        return false;
    }

    /**
     * Submits a save call to Sage
     *
     * TODO: Actually perform this action!
     *
     * @param array $parameters some models support passing arguments to save()
     * @return stdClass Representaion of response
     */
    public function save(array $parameters = [])
    {
        if (!$this->features['save']) {
            $this->throwException(ModelException::NO_SAVE_SUPPORT);
        }

        // TODO Submission Body and Validation
        $data = $this->request->request($this->featureMethods['save'], $this->endpoint, 'Save', $parameters);

        return $data;
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
        return json_encode($this->toObject(), JSON_PRESERVE_ZERO_FRACTION);
    }

    /**
     * Returns array representation of the Model
     *
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->toJson(), true);
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
        /**
         * Very special case
         * In CommercialDocumentLine (field '$TrackingCode')
         */
        if ($remoteKey[0] === '$') {
            $remoteKey[1] = strtoupper($remoteKey[1]);
        }

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
        if ($this->isValidPrimitive($value, $config['type'])) {
            return $this->$key;
        }

        // If it's a date we return a valid format
        if ($config['type'] === 'DateTime') {
            return $value->format('Y-m-d');
        }

        if (isset($config['collection']) && $config['collection'] === true) {
            return $this->prepareModelCollection($config, $value);
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
     * Turns the model collection into an array of models
     *
     * @param array $config The config for the model
     * @param ModelCollection $value Collection which is converted into array
     * @return array
     */
    private function prepareModelCollection(array $config, ModelCollection $value)
    {
        $class = $this->getModelWithNamespace($config['type']);
        if (!class_exists($class)) {
            $this->throwException(ModelException::COLLECTION_WITHOUT_CLASS, sprintf(
                'Class "%s" for collection does not exist',
                $class
            ));
        }
        $rows = [];
        foreach ($value->results as $result) {
            $rows[] = $result->toObject();
        }
        return $rows;
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
        if ($this->isValidPrimitive($resultItem, $config['type'])) {
            return $resultItem;
        }

        // If it's a date we return a new DateTime object
        if ($config['type'] === \DateTime::class) {
            return new \DateTime($resultItem);
        }

        if (isset($config['collection']) && $config['collection'] === true) {
            $class = $this->getModelWithNamespace($config['type']);
            if (!class_exists($class)) {
                $this->throwException(ModelException::COLLECTION_WITHOUT_CLASS, sprintf(
                    'class "%s"',
                    $class
                ));
            }
            return new ModelCollection($class, $this->config, $resultItem);
        }

        // If it's null and it's allowed to be null
        if (is_null($resultItem) && ($config['nullable'] === true)) {
            return null;
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
        // We only care about entries that are defined in the model
        foreach ($this->fields as $key => $config) {
            $remoteKey = $this->getRemoteKey($key);

            // If the payload is missing an item
            if (!property_exists($result, $remoteKey)) {
                if (isset($config['optional']) && $config['optional'] === true) {
                    // this field can be omitted in SageOne response
                    continue;
                }
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
        // If it is and can be null
        if (is_null($value) && ($this->fields[$key]['nullable'] === true)) {
            return;
        }

        // If values have a defined min/max then validate
        if ((array_key_exists('min', $this->fields[$key])) && (array_key_exists('max', $this->fields[$key]))) {
            $this->validateRange($value, $this->fields[$key]['min'], $this->fields[$key]['max']);
        }

        // If values should be from an enumarable list
        if (array_key_exists('enum', $this->fields[$key])) {
            $this->validateEnum($value, $this->{$this->fields[$key]['enum']});
        }

        // If values have a defined regex then validate
        if (array_key_exists('regex', $this->fields[$key])) {
            $this->validateRegex($value, $this->fields[$key]['regex']);
        }

        if (array_key_exists('validate', $this->fields[$key])) {
            $this->validateFilterVar($value, $this->fields[$key]['validate']);
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
