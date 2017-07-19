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
 * Account Balance Budget model
 * It is dummy model for response from
 * https://accounting.sageone.co.za/api/1.1.2/Help/Api/GET-AccountBalance-GetAccountBudgets
 */
class AccountBalanceBudgetResponse extends BaseModel
{
    /**
     * $var string $endpoint
     */
    protected $endpoint = '';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'accountBalances' => [
            'type' => 'AccountBalance',
            'nullable' => false,
            'readonly' => true,
            'collection' => true
        ],
    ];
}
