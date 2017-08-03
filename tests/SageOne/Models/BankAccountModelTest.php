<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankAccount;
use DarrynTen\SageOne\Models\BankAccountCategory;
use DarrynTen\SageOne\Models\BankFeedAccount;
use DarrynTen\SageOne\Models\BankFeedAccountGroup;
use DarrynTen\SageOne\Exception\LibraryException;
use DarrynTen\SageOne\Models\ModelCollection;
use ReflectionClass;

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
            $this->assertInstanceOf(BankAccountCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model->active);
            $this->assertTrue($model->default);
            $this->assertEquals($model->balance, 9.0);
            $this->assertEquals($model->description, 'sample string 10');
            $this->assertInstanceOf(BankFeedAccount::class, $model->bankFeedAccount);
            $this->assertEquals($model->bankFeedAccount->id, 1);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertInstanceOf(BankFeedAccountGroup::class, $model->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertTrue($model->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
            $this->assertEquals($model->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($model->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($model->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->bankFeedAccount->balance, 1.0);
            $this->assertEquals($model->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($model->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($model->bankFeedAccount->lastRefreshStatusId, 6);
            $this->assertEquals($model->lastTransactionDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->lastImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model->hasTransactionsWaitingForReview);
            $this->assertEquals($model->defaultPaymentMethodId, 1);
            $this->assertEquals($model->paymentMethod, 1);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->currencyId, 1);
            $this->assertEquals($model->id, 12);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(20, $objArray);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(BankAccount::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(BankAccount::class, $results[0]);
            $this->assertInstanceOf(BankAccount::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->name, 'sample string 2');
            $this->assertEquals($model1->bankName, 'sample string 3');
            $this->assertEquals($model1->accountNumber, 'sample string 4');
            $this->assertEquals($model1->branchName, 'sample string 5');
            $this->assertEquals($model1->branchNumber, 'sample string 6');
            $this->assertInstanceOf(BankAccountCategory::class, $model1->category);
            $this->assertEquals($model1->category->description, 'sample string 1');
            $this->assertEquals($model1->category->id, 2);
            $this->assertEquals($model1->category->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model1->category->created->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model1->active);
            $this->assertTrue($model1->default);
            $this->assertEquals($model1->balance, 9.0);
            $this->assertEquals($model1->description, 'sample string 10');
            $this->assertInstanceOf(BankFeedAccount::class, $model1->bankFeedAccount);
            $this->assertEquals($model1->bankFeedAccount->id, 1);
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertInstanceOf(BankFeedAccountGroup::class, $model1->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertTrue($model1->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication);
            $this->assertEquals($model1->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
            $this->assertEquals($model1->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($model1->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($model1->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model1->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model1->bankFeedAccount->balance, 1.0);
            $this->assertEquals($model1->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($model1->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($model1->bankFeedAccount->lastRefreshStatusId, 6);
            $this->assertEquals($model1->lastTransactionDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model1->lastImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model1->hasTransactionsWaitingForReview);
            $this->assertEquals($model1->defaultPaymentMethodId, 1);
            $this->assertEquals($model1->paymentMethod, 1);
            $this->assertEquals($model1->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model1->created->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model1->currencyId, 1);
            $this->assertEquals($model1->id, 12);

            $model2 = $results[1];
            $this->assertEquals($model2->name, 'sample string 12');
            $this->assertEquals($model2->bankName, 'sample string 13');
            $this->assertEquals($model2->accountNumber, 'sample string 14');
            $this->assertEquals($model2->branchName, 'sample string 15');
            $this->assertEquals($model2->branchNumber, 'sample string 16');
            $this->assertInstanceOf(BankAccountCategory::class, $model2->category);
            $this->assertEquals($model2->category->description, 'sample string 11');
            $this->assertEquals($model2->category->id, 12);
            $this->assertEquals($model2->category->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model2->category->created->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model2->active);
            $this->assertTrue($model2->default);
            $this->assertEquals($model2->balance, 19.0);
            $this->assertEquals($model2->description, 'sample string 20');
            $this->assertInstanceOf(BankFeedAccount::class, $model2->bankFeedAccount);
            $this->assertEquals($model2->bankFeedAccount->id, 11);
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroupId, 12);
            $this->assertInstanceOf(BankFeedAccountGroup::class, $model2->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroup->id, 11);
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 12);
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 13);
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 14');
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 15');
            $this->assertTrue($model2->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication);
            $this->assertEquals($model2->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 17);
            $this->assertEquals($model2->bankFeedAccount->description, 'sample string 13');
            $this->assertEquals($model2->bankFeedAccount->identifier, 'sample string 14');
            $this->assertEquals($model2->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model2->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model2->bankFeedAccount->balance, 11.0);
            $this->assertEquals($model2->bankFeedAccount->bankAccountId, 11);
            $this->assertEquals($model2->bankFeedAccount->bankAccountName, 'sample string 15');
            $this->assertEquals($model2->bankFeedAccount->lastRefreshStatusId, 16);
            $this->assertEquals($model2->lastTransactionDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model2->lastImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model2->hasTransactionsWaitingForReview);
            $this->assertEquals($model2->defaultPaymentMethodId, 11);
            $this->assertEquals($model2->paymentMethod, 1);
            $this->assertEquals($model2->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model2->created->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model2->currencyId, 11);
            $this->assertEquals($model2->id, 22);

            $this->assertCount(20, json_decode($model1->toJson(), true));
            $this->assertCount(20, json_decode($model2->toJson(), true));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(BankAccount::class, 12, function ($model) {
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertEquals($model->bankName, 'sample string 3');
            $this->assertEquals($model->accountNumber, 'sample string 4');
            $this->assertEquals($model->branchName, 'sample string 5');
            $this->assertEquals($model->branchNumber, 'sample string 6');
            $this->assertInstanceOf(BankAccountCategory::class, $model->category);
            $this->assertEquals($model->category->description, 'sample string 1');
            $this->assertEquals($model->category->id, 2);
            $this->assertEquals($model->category->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->category->created->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model->active);
            $this->assertTrue($model->default);
            $this->assertEquals($model->balance, 9.0);
            $this->assertEquals($model->description, 'sample string 10');
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertInstanceOf(BankFeedAccount::class, $model->bankFeedAccount);
            $this->assertEquals($model->bankFeedAccount->id, 1);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertInstanceOf(BankFeedAccountGroup::class, $model->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertTrue($model->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication);
            $this->assertEquals($model->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
            $this->assertEquals($model->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($model->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($model->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->bankFeedAccount->balance, 1.0);
            $this->assertEquals($model->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($model->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($model->bankFeedAccount->lastRefreshStatusId, 6);
            $this->assertEquals($model->lastTransactionDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->lastImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($model->hasTransactionsWaitingForReview);
            $this->assertEquals($model->defaultPaymentMethodId, 1);
            $this->assertEquals($model->paymentMethod, 1);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($model->currencyId, 1);
            $this->assertEquals($model->id, 12);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(BankAccount::class, 12, true);
    }

    public function testSave()
    {
        $this->verifySave(BankAccount::class, function ($model) {
            $model->name = 'sample string 2';
            $model->bankName = 'sample string 3';
            $model->accountNumber = 'sample string 4';
            $model->branchName = 'sample string 5';
            $model->branchNumber = 'sample string 6';
            $model->category->description = 'sample string 1';
            $model->category->id = 2;
            $model->active = true;
            $model->default = true;
            $model->description = 'sample string 10';
            $model->name = 'sample string 2';
            $model->bankFeedAccount->id = 1;
            $model->bankFeedAccount->bankFeedAccountGroupId = 2;
            $model->bankFeedAccount->bankFeedAccountGroup->id = 1;
            $model->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId = 2;
            $model->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId = 3;
            $model->bankFeedAccount->bankFeedAccountGroup->description = 'sample string 4';
            $model->bankFeedAccount->bankFeedAccountGroup->identifier = 'sample string 5';
            $model->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication = true;
            $model->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId = 7;
            $model->bankFeedAccount->description = 'sample string 3';
            $model->bankFeedAccount->identifier = 'sample string 4';
            $model->bankFeedAccount->lastRefreshDate = '2017-08-03';
            $model->bankFeedAccount->firstImportDate = '2017-08-03';
            $model->bankFeedAccount->balance = 1.0;
            $model->bankFeedAccount->bankAccountId = 1;
            $model->bankFeedAccount->bankAccountName = 'sample string 5';
            $model->bankFeedAccount->lastRefreshStatusId = 6;
            $model->lastTransactionDate = '2017-08-03';
            $model->lastImportDate = '2017-08-03';
            $model->hasTransactionsWaitingForReview = true;
            $model->defaultPaymentMethodId = 1;
            $model->paymentMethod = 1;
            $model->currencyId = 1;
            $model->id = 12;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->name, 'sample string 2');
            $this->assertEquals($savedModel->bankName, 'sample string 3');
            $this->assertEquals($savedModel->accountNumber, 'sample string 4');
            $this->assertEquals($savedModel->branchName, 'sample string 5');
            $this->assertEquals($savedModel->branchNumber, 'sample string 6');
            $this->assertInstanceOf(BankAccountCategory::class, $savedModel->category);
            $this->assertEquals($savedModel->category->description, 'sample string 1');
            $this->assertEquals($savedModel->category->id, 2);
            $this->assertTrue($savedModel->active);
            $this->assertTrue($savedModel->default);
            $this->assertEquals($savedModel->description, 'sample string 10');
            $this->assertEquals($savedModel->name, 'sample string 2');
            $this->assertInstanceOf(BankFeedAccount::class, $savedModel->bankFeedAccount);
            $this->assertEquals($savedModel->bankFeedAccount->id, 1);
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertInstanceOf(BankFeedAccountGroup::class, $savedModel->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertTrue($savedModel->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication);
            $this->assertEquals($savedModel->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
            $this->assertEquals($savedModel->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($savedModel->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($savedModel->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($savedModel->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($savedModel->bankFeedAccount->balance, 1.0);
            $this->assertEquals($savedModel->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($savedModel->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($savedModel->bankFeedAccount->lastRefreshStatusId, 6);
            $this->assertEquals($savedModel->lastTransactionDate->format('Y-m-d'), '2017-08-03');
            $this->assertEquals($savedModel->lastImportDate->format('Y-m-d'), '2017-08-03');
            $this->assertTrue($savedModel->hasTransactionsWaitingForReview);
            $this->assertEquals($savedModel->defaultPaymentMethodId, 1);
            $this->assertEquals($savedModel->paymentMethod, 1);
            $this->assertEquals($savedModel->currencyId, 1);
            $this->assertEquals($savedModel->id, 12);
        });
    }

    public function testValidate()
    {
        $model = new BankAccount($this->config);
        $this->expectException(LibraryException::class);
        $this->expectExceptionMessage('Error, "\DarrynTen\SageOne\Models\BankAccount::validate()" Method not yet implemented. This still needs to be added, please consider contributing to the project..');
        $this->expectExceptionCode(10301);
        $model->validate();
    }
}
