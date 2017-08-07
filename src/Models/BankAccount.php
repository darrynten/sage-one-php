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
use DarrynTen\SageOne\Exception\LibraryException;

/**
 * Bank Account Model
 *
 * Details on writable properties for Bank Account:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=BankAccount
 */
class BankAccount extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'BankAccount';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'bankName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'accountNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'branchName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'branchNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'category' => [
            'type' => 'BankAccountCategory',
            'nullable' => false,
            'readonly' => false,
        ],
        'active' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'default' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'balance' => [
            'type' => 'double',
            'nullable' => false,
            'readonly' => true,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4000,
        ],
        'bankFeedAccount' => [
            'type' => 'BankFeedAccount',
            'nullable' => false,
            'readonly' => false,
        ],
        'lastTransactionDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'lastImportDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'hasTransactionsWaitingForReview' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'defaultPaymentMethodId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'paymentMethod' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'currencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];

    /**
     * Validates a Bank Account.
     *
     * @return array
     */
    public function validate()
    {
        throw new LibraryException(
            LibraryException::METHOD_NOT_IMPLEMENTED,
            'Error, "\DarrynTen\SageOne\Models\BankAccount::validate()" Method not yet implemented. This still needs to be added, please consider contributing to the project..'
        );
    }
}
