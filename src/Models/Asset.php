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

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Account Model
 *
 * Details on writable properties for Account:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
 */
class Asset extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'Asset';

    /**
     * Defines all possible fields.
     *
     * Used by the base class to decide what gets submitted in a save call,
     * validation, etc
     *
     * All must include a type, whether or not it's nullable, and whether or
     * not it's readonly.
     *
     * NB: Naming convention for keys is to lowercase the first character of the
     * field returned by Sage (they use PascalCase and we use camelCase)
     *
     * `ID` is automatically converted to `id`
     *
     * Details on writable properties for Account:
     * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Account
     *
     * TODO check why/if ID is truly writable!
     *
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'category' => [
            'type' => 'AssetCategory',
            'nullable' => false,
            'readonly' => false,
        ],
        'location' => [
            'type' => 'AssetLocation',
            'nullable' => false,
            'readonly' => false,
        ],
        'datePurchased' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'serialNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'boughtFrom' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'purchasePrice' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'currentValue' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'replacementValue' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'textField1' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'textField2' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'textField3' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'numericField1' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'numericField2' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'numericField3' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'yesNoField1' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'yesNoField2' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'yesNoField3' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'DateField1' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'DateField2' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'DateField3' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
    ];

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];

    /**
     * Returns the list of Accounts including system accounts.
     *
     * @return ModelCollection A collection of entities
     */
    public function getWithSystemAccounts()
    {
        $results = $this->request->request('GET', $this->endpoint, 'GetWithSystemAccounts');
        return new ModelCollection(Account::class, $this->config, $results);
    }

    /**
     * Returns a list of Accounts based on the Category identifier.
     *
     * @var string $id id of category
     * @return ModelCollection A collection of entities
     */
    public function getAccountsByCategoryId(string $id)
    {
        $results = $this->request->request('GET', $this->endpoint, sprintf('GetAccountsByCategoryId/%s', $id));
        return new ModelCollection(Account::class, $this->config, $results);
    }

    /**
     * Returns a list of all accounts
     *
     * @return ModelCollection A collection of entities
     */
    public function getChartofAccounts()
    {
        $results = $this->request->request('GET', $this->endpoint, 'GetChartofAccounts');
        return new ModelCollection(Account::class, $this->config, $results);
    }
}
