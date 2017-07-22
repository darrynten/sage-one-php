<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Vitaliy Likhachev <make.it.git@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Account Balance model
 *
 * Details on writable properties for Account Balance
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AccountBalance
 */
class AccountBalance extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AccountBalance';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'type' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 1,
            'max' => 4
        ],
        'date' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'categoryId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'categoryDescription' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'analysisCategoryId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'analysisCategoryDescription' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'debit' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'credit' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'total' => [
            'type' => 'double',
            'nullable' => true,
            'readonly' => false,
        ],
        'budgetItemPeriods' => [
            'type' => 'BudgetItemPeriod',
            'nullable' => false,
            'readonly' => false,
            'collection' => true
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => false,
        'save' => false,
        'delete' => false,
    ];

    /**
     * @var array $featureMethods
     */
    protected $featureMethods = [
        'all' => 'POST',
        'get' => '',
        'save' => '',
        'delete' => ''
    ];

    /**
     * $param integer $id
     * @return ModelCollection A collection of Account Balance
     */
    public function getAccountBudgetsById($id)
    {
        $results = $this->request->request(
            'GET',
            $this->endpoint,
            sprintf('GetAccountBudgetsById/?budgetId=%s', $id)
        );
        return new ModelCollection(AccountBalance::class, $this->config, $results);
    }

    /**
     * @return ModelCollection A collection of Account Balance
     */
    public function getAccountBudgets()
    {
        $results = $this->request->request(
            'GET',
            $this->endpoint,
            'GetAccountBudgets'
        );
        return new ModelCollection(AccountBalanceBudgetResponse::class, $this->config, $results);
    }
}
