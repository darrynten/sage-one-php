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

class Example extends BaseModel
{
    //////////////////////////// Public Properties
    // remove these 2 comments before merging

    /**
     * The ID of the account
     *
     * @var int $id
     */
    public $id;


    /**
     * Example title
     *
     * Example description
     *
     * READ ONLY [this must only be present when dealing with a read-only property)
     * This is an indicator to developers that props are not persistable
     *
     * The `= null;` must only remain for properties `nullable` in the docs
     * This is as an indicator to developers that a field is nullable
     *
     * @var string $exampleWithCamel
     */
    public $exampleWithCamel = null;

    // etc etc etc

    //////////////////////////// End Properties
    // remove these 2 lines before merging

    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Example';

    /**
     * Defines all possible fields.
     *
     * This maps to all the public properties you added above
     *
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's persistable.
     *
     * Documentation -> Model Conversion Rules:
     *
     * - Nullable is `true` if the word 'nullable' is in the 'type' column
     * - Persistable is `true` if the word 'None.' is in the Additional Info column.
     * - Type has the following rules
     *   - `date` becomes "DateTime"
     *   - `nullable` is removed, i.e. "nullable integer" is only "integer"
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
            'persistable' => true,
        ],
        'exampleWithCamel' => [
            'type' => 'string',
            'nullable' => true,
            'persistable' => false,
        ],
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
