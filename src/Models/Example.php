<?php
/**
 * SageOne Library
 *
 * Official Method Documentation:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Example
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Example Model
 *
 * Details on writable properties for Example:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Example
 */
class Example extends BaseModel
{

    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Example';

    /**
     * Enums used for enum validation
     *
     * @var array $validEnums
     */
    protected $validEnums = [
        1 => 'ValidEnum 1',
        2 => 'ValidEnum 2',
    ];

    /**
     * Defines all possible fields.
     *
     * This maps to all the public properties you added above
     *
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's readonly.
     *
     * Documentation -> Model Conversion Rules:
     *
     * - nullable is `true` if the word 'nullable' is in the 'type' column
     * - readonly is `true` if the word 'Read Only/System Generated' is in the Additional Info column.
     * - Type has the following rules
     *   - `date` becomes "DateTime"
     *   - `nullable` is removed, i.e. "nullable integer" is only "integer"
     *   - `regex` goes in the "regex" key
     *   - PHP filter_var constants can be used in "validate"
     *   - `min` and `max` go into their own keys
     *   - Multiword linked terms are concatenated, eg:
     *     - "Example Category" becomes "ExampleCategory"
     *     - "Example Type" becomes "ExampleType"
     *
     * NB: Naming convention for keys is to lowercase the first character of the
     * field returned by Sage (they use PascalCase and we use camelCase)
     *
     * `ID` is automatically converted to and from `id`
     *
     * Include a link with Details on writable properties for Example:
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Example
     *
     * TODO Remove this docblock
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'exampleWithCamel' => [
            'type' => 'string',
            'nullable' => true,
            'readonly' => true,
        ],
        'stringRange' => [
            'type' => 'string',
            'nullable' => true,
            'readonly' => false,
            'min' => 2,
            'max' => 10,
        ],
        'enumInteger' => [
          'type' => 'integer',
          'nullable' => true,
          'readonly' => false,
          'enum' => 'validEnums',
        ],
        'stringWithDefault' => [
            'type' => 'string',
            'nullable' => true,
            'readonly' => false,
            'default' => 'some default value',
        ],
        'stringWithNullDefault' => [
            'type' => 'string',
            'nullable' => true,
            'readonly' => false,
            'default' => null
        ],
        'integerRange' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 1,
            'max' => 2147483647,
        ],
        'someBoolean' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'requiredString' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'emailAddress' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
            'validate' => FILTER_VALIDATE_EMAIL,
        ],
        'guidRegex' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'regex' => "/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/",
        ],
        'someCollection' => [
            'type' => 'ExampleCategory',
            'collection' => true,
            'nullable' => false,
            'readonly' => false
        ]
        // etc ...
    ];

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * It covers any call documented with these methods
     *
     * GET Model/Get
     * GET Model/Get/{id}
     * DELETE Model/Delete/{id}
     * POST Model/Save
     *
     * You must enable the supported combination of the above 4 calls if they
     * are present in the documentation
     *
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];

    /**
     * Features HTTP methods
     * Not all models follow same conventions like GET for all()
     * Example AccountBalance all() requires POST method
     * These are default HTTP methods and it works for almost all models
     * @var array $featureMethods
     */
    protected $featureMethods = [
        'all' => 'GET',
        'get' => 'GET',
        'save' => 'POST',
        'delete' => 'DELETE'
    ];

    /**
     * Any additional construction you may need to do
     *
     * @var array $config
     */
    public function __construct(array $config)
    {
        // Your code here
        // Only include if you need to modify constructor

        // This must always happen
        parent::__construct($config);
    }

    /**
     * Custom Method Example
     *
     * Custom Method Description
     */
    public function anExampleCustomMethod()
    {
        // Write code that deals with all other calls
        return 'Example Model Custom Method Call';
    }
}
