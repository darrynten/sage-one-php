<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankAccount;
use DarrynTen\SageOne\Models\BankAccountCategory;
use DarrynTen\SageOne\Models\BankFeedAccount;


class BankAccountModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankAccount::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankAccount::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankAccount::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankAccount::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(BankAccount::class, 'lastTransactionDate');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(BankAccount::class, 'name');
    }

    public function testNameLength()
    {
        $this->verifyBadStringLengthException(
            BankAccount::class,
            'paymentMethod',
            0,
            4,
            str_repeat('x', 5)
        );
    }

    public function testAttributes()
    {
        $this->verifyAttributes(BankAccount::class, [
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
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(BankAccount::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true,
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(BankAccount::class, function ($model) {
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertEquals($model->bankName, 'sample string 3');
            $this->assertEquals($model->accountNumber, 'sample string 4');
            $this->assertEquals($model->branchName, 'sample string 5');
            $this->assertEquals($model->branchNumber, 'sample string 6');
//            $this->assertInstanceOf(BankAccountCategory::class, $model->category);



            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(49, $objArray);
        });
    }
}
