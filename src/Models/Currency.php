<?php
/**
 * SageOne Library
 *
 * Official Method Documentation:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=CurrencyResponse
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

class Currency extends BaseModel
{
    /**
     * The ID of the currency
     *
     * @var int $id
     */
    public $id;

    /**
     * @var string $code
     */
    protected $code = null;

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var string $symbol
     */
    protected $symbol = null;

    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Currency';

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
        'code' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
        'symbol' => [
            'type' => 'string',
            'nullable' => false,
            'persistable' => true,
        ],
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
        'all' => true,
        'get' => true,
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
}
