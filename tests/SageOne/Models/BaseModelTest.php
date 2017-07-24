<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Request\RequestHandler;
use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use ReflectionClass;

use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Exception\ValidationException;

abstract class BaseModelTest extends \PHPUnit_Framework_TestCase
{
    use HttpMockTrait;

    protected $config = [
        'username' => 'username',
        'password' => 'password',
        'key' => 'key',
        'endpoint' => '//localhost:8082',
        'version' => '1.1.2',
        'companyId' => null
    ];

    public static function setUpBeforeClass()
    {
        static::setUpHttpMockBeforeClass('8082', 'localhost');
    }

    public static function tearDownAfterClass()
    {
        static::tearDownHttpMockAfterClass();
    }

    public function setUp()
    {
        $this->setUpHttpMock();
    }

    public function tearDown()
    {
        $this->tearDownHttpMock();
    }

    /**
     * Extracts className from path A\B\C\ClassName
     *
     * @param string $classPath Full path to the class
     */
    private function getClassName(string $class)
    {
        $classPath = explode('\\', $class);
        $className = $classPath[ count($classPath) - 1];
        return $className;
    }

    /**
     * Verifies that passed $class (as string) is instance of $class
     *
     * @param string $class Full path to the class
     */
    protected function verifyInstanceOf(string $class)
    {
        $request = new $class($this->config);
        $this->assertInstanceOf($class, $request);
    }

    /**
     * Verifies that when we try to set undefined property it throws expected exception
     *
     * @param string $class Full path to the class
     */
    protected function verifySetUndefined(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" key doesNotExist value xyz Attempting to set a property that is not defined in the model");
        $this->expectExceptionCode(10113);

        $model = new $class($this->config);
        $model->doesNotExist = 'xyz';
    }

    /**
     * Verifies that when we try to set readonly property it throws expected exception
     *
     * @param string $class Full path to the class
     * @param string $field Read only property
     */
    protected function verifySetReadOnly(string $class, string $field)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Model "%s" key %s value %s Attempting to set a read-only property',
                $className,
                $field,
                'some value'
            )
        );
        $this->expectExceptionCode(10114);

        $model = new $class($this->config);
        $model->{$field} = 'some value';
    }

    /**
     * Verifies that when we try to get undefined property it throws expected exception
     *
     * @param string $class Full path to the class
     */
    protected function verifyGetUndefined(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" key doesNotExist Attempting to get an undefined property");
        $this->expectExceptionCode(10116);

        $model = new $class($this->config);
        $throw = $model->doesNotExist;
    }

    /**
     * Verifies that when we try to set property to null and it can not be null it throws expected exception
     *
     * @param string $class Full path to the class
     * @param string $key Valid not nullable field for this class
     */
    protected function verifyCanNotNullify(string $class, string $key)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" attempting to nullify key {$key} Property is null without nullable permission");
        $this->expectExceptionCode(10111);

        $model = new $class($this->config);
        $model->{$key} = null;
    }

    /**
     * Verifies that when we try to set property to null and it can be null it does not throw exception
     *
     * @param string $class Full path to the class
     * @param string $key Valid nullable field for this class
     */
    protected function verifyCanNullify(string $class, string $key)
    {
        $className = $this->getClassName($class);

        $model = new $class($this->config);
        $model->{$key} = null;
        $this->assertNull($model->{$key});
    }

    /**
     * Verifies that when we try to load data for model without required fields it throws expected exception
     *
     * @param string $class Full path to the class
     * @param string $key Valid field for this $class (because of the loading logic it should be first field in $fields attribute after 'id'
     */
    protected function verifyBadImport(string $class, string $key)
    {
        $className = $this->getClassName($class);

        $model = new $class($this->config);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" Defined key \"{$key}\" not present in payload A property is missing in the loadResult payload");
        $this->expectExceptionCode(10112);

        $obj = new \stdClass;
        $obj->ID = 1;
        $model->loadResult($obj);
    }

    /**
     * Verifies that all fields has expected types, nullable and read only properties
     *
     * @param string $class Full path to the class
     * @param array $attributes
     *      Contains data in the following format
     *      ['name of the key' =>
     *          'type' => 'name of the type, like integer or DateTime',
     *          'nullable' => true, // if field can be null
     *          'readonly' => false // if field is not read only
     *      ]
     */
    protected function verifyAttributes(string $class, array $attributes)
    {
        $model = new $class($this->config);
        $className = $this->getClassName($class);

        // Endpoint
        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('endpoint');
        $reflectValue->setAccessible(true);
        $endpoint = $reflectValue->getValue($model);
        $this->assertEquals(
            $className,
            $endpoint,
            sprintf(
                'Model "%s" should have endpoint "%s" but got "%s"',
                $className,
                $className,
                $endpoint
            )
        );

        // Fields mapping
        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('fields');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue(new $class($this->config));

        $fieldsCount = count($attributes);

        $this->assertCount($fieldsCount, $value);

        foreach ($attributes as $name => $options) {
            $this->verifyIfOptionsAreValid($className, $name, $options);
            $this->verifyCommonAttributes($className, $name, $options, $value);
            $this->verifyMinMaxAttributes($className, $name, $options, $value);
            $this->verifyRequiredAttribute($className, $name, $options, $value);
            $this->verifyRegexAttribute($className, $name, $options, $value);
            $this->verifyFilterVarAttribute($className, $name, $options, $value);
            $this->verifyDefaultAttribute($className, $name, $options, $value);
            $this->verifyCollectionAttribute($className, $name, $options, $value);
        }
    }

    /**
     * Verifies that field $name in $className has only valid options
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     */
    private function verifyIfOptionsAreValid($className, $name, $options)
    {
        $validKeys = array_fill_keys([
            'type', 'nullable', 'readonly', 'default',
            'required', 'min', 'max', 'regex', 'collection', 'validate'
        ], true);
        foreach (array_keys($options) as $option) {
            if (!isset($validKeys[$option])) {
                throw new \Exception(sprintf('Unable to validate %s for %s, undefined validation', $option, $name));
            }
        }
    }

    /**
     * Verifies that field $name has expected 'type', 'nullable' and 'readonly' fields
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'type' => 'name of the type, like integer or DateTime',
     *          'nullable' => true, // if field can be null
     *          'readonly' => false // if field is not read only
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyCommonAttributes($className, $name, $options, $value)
    {
        $this->assertTrue(is_array($value[$name]));
        $this->assertEquals(
            $options['type'],
            $value[$name]['type'],
            "Model {$className} Key {$name} Expected type {$options['type']} got {$value[$name]['type']}"
        );
        $this->assertEquals('boolean', gettype($value[$name]['nullable']));
        $this->assertEquals('boolean', gettype($value[$name]['readonly']));

        $nullable = $options['nullable'];
        $nullableText = $nullable ? 'true': 'false';
        $nullableOptionText = $value[$name]['nullable'] ? 'true' : 'false';
        $this->assertEquals(
            $nullable,
            $value[$name]['nullable'],
            "Model {$className} Key {$name} Expected nullable to be {$nullableText} got {$nullableOptionText}"
        );

        $readonly = $options['readonly'];
        $readonlyText = $readonly ? 'true' : 'false';
        $readonlyOptionText = $value[$name]['readonly'] ? 'true' : 'false';

        $this->assertEquals(
            $readonly,
            $value[$name]['readonly'],
            "Model {$className} Key {$name} Expected readonly to be {$readonlyText} got {$readonlyOptionText}"
        );
    }

    /**
     * Verifies that field $name has expected min/max attributes (if any)
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'min' => 0,
     *          'max' => 10
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyMinMaxAttributes($className, $name, $options, $value)
    {
        if (isset($options['min']) && isset($options['max'])) {
            if (!($options['type'] === 'integer' || $options['type'] === 'string')) {
                throw new \Exception('You can validate min & max only for integer or string');
            }

            $this->assertTrue(isset($value[$name]['min']), sprintf('"min" is not present for %s', $name));
            $this->assertTrue(isset($value[$name]['max']), sprintf('"max" is not present for %s', $name));

            $this->assertEquals('integer', gettype($value[$name]['max']));
            $this->assertEquals('integer', gettype($value[$name]['min']));

            $this->assertEquals(
                $options['min'],
                $value[$name]['min'],
                sprintf(
                    'Model %s "min" for %s should be %s but got %s',
                    $className,
                    $name,
                    $options['min'],
                    $value[$name]['min']
                )
            );

            $this->assertEquals(
                $options['max'],
                $value[$name]['max'],
                sprintf(
                    'Model %s "max" for %s should be %s but got %s',
                    $className,
                    $name,
                    $options['max'],
                    $value[$name]['max']
                )
            );
        }
    }

    /**
     * Verifies that field $name has required attribute (if any)
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'required' => true
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyRequiredAttribute($className, $name, $options, $value)
    {
        if (isset($options['required'])) {
            if ($options['required'] !== true) {
                throw new \Exception('You can validate only required=true');
            }

            $this->assertTrue(
                isset($value[$name]['required']),
                sprintf('Model %s "required" for %s is not present', $className, $name)
            );

            $this->assertTrue(
                $value[$name]['required'],
                sprintf('Model %s "required" for %s must be true', $className, $name)
            );
        }
    }

    /**
     * Verifies that field $name has valid regex attribute (if any)
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'regex' => '/some regex/'
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyRegexAttribute($className, $name, $options, $value)
    {
        if (isset($options['regex'])) {
            $this->assertTrue(
                isset($value[$name]['regex']),
                sprintf('Model %s "regex" for %s is not present', $className, $name)
            );

            $this->assertEquals($options['regex'], $value[$name]['regex']);
            $success = preg_match($value[$name]['regex'], '');

            if ($success === false) {
                throw \Exception(sprintf('Model %s Failed to execute regex for %s', $className, $name));
            }
        }
    }

    /**
     * Verifies that field $name passes filter_var()
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'validate' => FILTER_VALIDATE_EMAIL (for example)
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyFilterVarAttribute($className, $name, $options, $value)
    {
        if (isset($options['validate'])) {
            $this->assertTrue(
                isset($value[$name]['validate']),
                sprintf('Model %s "validate" for %s is not present', $className, $name)
            );

            $this->assertEquals($options['validate'], $value[$name]['validate']);
        }
    }

    /**
     * Verifies that field $name has valid default attribute (if any)
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'default' => 'some default value (string, integer, null, etc.)'
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyDefaultAttribute($className, $name, $options, $value)
    {
        if (array_key_exists('default', $options)) {
            $this->assertTrue(
                array_key_exists('default', $value[$name]),
                sprintf('Model %s "default" for %s is not present', $className, $name)
            );
            $this->assertEquals($options['default'], $value[$name]['default']);
        }
    }

    /**
     * Verifies that field $name has valid class attribute (if type=ModelCollection)
     *
     * @param string $className name of the class under checking
     * @param string $name name of the attribute
     * @param array $options what we check
     *      Contains data in the following format
     *      [
     *          'class' => 'SomeClassForCollection'
     *      ]
     * @param array $value actual field attributes under check
     *      has the same format as $options
     */
    private function verifyCollectionAttribute($className, $name, $options, $value)
    {
        if (array_key_exists('collection', $options)) {
            if ($options['collection'] !== true) {
                throw new \Exception('You can validate only collection=true');
            }
            $this->assertTrue(
                array_key_exists('collection', $value[$name]),
                sprintf('Model %s "collection" for %s is not present', $className, $name)
            );
            $this->assertEquals($options['type'], $value[$name]['type']);
            $this->assertEquals($options['collection'], $value[$name]['collection']);
            $fullPathToClass = sprintf('DarrynTen\SageOne\Models\%s', $options['type']);
            $this->assertTrue(class_exists($fullPathToClass), sprintf(
                'Model "%s" property "%s" class "%s" does not exist',
                $className,
                $name,
                $fullPathToClass
            ));
        }
    }

    /**
     * Verifies that features are set as expected
     * Available features are: all, get, save, delete
     *
     * @param string $class Full path to the class
     * @param array $features
     */
    protected function verifyFeatures(string $class, array $features)
    {
        $model = new $class($this->config);
        $reflect = new ReflectionClass($model);
        $className = $this->getClassName($class);

        $reflectValue = $reflect->getProperty('features');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue($model);
        $this->assertArrayHasKey('all', $value);
        $this->assertArrayHasKey('get', $value);
        $this->assertArrayHasKey('save', $value);
        $this->assertArrayHasKey('delete', $value);
        $this->assertEquals('boolean', gettype($value['all']));
        $this->assertEquals('boolean', gettype($value['get']));
        $this->assertEquals('boolean', gettype($value['save']));
        $this->assertEquals('boolean', gettype($value['delete']));
        $this->assertCount(4, $value);

        foreach (['all', 'get', 'save', 'delete'] as $feature) {
            $expected = $features[$feature] ? 'true' : 'false';
            $actual = $value[$feature] ? 'true' : 'false';
            $this->assertEquals(
                $features[$feature],
                $value[$feature],
                "Model {$className} Feature {$feature} expected {$expected} got {$actual}"
            );
        }
    }

    /**
     * Verifies that we can load object from passed data (data should be valid, of course)
     *
     * @param string $class Full path to the class
     * @param callable $whatToCheck Verifies fields on loaded model
     */
    protected function verifyInject(string $class, callable $whatToCheck)
    {
        $className = $this->getClassName($class);

        $model = new $class($this->config);
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/{$className}/GET_{$className}_Get_xx.json"));
        $model->loadResult($data);

        $whatToCheck($model);
    }

    /**
     * Verifies that we can load list of models
     *
     * @param string $class Full path to the class
     * @param string $method HTTP method of call
     * @param string $requestMock If specified sends data from that file in request
     * @param callable $whatToCheck Verifies fields on result
     */
    protected function verifyGetAll(string $class, callable $whatToCheck, string $method = 'GET', string $requestMock = null)
    {
        $className = $this->getClassName($class);
        $path = sprintf('%s/Get', $className);
        $responseMock = sprintf('%s/%s_%s_Get.json', $className, $method, $className);
        if ($requestMock) {
            $responseMock = sprintf('%s/%s_%s_Get_RESP.json', $className, $method, $className);
        }
        $model = $this->setUpRequestMock(
            $method,
            $class,
            $path,
            $responseMock,
            $requestMock
        );

        $allInstances = $model->all();
        $this->assertInstanceOf(ModelCollection::class, $allInstances);
        $this->assertObjectHasAttribute('totalResults', $allInstances);
        $this->assertObjectHasAttribute('returnedResults', $allInstances);
        $this->assertObjectHasAttribute('results', $allInstances);

        $whatToCheck($allInstances->results);
    }

    /**
     * Verifies that we can load single model
     *
     * @param string $class Full path to the class
     * @param ind $id id of the model
     * @param callable $whatToCheck Verifies fields on single model
     */
    protected function verifyGetId(string $class, int $id, callable $whatToCheck)
    {
        $className = $this->getClassName($class);
        $path = sprintf('%s/Get/%s', $className, $id);
        $mockFile = sprintf('%s/GET_%s_Get_xx.json', $className, $className);
        $model = $this->setUpRequestMock(
            'GET',
            $class,
            $path,
            $mockFile
        );

        $model->get($id);

        $whatToCheck($model);
    }

    /**
     * Verifies that we can save model
     *
     * @param string $class Full path to the class
     * @param string $responseClass Full path to the class of the response
     * if null then response is expected to be the same class as $class
     * @param callable $beforeSave Modifies model before saving
     * @param callable $afterSave Verifies model after saving
     */
    protected function verifySave(string $class, callable $beforeSave, callable $afterSave, string $responseClass = null)
    {
        $className = $this->getClassName($class);
        $path = sprintf('%s/Save', $className);
        $mockFileResponse = sprintf('%s/POST_%s_Save_RESP.json', $className, $className);
        $mockFileRequest = sprintf('%s/POST_%s_Save_REQ.json', $className, $className);
        $model = $this->setUpRequestMock(
            'POST',
            $class,
            $path,
            $mockFileResponse,
            $mockFileRequest
        );

        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/" . $mockFileRequest));
        $model->loadResult($data);

        if (is_null($responseClass)) {
            $responseClass = $class;
        }

        $beforeSave($model);
        $response = $model->save();
        $savedModel = new $responseClass($this->config);
        $savedModel->loadResult($response);
        $afterSave($savedModel);
    }

    /**
     * Verifies that we can delete model
     *
     * @param string $class Full path to the class
     * @param int $id Id of the model
     * @param callable $whatToCheck Verifies response
     */
    public function verifyDelete(string $class, int $id, $success = true)
    {
        $className = $this->getClassName($class);
        $path = sprintf('%s/Delete/%s', $className, $id);
        $responseCode = 204;
        if (!$success) {
            $responseCode = 400; // TODO find out actual response code for not allowed deletion
        }
        $model = $this->setUpRequestMock('DELETE', $class, $path, null, null, [], $responseCode);

        $response = $model->delete($id);
        $this->assertEquals($success, $response);
    }

    /**
     * Verifies that exception is thrown when model does not support save()
     *
     * @param string $class Full path to the class
     */
    public function verifySaveException(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\"  Save is not supported");
        $this->expectExceptionCode(10103);

        $model = new $class($this->config);
        $model->save();
    }

    /**
     * Verifies that exception is thrown when model does not support delete()
     *
     * @param string $class Full path to the class
     */
    public function verifyDeleteException(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" id 1 Delete is not supported");
        $this->expectExceptionCode(10104);

        $model = new $class($this->config);
        $model->delete(1);
    }

    /**
     * Verifies that exception is thrown when model does not support all()
     *
     * @param string $class Full path to the class
     */
    public function verifyAllException(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\"  Get all is not supported");
        $this->expectExceptionCode(10101);

        $model = new $class($this->config);
        $model->all();
    }

    /**
     * Verifies that exception is thrown when model does not support get()
     *
     * @param string $class Full path to the class
     */
    public function verifyGetException(string $class)
    {
        $className = $this->getClassName($class);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage("Model \"{$className}\" id 1 Get single is not supported");

        $model = new $class($this->config);
        $model->get(1);
    }

    /**
     * Verifies that ValidationException for integer out of range is thrown
     * @param string $class Full path to the class
     * @param string $field integer field on class
     * @param int $min min value for field
     * @param int $max max value for field
     * @param int $value value what we are trying to set for field
     */
    public function verifyBadIntegerRangeException(string $class, string $field, int $min, int $max, int $value)
    {
        $className = $this->getClassName($class);

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Validation error value %s out of min(%s) max(%s) Integer value is out of range',
                $value,
                $min,
                $max
            )
        );
        $this->expectExceptionCode(10001);

        $model = new $class($this->config);

        $model->{$field} = $value;
    }

    /**
     * Verifies that ValidationException for string with incorrect length is thrown
     * @param string $class Full path to the class
     * @param string $field string field on class
     * @param int $min min length for field
     * @param int $max max length for field
     * @param int $value value what we are trying to set for field
     */
    public function verifyBadStringLengthException(string $class, string $field, int $min, int $max, string $value)
    {
        $className = $this->getClassName($class);

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Validation error value %s out of min(%s) max(%s) String length is out of range',
                $value,
                $min,
                $max
            )
        );
        $this->expectExceptionCode(10002);

        $model = new $class($this->config);

        $model->{$field} = $value;
    }

    public function verifyRequestWithAuth(string $class, string $method)
    {
        $className = $this->getClassName($class);

        $config = [
          'username' => 'username',
          'password' => 'password',
          'key' => 'key',
          'endpoint' => '//accounting.sageone.co.za',
          'version' => '1.1.2',
          'companyId' => null
        ];

        // Creates a partially mock of RequestHandler with mocked `handleRequest` method
        $request = \Mockery::mock(
            'DarrynTen\SageOne\Request\RequestHandler[handleRequest]',
            [
                $config,
            ]
        );

        $request->shouldReceive('handleRequest')
            ->once()
            ->with(
                'POST',
                sprintf('//accounting.sageone.co.za/1.1.2/%s/%s/', $className, $method),
                [
                    'headers' => [
                        'Authorization' => 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
                    ],
                    'query' => [
                        'apikey' => 'key'
                    ]
                ],
                []
            )
            ->andReturn('OK');

        $this->assertEquals(
            'OK',
            $request->request('POST', $className, $method, [])
        );
    }

    /**
     * Generates model with injected request which returns what we want
     *
     * @var string $method GET/POST/DELETE/etc.
     * @var string $path part of url
     * @var string $mockFileResponse part to the mock file with response (if it is required)
     * @var string $mockFileRequest part to the mock file with request (if it is required)
     * @var array $parameters checks passed arguments
     * @return BaseModel
     */
    protected function setUpRequestMock(
        string $method,
        string $class,
        string $path,
        string $mockFileResponse = null,
        string $mockFileRequest = null,
        array $parameters = [],
        int $responseCode = 200
    ) {
        $url = sprintf('/1.1.2/%s?apikey=key', $path);
        $urlWithoutApiKey = sprintf('/1.1.2/%s/', $path);

        $responseData = null;
        if ($mockFileResponse) {
            $responseData = file_get_contents(__DIR__ . '/../../mocks/' . $mockFileResponse);
        }
        $requestData = [];
        if ($mockFileRequest) {
            $requestData= json_decode(file_get_contents(__DIR__ . '/../../mocks/' . $mockFileRequest), true);
        }

        $this->http->mock
            ->when()
            ->methodIs($method)
            ->pathIs($url)
            ->then()
            ->statusCode($responseCode)
            ->body($responseData)
            ->end();
        $this->http->setUp();

        $request = new RequestHandler($this->config);

        if ($responseCode === 400) {
            $this->expectException(ClientException::class);
        }

        $localClient = new Client();
        $localResult = $localClient->request(
            $method,
            '//localhost:8082' . $url,
            $requestData
        );

        $mockClient = \Mockery::mock(
            'Client'
        );

        $token = base64_encode($this->config['username'] . ':' . $this->config['password']);
        $tokenType = 'Basic';
        $checkParameters = [
            'headers' => [
                'Authorization' => sprintf('%s %s', $tokenType, $token)
            ],
        ];
        $checkParameters['query']['apikey'] = $this->config['key'];

        /**
        * $client in RequestHandler receives url without query params
        * they are passed as last parameter for $client->request
        */
        $fullUrl = '//localhost:8082' . $urlWithoutApiKey;
        $mockClient->shouldReceive('request')
            ->once()
            ->with($method, $fullUrl, \Mockery::subset($checkParameters))
            ->andReturn($localResult);

        $reflection = new ReflectionClass($request);
        $reflectedClient = $reflection->getProperty('client');
        $reflectedClient->setAccessible(true);
        $reflectedClient->setValue($request, $mockClient);

        $model = new $class($this->config);

        $modelReflection = new ReflectionClass($model);
        $reflectedRequest = $modelReflection->getProperty('request');
        $reflectedRequest->setAccessible(true);
        $reflectedRequest->setValue($model, $request);
        
        return $model;
    }
}
