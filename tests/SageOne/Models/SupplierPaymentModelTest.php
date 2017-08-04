<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierPayment;
use DarrynTen\SageOne\Models\BankAccount;
use DarrynTen\SageOne\Models\BankAccountCategory;
use DarrynTen\SageOne\Models\BankFeedAccount;
use DarrynTen\SageOne\Models\BankFeedAccountGroup;
use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\ModelCollection;

class SupplierPaymentModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierPayment::class, 'documentNumber');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierPayment::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'supplierId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'payee' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 8000,
            ],
            'documentNumber' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'reference' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
            ],
            'comments' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 8000,
            ],
            'total' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'discount' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'totalUnallocated' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'reconciled' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankAccountId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'paymentMethod' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'min' => 1,
                'max' => 4,
            ],
            'taxPeriodId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => true,
            ],
            'editable' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'accepted' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'locked' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'analysisCategoryId1' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'analysisCategoryId2' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'analysisCategoryId3' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'printed' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'bankUniqueIdentifier' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'importTypeId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankImportMappingId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankAccount_CurrencyId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankAccount_ExchangeRate' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'supplier_CurrencyId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'supplier_ExchangeRate' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'supplier' => [
                'type' => 'Supplier',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankAccount' => [
                'type' => 'BankAccount',
                'nullable' => true,
                'readonly' => false,
            ],
            'modified' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => true,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => true,
            ]

        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierPayment::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierPayment::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->supplierId, 2);
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->payee, 'sample string 4');
            $this->assertEquals($model->documentNumber, 'sample string 5');
            $this->assertEquals($model->reference, 'sample string 6');
            $this->assertEquals($model->description, 'sample string 7');
            $this->assertEquals($model->comments, 'sample string 8');
            $this->assertEquals($model->total, 9.0);
            $this->assertEquals($model->discount, 10.0);
            $this->assertEquals($model->totalUnallocated, 11.0);
            $this->assertEquals($model->reconciled, true);
            $this->assertEquals($model->bankAccountId, 13);
            $this->assertEquals($model->paymentMethod, 1);
            $this->assertEquals($model->taxPeriodId, 1);
            $this->assertEquals($model->editable, true);
            $this->assertEquals($model->accepted, true);
            $this->assertEquals($model->locked, true);
            $this->assertEquals($model->analysisCategoryId1, 1);
            $this->assertEquals($model->analysisCategoryId2, 1);
            $this->assertEquals($model->analysisCategoryId3, 1);
            $this->assertEquals($model->printed, true);
            $this->assertEquals($model->bankUniqueIdentifier, 'sample string 18');
            $this->assertEquals($model->importTypeId, 1);
            $this->assertEquals($model->bankImportMappingId, 1);
            $this->assertEquals($model->bankAccount_CurrencyId, 1);
            $this->assertEquals($model->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($model->supplier_CurrencyId, 1);
            $this->assertEquals($model->supplier_ExchangeRate, 1.0);
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(Supplier::class, $model->supplier);
            $this->assertEquals($model->supplier->name, 'sample string 1');

            $this->assertInstanceOf(SupplierCategory::class, $model->supplier->category);
            $this->assertEquals($model->supplier->category->description, 'sample string 1');
            $this->assertEquals($model->supplier->category->id, 2);
            $this->assertEquals($model->supplier->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertEquals($model->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model->supplier->contactName, 'sample string 3');
            $this->assertEquals($model->supplier->telephone, 'sample string 4');
            $this->assertEquals($model->supplier->fax, 'sample string 5');
            $this->assertEquals($model->supplier->mobile, 'sample string 6');
            $this->assertEquals($model->supplier->email, 'sample string 7');
            $this->assertEquals($model->supplier->webAddress, 'sample string 8');
            $this->assertEquals($model->supplier->active, true);
            $this->assertEquals($model->supplier->balance, 10.0);
            $this->assertEquals($model->supplier->creditLimit, 11.0);
            $this->assertEquals($model->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model->supplier->deliveryAddress05, 'sample string 21');
            $this->assertEquals($model->supplier->autoAllocateToOldestInvoice, true);
            $this->assertEquals($model->supplier->textField1, 'sample string 22');
            $this->assertEquals($model->supplier->textField2, 'sample string 23');
            $this->assertEquals($model->supplier->textField3, 'sample string 24');
            $this->assertEquals($model->supplier->numericField1, 1.0);
            $this->assertEquals($model->supplier->numericField2, 1.0);
            $this->assertEquals($model->supplier->numericField3, 1.0);
            $this->assertEquals($model->supplier->yesNoField1, true);
            $this->assertEquals($model->supplier->yesNoField2, true);
            $this->assertEquals($model->supplier->yesNoField3, true);
            $this->assertEquals($model->supplier->dateField1->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->dateField2->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->dateField3->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->currencyId, 1);
            $this->assertEquals($model->supplier->currencySymbol, 'sample string 31');
            $this->assertEquals($model->supplier->hasActivity, true);
            $this->assertEquals($model->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model->supplier->defaultTaxTypeId, 1);
            $this->assertEquals($model->supplier->dueDateMethodId, 1);
            $this->assertEquals($model->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model->supplier->id, 33);

            $this->assertInstanceOf(TaxType::class, $model->supplier->defaultTaxType);
            $this->assertEquals($model->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model->supplier->defaultTaxType->percentage, 3.1);
            $this->assertEquals($model->supplier->defaultTaxType->isDefault, true);
            $this->assertEquals($model->supplier->defaultTaxType->hasActivity, true);
            $this->assertEquals($model->supplier->defaultTaxType->isManualTax, true);
            $this->assertEquals($model->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankAccount::class, $model->bankAccount);
            $this->assertEquals($model->bankAccount->name, 'sample string 2');
            $this->assertEquals($model->bankAccount->bankName, 'sample string 3');
            $this->assertEquals($model->bankAccount->accountNumber, 'sample string 4');
            $this->assertEquals($model->bankAccount->branchName, 'sample string 5');
            $this->assertEquals($model->bankAccount->branchNumber, 'sample string 6');
            $this->assertEquals($model->bankAccount->active, true);
            $this->assertEquals($model->bankAccount->default, true);
            $this->assertEquals($model->bankAccount->balance, 9.0);
            $this->assertEquals($model->bankAccount->description, 'sample string 10');
            $this->assertEquals($model->bankAccount->lastTransactionDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->lastImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->hasTransactionsWaitingForReview, true);
            $this->assertEquals($model->bankAccount->defaultPaymentMethodId, 1);
            $this->assertEquals($model->bankAccount->paymentMethod, 1);
            $this->assertEquals($model->bankAccount->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->currencyId, 1);
            $this->assertEquals($model->bankAccount->id, 12);

            $this->assertInstanceOf(BankAccountCategory::class, $model->bankAccount->category);
            $this->assertEquals($model->bankAccount->category->description, 'sample string 1');
            $this->assertEquals($model->bankAccount->category->id, 2);
            $this->assertEquals($model->bankAccount->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankFeedAccount::class, $model->bankAccount->bankFeedAccount);
            $this->assertEquals($model->bankAccount->bankFeedAccount->id, 1);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertEquals($model->bankAccount->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($model->bankAccount->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($model->bankAccount->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model->bankAccount->bankFeedAccount->balance, 1.0);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($model->bankAccount->bankFeedAccount->lastRefreshStatusId, 6);

            $this->assertInstanceOf(BankFeedAccountGroup::class, $model->bankAccount->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication, true);
            $this->assertEquals($model->bankAccount->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SupplierPayment::class, function ($response) {
            $this->assertCount(2, $response);
            $model1 = $response[0];
            $model2 = $response[1];

            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->supplierId, 2);
            $this->assertEquals($model1->date->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->payee, 'sample string 4');
            $this->assertEquals($model1->documentNumber, 'sample string 5');
            $this->assertEquals($model1->reference, 'sample string 6');
            $this->assertEquals($model1->description, 'sample string 7');
            $this->assertEquals($model1->comments, 'sample string 8');
            $this->assertEquals($model1->total, 9.0);
            $this->assertEquals($model1->discount, 10.0);
            $this->assertEquals($model1->totalUnallocated, 11.0);
            $this->assertEquals($model1->reconciled, true);
            $this->assertEquals($model1->bankAccountId, 13);
            $this->assertEquals($model1->paymentMethod, 1);
            $this->assertEquals($model1->taxPeriodId, 1);
            $this->assertEquals($model1->editable, true);
            $this->assertEquals($model1->accepted, true);
            $this->assertEquals($model1->locked, true);
            $this->assertEquals($model1->analysisCategoryId1, 1);
            $this->assertEquals($model1->analysisCategoryId2, 1);
            $this->assertEquals($model1->analysisCategoryId3, 1);
            $this->assertEquals($model1->printed, true);
            $this->assertEquals($model1->bankUniqueIdentifier, 'sample string 18');
            $this->assertEquals($model1->importTypeId, 1);
            $this->assertEquals($model1->bankImportMappingId, 1);
            $this->assertEquals($model1->bankAccount_CurrencyId, 1);
            $this->assertEquals($model1->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($model1->supplier_CurrencyId, 1);
            $this->assertEquals($model1->supplier_ExchangeRate, 1.0);
            $this->assertEquals($model1->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(Supplier::class, $model1->supplier);
            $this->assertEquals($model1->supplier->name, 'sample string 1');

            $this->assertInstanceOf(SupplierCategory::class, $model1->supplier->category);
            $this->assertEquals($model1->supplier->category->description, 'sample string 1');
            $this->assertEquals($model1->supplier->category->id, 2);
            $this->assertEquals($model1->supplier->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertEquals($model1->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model1->supplier->contactName, 'sample string 3');
            $this->assertEquals($model1->supplier->telephone, 'sample string 4');
            $this->assertEquals($model1->supplier->fax, 'sample string 5');
            $this->assertEquals($model1->supplier->mobile, 'sample string 6');
            $this->assertEquals($model1->supplier->email, 'sample string 7');
            $this->assertEquals($model1->supplier->webAddress, 'sample string 8');
            $this->assertEquals($model1->supplier->active, true);
            $this->assertEquals($model1->supplier->balance, 10.0);
            $this->assertEquals($model1->supplier->creditLimit, 11.0);
            $this->assertEquals($model1->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model1->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model1->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model1->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model1->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model1->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model1->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model1->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model1->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model1->supplier->deliveryAddress05, 'sample string 21');
            $this->assertEquals($model1->supplier->autoAllocateToOldestInvoice, true);
            $this->assertEquals($model1->supplier->textField1, 'sample string 22');
            $this->assertEquals($model1->supplier->textField2, 'sample string 23');
            $this->assertEquals($model1->supplier->textField3, 'sample string 24');
            $this->assertEquals($model1->supplier->numericField1, 1.0);
            $this->assertEquals($model1->supplier->numericField2, 1.0);
            $this->assertEquals($model1->supplier->numericField3, 1.0);
            $this->assertEquals($model1->supplier->yesNoField1, true);
            $this->assertEquals($model1->supplier->yesNoField2, true);
            $this->assertEquals($model1->supplier->yesNoField3, true);
            $this->assertEquals($model1->supplier->dateField1->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->dateField2->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->dateField3->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model1->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model1->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->currencyId, 1);
            $this->assertEquals($model1->supplier->currencySymbol, 'sample string 31');
            $this->assertEquals($model1->supplier->hasActivity, true);
            $this->assertEquals($model1->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model1->supplier->defaultTaxTypeId, 1);
            $this->assertEquals($model1->supplier->dueDateMethodId, 1);
            $this->assertEquals($model1->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model1->supplier->id, 33);

            $this->assertInstanceOf(TaxType::class, $model1->supplier->defaultTaxType);
            $this->assertEquals($model1->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model1->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model1->supplier->defaultTaxType->percentage, 3.1);
            $this->assertEquals($model1->supplier->defaultTaxType->isDefault, true);
            $this->assertEquals($model1->supplier->defaultTaxType->hasActivity, true);
            $this->assertEquals($model1->supplier->defaultTaxType->isManualTax, true);
            $this->assertEquals($model1->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankAccount::class, $model1->bankAccount);
            $this->assertEquals($model1->bankAccount->name, 'sample string 2');
            $this->assertEquals($model1->bankAccount->bankName, 'sample string 3');
            $this->assertEquals($model1->bankAccount->accountNumber, 'sample string 4');
            $this->assertEquals($model1->bankAccount->branchName, 'sample string 5');
            $this->assertEquals($model1->bankAccount->branchNumber, 'sample string 6');
            $this->assertEquals($model1->bankAccount->active, true);
            $this->assertEquals($model1->bankAccount->default, true);
            $this->assertEquals($model1->bankAccount->balance, 9.0);
            $this->assertEquals($model1->bankAccount->description, 'sample string 10');
            $this->assertEquals($model1->bankAccount->lastTransactionDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->lastImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->hasTransactionsWaitingForReview, true);
            $this->assertEquals($model1->bankAccount->defaultPaymentMethodId, 1);
            $this->assertEquals($model1->bankAccount->paymentMethod, 1);
            $this->assertEquals($model1->bankAccount->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->currencyId, 1);
            $this->assertEquals($model1->bankAccount->id, 12);

            $this->assertInstanceOf(BankAccountCategory::class, $model1->bankAccount->category);
            $this->assertEquals($model1->bankAccount->category->description, 'sample string 1');
            $this->assertEquals($model1->bankAccount->category->id, 2);
            $this->assertEquals($model1->bankAccount->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankFeedAccount::class, $model1->bankAccount->bankFeedAccount);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->id, 1);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->balance, 1.0);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->lastRefreshStatusId, 6);

            $this->assertInstanceOf(BankFeedAccountGroup::class, $model1->bankAccount->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication, true);
            $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);

            $this->assertEquals($model2->id, 1);
            $this->assertEquals($model2->supplierId, 2);
            $this->assertEquals($model2->date->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->payee, 'sample string 4');
            $this->assertEquals($model2->documentNumber, 'sample string 5');
            $this->assertEquals($model2->reference, 'sample string 6');
            $this->assertEquals($model2->description, 'sample string 7');
            $this->assertEquals($model2->comments, 'sample string 8');
            $this->assertEquals($model2->total, 9.0);
            $this->assertEquals($model2->discount, 10.0);
            $this->assertEquals($model2->totalUnallocated, 11.0);
            $this->assertEquals($model2->reconciled, true);
            $this->assertEquals($model2->bankAccountId, 13);
            $this->assertEquals($model2->paymentMethod, 1);
            $this->assertEquals($model2->taxPeriodId, 1);
            $this->assertEquals($model2->editable, true);
            $this->assertEquals($model2->accepted, true);
            $this->assertEquals($model2->locked, true);
            $this->assertEquals($model2->analysisCategoryId1, 1);
            $this->assertEquals($model2->analysisCategoryId2, 1);
            $this->assertEquals($model2->analysisCategoryId3, 1);
            $this->assertEquals($model2->printed, true);
            $this->assertEquals($model2->bankUniqueIdentifier, 'sample string 18');
            $this->assertEquals($model2->importTypeId, 1);
            $this->assertEquals($model2->bankImportMappingId, 1);
            $this->assertEquals($model2->bankAccount_CurrencyId, 1);
            $this->assertEquals($model2->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($model2->supplier_CurrencyId, 1);
            $this->assertEquals($model2->supplier_ExchangeRate, 1.0);
            $this->assertEquals($model2->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(Supplier::class, $model2->supplier);
            $this->assertEquals($model2->supplier->name, 'sample string 1');

            $this->assertInstanceOf(SupplierCategory::class, $model2->supplier->category);
            $this->assertEquals($model2->supplier->category->description, 'sample string 1');
            $this->assertEquals($model2->supplier->category->id, 2);
            $this->assertEquals($model2->supplier->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertEquals($model2->supplier->taxReference, 'sample string 2');
            $this->assertEquals($model2->supplier->contactName, 'sample string 3');
            $this->assertEquals($model2->supplier->telephone, 'sample string 4');
            $this->assertEquals($model2->supplier->fax, 'sample string 5');
            $this->assertEquals($model2->supplier->mobile, 'sample string 6');
            $this->assertEquals($model2->supplier->email, 'sample string 7');
            $this->assertEquals($model2->supplier->webAddress, 'sample string 8');
            $this->assertEquals($model2->supplier->active, true);
            $this->assertEquals($model2->supplier->balance, 10.0);
            $this->assertEquals($model2->supplier->creditLimit, 11.0);
            $this->assertEquals($model2->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($model2->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($model2->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($model2->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($model2->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($model2->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($model2->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($model2->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($model2->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($model2->supplier->deliveryAddress05, 'sample string 21');
            $this->assertEquals($model2->supplier->autoAllocateToOldestInvoice, true);
            $this->assertEquals($model2->supplier->textField1, 'sample string 22');
            $this->assertEquals($model2->supplier->textField2, 'sample string 23');
            $this->assertEquals($model2->supplier->textField3, 'sample string 24');
            $this->assertEquals($model2->supplier->numericField1, 1.0);
            $this->assertEquals($model2->supplier->numericField2, 1.0);
            $this->assertEquals($model2->supplier->numericField3, 1.0);
            $this->assertEquals($model2->supplier->yesNoField1, true);
            $this->assertEquals($model2->supplier->yesNoField2, true);
            $this->assertEquals($model2->supplier->yesNoField3, true);
            $this->assertEquals($model2->supplier->dateField1->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->dateField2->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->dateField3->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($model2->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($model2->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->currencyId, 1);
            $this->assertEquals($model2->supplier->currencySymbol, 'sample string 31');
            $this->assertEquals($model2->supplier->hasActivity, true);
            $this->assertEquals($model2->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($model2->supplier->defaultTaxTypeId, 1);
            $this->assertEquals($model2->supplier->dueDateMethodId, 1);
            $this->assertEquals($model2->supplier->dueDateMethodValue, 1);
            $this->assertEquals($model2->supplier->id, 33);

            $this->assertInstanceOf(TaxType::class, $model2->supplier->defaultTaxType);
            $this->assertEquals($model2->supplier->defaultTaxType->id, 1);
            $this->assertEquals($model2->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($model2->supplier->defaultTaxType->percentage, 3.1);
            $this->assertEquals($model2->supplier->defaultTaxType->isDefault, true);
            $this->assertEquals($model2->supplier->defaultTaxType->hasActivity, true);
            $this->assertEquals($model2->supplier->defaultTaxType->isManualTax, true);
            $this->assertEquals($model2->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankAccount::class, $model2->bankAccount);
            $this->assertEquals($model2->bankAccount->name, 'sample string 2');
            $this->assertEquals($model2->bankAccount->bankName, 'sample string 3');
            $this->assertEquals($model2->bankAccount->accountNumber, 'sample string 4');
            $this->assertEquals($model2->bankAccount->branchName, 'sample string 5');
            $this->assertEquals($model2->bankAccount->branchNumber, 'sample string 6');
            $this->assertEquals($model2->bankAccount->active, true);
            $this->assertEquals($model2->bankAccount->default, true);
            $this->assertEquals($model2->bankAccount->balance, 9.0);
            $this->assertEquals($model2->bankAccount->description, 'sample string 10');
            $this->assertEquals($model2->bankAccount->lastTransactionDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->lastImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->hasTransactionsWaitingForReview, true);
            $this->assertEquals($model2->bankAccount->defaultPaymentMethodId, 1);
            $this->assertEquals($model2->bankAccount->paymentMethod, 1);
            $this->assertEquals($model2->bankAccount->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->currencyId, 1);
            $this->assertEquals($model2->bankAccount->id, 12);

            $this->assertInstanceOf(BankAccountCategory::class, $model2->bankAccount->category);
            $this->assertEquals($model2->bankAccount->category->description, 'sample string 1');
            $this->assertEquals($model2->bankAccount->category->id, 2);
            $this->assertEquals($model2->bankAccount->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankFeedAccount::class, $model2->bankAccount->bankFeedAccount);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->id, 1);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->balance, 1.0);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->lastRefreshStatusId, 6);

            $this->assertInstanceOf(BankFeedAccountGroup::class, $model2->bankAccount->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication, true);
            $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
        });
    }

    public function testSave()
    {
        $this->verifySave(SupplierPayment::class, function ($model) {
            $model->date = '2017-07-31';
            $model->payee = 'sample string 4';
            $model->documentNumber = 'sample string 5';
            $model->reference = 'sample string 6';
            $model->description = 'sample string 7';
            $model->comments = 'sample string 8';
            $model->total = 9.0;
            $model->discount = 10.0;
            $model->totalUnallocated = 11.0;
            $model->reconciled = true;
            $model->bankAccountId = 13;
            $model->paymentMethod = 1;
            $model->analysisCategoryId1 = 1;
            $model->analysisCategoryId2 = 1;
            $model->analysisCategoryId3 = 1;
            $model->bankUniqueIdentifier = 'sample string 18';
            $model->importTypeId = 1;
            $model->bankImportMappingId = 1;
            $model->bankAccount_CurrencyId = 1;
            $model->bankAccount_ExchangeRate = 1.0;
            $model->supplier_CurrencyId = 1;
            $model->supplier_ExchangeRate = 1.0;
        }, function ($savedModel) {
            $this->assertEquals($savedModel->id, 1);
            $this->assertEquals($savedModel->supplierId, 2);
            $this->assertEquals($savedModel->date->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->payee, 'sample string 4');
            $this->assertEquals($savedModel->documentNumber, 'sample string 5');
            $this->assertEquals($savedModel->reference, 'sample string 6');
            $this->assertEquals($savedModel->description, 'sample string 7');
            $this->assertEquals($savedModel->comments, 'sample string 8');
            $this->assertEquals($savedModel->total, 9.0);
            $this->assertEquals($savedModel->discount, 10.0);
            $this->assertEquals($savedModel->totalUnallocated, 11.0);
            $this->assertEquals($savedModel->reconciled, true);
            $this->assertEquals($savedModel->bankAccountId, 13);
            $this->assertEquals($savedModel->paymentMethod, 1);
            $this->assertEquals($savedModel->taxPeriodId, 1);
            $this->assertEquals($savedModel->editable, true);
            $this->assertEquals($savedModel->accepted, true);
            $this->assertEquals($savedModel->locked, true);
            $this->assertEquals($savedModel->analysisCategoryId1, 1);
            $this->assertEquals($savedModel->analysisCategoryId2, 1);
            $this->assertEquals($savedModel->analysisCategoryId3, 1);
            $this->assertEquals($savedModel->printed, true);
            $this->assertEquals($savedModel->bankUniqueIdentifier, 'sample string 18');
            $this->assertEquals($savedModel->importTypeId, 1);
            $this->assertEquals($savedModel->bankImportMappingId, 1);
            $this->assertEquals($savedModel->bankAccount_CurrencyId, 1);
            $this->assertEquals($savedModel->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($savedModel->supplier_CurrencyId, 1);
            $this->assertEquals($savedModel->supplier_ExchangeRate, 1.0);
            $this->assertEquals($savedModel->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(Supplier::class, $savedModel->supplier);
            $this->assertEquals($savedModel->supplier->name, 'sample string 1');

            $this->assertInstanceOf(SupplierCategory::class, $savedModel->supplier->category);
            $this->assertEquals($savedModel->supplier->category->description, 'sample string 1');
            $this->assertEquals($savedModel->supplier->category->id, 2);
            $this->assertEquals($savedModel->supplier->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertEquals($savedModel->supplier->taxReference, 'sample string 2');
            $this->assertEquals($savedModel->supplier->contactName, 'sample string 3');
            $this->assertEquals($savedModel->supplier->telephone, 'sample string 4');
            $this->assertEquals($savedModel->supplier->fax, 'sample string 5');
            $this->assertEquals($savedModel->supplier->mobile, 'sample string 6');
            $this->assertEquals($savedModel->supplier->email, 'sample string 7');
            $this->assertEquals($savedModel->supplier->webAddress, 'sample string 8');
            $this->assertEquals($savedModel->supplier->active, true);
            $this->assertEquals($savedModel->supplier->balance, 10.0);
            $this->assertEquals($savedModel->supplier->creditLimit, 11.0);
            $this->assertEquals($savedModel->supplier->postalAddress01, 'sample string 12');
            $this->assertEquals($savedModel->supplier->postalAddress02, 'sample string 13');
            $this->assertEquals($savedModel->supplier->postalAddress03, 'sample string 14');
            $this->assertEquals($savedModel->supplier->postalAddress04, 'sample string 15');
            $this->assertEquals($savedModel->supplier->postalAddress05, 'sample string 16');
            $this->assertEquals($savedModel->supplier->deliveryAddress01, 'sample string 17');
            $this->assertEquals($savedModel->supplier->deliveryAddress02, 'sample string 18');
            $this->assertEquals($savedModel->supplier->deliveryAddress03, 'sample string 19');
            $this->assertEquals($savedModel->supplier->deliveryAddress04, 'sample string 20');
            $this->assertEquals($savedModel->supplier->deliveryAddress05, 'sample string 21');
            $this->assertEquals($savedModel->supplier->autoAllocateToOldestInvoice, true);
            $this->assertEquals($savedModel->supplier->textField1, 'sample string 22');
            $this->assertEquals($savedModel->supplier->textField2, 'sample string 23');
            $this->assertEquals($savedModel->supplier->textField3, 'sample string 24');
            $this->assertEquals($savedModel->supplier->numericField1, 1.0);
            $this->assertEquals($savedModel->supplier->numericField2, 1.0);
            $this->assertEquals($savedModel->supplier->numericField3, 1.0);
            $this->assertEquals($savedModel->supplier->yesNoField1, true);
            $this->assertEquals($savedModel->supplier->yesNoField2, true);
            $this->assertEquals($savedModel->supplier->yesNoField3, true);
            $this->assertEquals($savedModel->supplier->dateField1->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->dateField2->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->dateField3->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->businessRegistrationNumber, 'sample string 29');
            $this->assertEquals($savedModel->supplier->RMCDApprovalNumber, 'sample string 30');
            $this->assertEquals($savedModel->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->currencyId, 1);
            $this->assertEquals($savedModel->supplier->currencySymbol, 'sample string 31');
            $this->assertEquals($savedModel->supplier->hasActivity, true);
            $this->assertEquals($savedModel->supplier->defaultDiscountPercentage, 1.0);
            $this->assertEquals($savedModel->supplier->defaultTaxTypeId, 1);
            $this->assertEquals($savedModel->supplier->dueDateMethodId, 1);
            $this->assertEquals($savedModel->supplier->dueDateMethodValue, 1);
            $this->assertEquals($savedModel->supplier->id, 33);

            $this->assertInstanceOf(TaxType::class, $savedModel->supplier->defaultTaxType);
            $this->assertEquals($savedModel->supplier->defaultTaxType->id, 1);
            $this->assertEquals($savedModel->supplier->defaultTaxType->name, 'sample string 2');
            $this->assertEquals($savedModel->supplier->defaultTaxType->percentage, 3.1);
            $this->assertEquals($savedModel->supplier->defaultTaxType->isDefault, true);
            $this->assertEquals($savedModel->supplier->defaultTaxType->hasActivity, true);
            $this->assertEquals($savedModel->supplier->defaultTaxType->isManualTax, true);
            $this->assertEquals($savedModel->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankAccount::class, $savedModel->bankAccount);
            $this->assertEquals($savedModel->bankAccount->name, 'sample string 2');
            $this->assertEquals($savedModel->bankAccount->bankName, 'sample string 3');
            $this->assertEquals($savedModel->bankAccount->accountNumber, 'sample string 4');
            $this->assertEquals($savedModel->bankAccount->branchName, 'sample string 5');
            $this->assertEquals($savedModel->bankAccount->branchNumber, 'sample string 6');
            $this->assertEquals($savedModel->bankAccount->active, true);
            $this->assertEquals($savedModel->bankAccount->default, true);
            $this->assertEquals($savedModel->bankAccount->balance, 9.0);
            $this->assertEquals($savedModel->bankAccount->description, 'sample string 10');
            $this->assertEquals($savedModel->bankAccount->lastTransactionDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->lastImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->hasTransactionsWaitingForReview, true);
            $this->assertEquals($savedModel->bankAccount->defaultPaymentMethodId, 1);
            $this->assertEquals($savedModel->bankAccount->paymentMethod, 1);
            $this->assertEquals($savedModel->bankAccount->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->created->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->currencyId, 1);
            $this->assertEquals($savedModel->bankAccount->id, 12);

            $this->assertInstanceOf(BankAccountCategory::class, $savedModel->bankAccount->category);
            $this->assertEquals($savedModel->bankAccount->category->description, 'sample string 1');
            $this->assertEquals($savedModel->bankAccount->category->id, 2);
            $this->assertEquals($savedModel->bankAccount->category->modified->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->category->created->format('Y-m-d'), '2017-07-31');

            $this->assertInstanceOf(BankFeedAccount::class, $savedModel->bankAccount->bankFeedAccount);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->id, 1);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroupId, 2);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->description, 'sample string 3');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->identifier, 'sample string 4');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-07-31');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->balance, 1.0);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankAccountId, 1);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankAccountName, 'sample string 5');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->lastRefreshStatusId, 6);

            $this->assertInstanceOf(BankFeedAccountGroup::class, $savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->id, 1);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication, true);
            $this->assertEquals($savedModel->bankAccount->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(SupplierPayment::class, true);
    }

    public function testExport()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierPayment::class,
            'SupplierPayment/Export/1',
            'files/test.pdf'
        );

        $fileContent = $model->export('1');
        $tmpFile = tmpfile();
        fwrite($tmpFile, $fileContent);

        $tmpFilePath = stream_get_meta_data($tmpFile)['uri'];
        $savedFileMD5 = md5_file($tmpFilePath);
        $originalFileMD5 = md5_file(__DIR__ . '/../../mocks/files/test.pdf');
        $this->assertEquals($savedFileMD5, $originalFileMD5);

        fclose($tmpFile);
    }

    public function testSaveBatch()
    {
        $parameters = json_decode(
            file_get_contents(
                __DIR__ . '/../../mocks/SupplierPayment/POST_SupplierPayment_SaveBatch_REQ.json'
            ),
            true
        );

        $model = $this->setUpRequestMock(
            'POST',
            SupplierPayment::class,
            'SupplierPayment/SaveBatch',
            'SupplierPayment/POST_SupplierPayment_SaveBatch_RESP.json',
            'SupplierPayment/POST_SupplierPayment_SaveBatch_REQ.json',
            $parameters
        );

        $response = $model->saveBatch($parameters);
        $this->assertInstanceOf(ModelCollection::class, $response);
        $this->assertEquals(2, $response->totalResults);
        $this->assertEquals(2, $response->returnedResults);
        $this->assertCount(2, $response->results);

        $model1 = $response->results[0];
        $model2 = $response->results[1];

        $this->assertEquals($model1->id, 1);
        $this->assertEquals($model1->supplierId, 2);
        $this->assertEquals($model1->date->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->payee, 'sample string 4');
        $this->assertEquals($model1->documentNumber, 'sample string 5');
        $this->assertEquals($model1->reference, 'sample string 6');
        $this->assertEquals($model1->description, 'sample string 7');
        $this->assertEquals($model1->comments, 'sample string 8');
        $this->assertEquals($model1->total, 9.0);
        $this->assertEquals($model1->discount, 10.0);
        $this->assertEquals($model1->totalUnallocated, 11.0);
        $this->assertEquals($model1->reconciled, true);
        $this->assertEquals($model1->bankAccountId, 13);
        $this->assertEquals($model1->paymentMethod, 1);
        $this->assertEquals($model1->taxPeriodId, 1);
        $this->assertEquals($model1->editable, true);
        $this->assertEquals($model1->accepted, true);
        $this->assertEquals($model1->locked, true);
        $this->assertEquals($model1->analysisCategoryId1, 1);
        $this->assertEquals($model1->analysisCategoryId2, 1);
        $this->assertEquals($model1->analysisCategoryId3, 1);
        $this->assertEquals($model1->printed, true);
        $this->assertEquals($model1->bankUniqueIdentifier, 'sample string 18');
        $this->assertEquals($model1->importTypeId, 1);
        $this->assertEquals($model1->bankImportMappingId, 1);
        $this->assertEquals($model1->bankAccount_CurrencyId, 1);
        $this->assertEquals($model1->bankAccount_ExchangeRate, 1.0);
        $this->assertEquals($model1->supplier_CurrencyId, 1);
        $this->assertEquals($model1->supplier_ExchangeRate, 1.0);
        $this->assertEquals($model1->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-31');

        $this->assertInstanceOf(Supplier::class, $model1->supplier);
        $this->assertEquals($model1->supplier->name, 'sample string 1');

        $this->assertInstanceOf(SupplierCategory::class, $model1->supplier->category);
        $this->assertEquals($model1->supplier->category->description, 'sample string 1');
        $this->assertEquals($model1->supplier->category->id, 2);
        $this->assertEquals($model1->supplier->category->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->category->created->format('Y-m-d'), '2017-07-31');

        $this->assertEquals($model1->supplier->taxReference, 'sample string 2');
        $this->assertEquals($model1->supplier->contactName, 'sample string 3');
        $this->assertEquals($model1->supplier->telephone, 'sample string 4');
        $this->assertEquals($model1->supplier->fax, 'sample string 5');
        $this->assertEquals($model1->supplier->mobile, 'sample string 6');
        $this->assertEquals($model1->supplier->email, 'sample string 7');
        $this->assertEquals($model1->supplier->webAddress, 'sample string 8');
        $this->assertEquals($model1->supplier->active, true);
        $this->assertEquals($model1->supplier->balance, 10.0);
        $this->assertEquals($model1->supplier->creditLimit, 11.0);
        $this->assertEquals($model1->supplier->postalAddress01, 'sample string 12');
        $this->assertEquals($model1->supplier->postalAddress02, 'sample string 13');
        $this->assertEquals($model1->supplier->postalAddress03, 'sample string 14');
        $this->assertEquals($model1->supplier->postalAddress04, 'sample string 15');
        $this->assertEquals($model1->supplier->postalAddress05, 'sample string 16');
        $this->assertEquals($model1->supplier->deliveryAddress01, 'sample string 17');
        $this->assertEquals($model1->supplier->deliveryAddress02, 'sample string 18');
        $this->assertEquals($model1->supplier->deliveryAddress03, 'sample string 19');
        $this->assertEquals($model1->supplier->deliveryAddress04, 'sample string 20');
        $this->assertEquals($model1->supplier->deliveryAddress05, 'sample string 21');
        $this->assertEquals($model1->supplier->autoAllocateToOldestInvoice, true);
        $this->assertEquals($model1->supplier->textField1, 'sample string 22');
        $this->assertEquals($model1->supplier->textField2, 'sample string 23');
        $this->assertEquals($model1->supplier->textField3, 'sample string 24');
        $this->assertEquals($model1->supplier->numericField1, 1.0);
        $this->assertEquals($model1->supplier->numericField2, 1.0);
        $this->assertEquals($model1->supplier->numericField3, 1.0);
        $this->assertEquals($model1->supplier->yesNoField1, true);
        $this->assertEquals($model1->supplier->yesNoField2, true);
        $this->assertEquals($model1->supplier->yesNoField3, true);
        $this->assertEquals($model1->supplier->dateField1->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->dateField2->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->dateField3->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->created->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->businessRegistrationNumber, 'sample string 29');
        $this->assertEquals($model1->supplier->RMCDApprovalNumber, 'sample string 30');
        $this->assertEquals($model1->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->currencyId, 1);
        $this->assertEquals($model1->supplier->currencySymbol, 'sample string 31');
        $this->assertEquals($model1->supplier->hasActivity, true);
        $this->assertEquals($model1->supplier->defaultDiscountPercentage, 1.0);
        $this->assertEquals($model1->supplier->defaultTaxTypeId, 1);
        $this->assertEquals($model1->supplier->dueDateMethodId, 1);
        $this->assertEquals($model1->supplier->dueDateMethodValue, 1);
        $this->assertEquals($model1->supplier->id, 33);

        $this->assertInstanceOf(TaxType::class, $model1->supplier->defaultTaxType);
        $this->assertEquals($model1->supplier->defaultTaxType->id, 1);
        $this->assertEquals($model1->supplier->defaultTaxType->name, 'sample string 2');
        $this->assertEquals($model1->supplier->defaultTaxType->percentage, 3.1);
        $this->assertEquals($model1->supplier->defaultTaxType->isDefault, true);
        $this->assertEquals($model1->supplier->defaultTaxType->hasActivity, true);
        $this->assertEquals($model1->supplier->defaultTaxType->isManualTax, true);
        $this->assertEquals($model1->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-31');

        $this->assertInstanceOf(BankAccount::class, $model1->bankAccount);
        $this->assertEquals($model1->bankAccount->name, 'sample string 2');
        $this->assertEquals($model1->bankAccount->bankName, 'sample string 3');
        $this->assertEquals($model1->bankAccount->accountNumber, 'sample string 4');
        $this->assertEquals($model1->bankAccount->branchName, 'sample string 5');
        $this->assertEquals($model1->bankAccount->branchNumber, 'sample string 6');
        $this->assertEquals($model1->bankAccount->active, true);
        $this->assertEquals($model1->bankAccount->default, true);
        $this->assertEquals($model1->bankAccount->balance, 9.0);
        $this->assertEquals($model1->bankAccount->description, 'sample string 10');
        $this->assertEquals($model1->bankAccount->lastTransactionDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->lastImportDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->hasTransactionsWaitingForReview, true);
        $this->assertEquals($model1->bankAccount->defaultPaymentMethodId, 1);
        $this->assertEquals($model1->bankAccount->paymentMethod, 1);
        $this->assertEquals($model1->bankAccount->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->created->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->currencyId, 1);
        $this->assertEquals($model1->bankAccount->id, 12);

        $this->assertInstanceOf(BankAccountCategory::class, $model1->bankAccount->category);
        $this->assertEquals($model1->bankAccount->category->description, 'sample string 1');
        $this->assertEquals($model1->bankAccount->category->id, 2);
        $this->assertEquals($model1->bankAccount->category->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->category->created->format('Y-m-d'), '2017-07-31');

        $this->assertInstanceOf(BankFeedAccount::class, $model1->bankAccount->bankFeedAccount);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->id, 1);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroupId, 2);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->description, 'sample string 3');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->identifier, 'sample string 4');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->balance, 1.0);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankAccountId, 1);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankAccountName, 'sample string 5');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->lastRefreshStatusId, 6);

        $this->assertInstanceOf(BankFeedAccountGroup::class, $model1->bankAccount->bankFeedAccount->bankFeedAccountGroup);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->id, 1);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication, true);
        $this->assertEquals($model1->bankAccount->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);

        $this->assertEquals($model2->id, 1);
        $this->assertEquals($model2->supplierId, 2);
        $this->assertEquals($model2->date->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->payee, 'sample string 4');
        $this->assertEquals($model2->documentNumber, 'sample string 5');
        $this->assertEquals($model2->reference, 'sample string 6');
        $this->assertEquals($model2->description, 'sample string 7');
        $this->assertEquals($model2->comments, 'sample string 8');
        $this->assertEquals($model2->total, 9.0);
        $this->assertEquals($model2->discount, 10.0);
        $this->assertEquals($model2->totalUnallocated, 11.0);
        $this->assertEquals($model2->reconciled, true);
        $this->assertEquals($model2->bankAccountId, 13);
        $this->assertEquals($model2->paymentMethod, 1);
        $this->assertEquals($model2->taxPeriodId, 1);
        $this->assertEquals($model2->editable, true);
        $this->assertEquals($model2->accepted, true);
        $this->assertEquals($model2->locked, true);
        $this->assertEquals($model2->analysisCategoryId1, 1);
        $this->assertEquals($model2->analysisCategoryId2, 1);
        $this->assertEquals($model2->analysisCategoryId3, 1);
        $this->assertEquals($model2->printed, true);
        $this->assertEquals($model2->bankUniqueIdentifier, 'sample string 18');
        $this->assertEquals($model2->importTypeId, 1);
        $this->assertEquals($model2->bankImportMappingId, 1);
        $this->assertEquals($model2->bankAccount_CurrencyId, 1);
        $this->assertEquals($model2->bankAccount_ExchangeRate, 1.0);
        $this->assertEquals($model2->supplier_CurrencyId, 1);
        $this->assertEquals($model2->supplier_ExchangeRate, 1.0);
        $this->assertEquals($model2->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-31');

        $this->assertInstanceOf(Supplier::class, $model2->supplier);
        $this->assertEquals($model2->supplier->name, 'sample string 1');

        $this->assertInstanceOf(SupplierCategory::class, $model2->supplier->category);
        $this->assertEquals($model2->supplier->category->description, 'sample string 1');
        $this->assertEquals($model2->supplier->category->id, 2);
        $this->assertEquals($model2->supplier->category->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->category->created->format('Y-m-d'), '2017-07-31');

        $this->assertEquals($model2->supplier->taxReference, 'sample string 2');
        $this->assertEquals($model2->supplier->contactName, 'sample string 3');
        $this->assertEquals($model2->supplier->telephone, 'sample string 4');
        $this->assertEquals($model2->supplier->fax, 'sample string 5');
        $this->assertEquals($model2->supplier->mobile, 'sample string 6');
        $this->assertEquals($model2->supplier->email, 'sample string 7');
        $this->assertEquals($model2->supplier->webAddress, 'sample string 8');
        $this->assertEquals($model2->supplier->active, true);
        $this->assertEquals($model2->supplier->balance, 10.0);
        $this->assertEquals($model2->supplier->creditLimit, 11.0);
        $this->assertEquals($model2->supplier->postalAddress01, 'sample string 12');
        $this->assertEquals($model2->supplier->postalAddress02, 'sample string 13');
        $this->assertEquals($model2->supplier->postalAddress03, 'sample string 14');
        $this->assertEquals($model2->supplier->postalAddress04, 'sample string 15');
        $this->assertEquals($model2->supplier->postalAddress05, 'sample string 16');
        $this->assertEquals($model2->supplier->deliveryAddress01, 'sample string 17');
        $this->assertEquals($model2->supplier->deliveryAddress02, 'sample string 18');
        $this->assertEquals($model2->supplier->deliveryAddress03, 'sample string 19');
        $this->assertEquals($model2->supplier->deliveryAddress04, 'sample string 20');
        $this->assertEquals($model2->supplier->deliveryAddress05, 'sample string 21');
        $this->assertEquals($model2->supplier->autoAllocateToOldestInvoice, true);
        $this->assertEquals($model2->supplier->textField1, 'sample string 22');
        $this->assertEquals($model2->supplier->textField2, 'sample string 23');
        $this->assertEquals($model2->supplier->textField3, 'sample string 24');
        $this->assertEquals($model2->supplier->numericField1, 1.0);
        $this->assertEquals($model2->supplier->numericField2, 1.0);
        $this->assertEquals($model2->supplier->numericField3, 1.0);
        $this->assertEquals($model2->supplier->yesNoField1, true);
        $this->assertEquals($model2->supplier->yesNoField2, true);
        $this->assertEquals($model2->supplier->yesNoField3, true);
        $this->assertEquals($model2->supplier->dateField1->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->dateField2->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->dateField3->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->created->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->businessRegistrationNumber, 'sample string 29');
        $this->assertEquals($model2->supplier->RMCDApprovalNumber, 'sample string 30');
        $this->assertEquals($model2->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->currencyId, 1);
        $this->assertEquals($model2->supplier->currencySymbol, 'sample string 31');
        $this->assertEquals($model2->supplier->hasActivity, true);
        $this->assertEquals($model2->supplier->defaultDiscountPercentage, 1.0);
        $this->assertEquals($model2->supplier->defaultTaxTypeId, 1);
        $this->assertEquals($model2->supplier->dueDateMethodId, 1);
        $this->assertEquals($model2->supplier->dueDateMethodValue, 1);
        $this->assertEquals($model2->supplier->id, 33);

        $this->assertInstanceOf(TaxType::class, $model2->supplier->defaultTaxType);
        $this->assertEquals($model2->supplier->defaultTaxType->id, 1);
        $this->assertEquals($model2->supplier->defaultTaxType->name, 'sample string 2');
        $this->assertEquals($model2->supplier->defaultTaxType->percentage, 3.1);
        $this->assertEquals($model2->supplier->defaultTaxType->isDefault, true);
        $this->assertEquals($model2->supplier->defaultTaxType->hasActivity, true);
        $this->assertEquals($model2->supplier->defaultTaxType->isManualTax, true);
        $this->assertEquals($model2->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-31');

        $this->assertInstanceOf(BankAccount::class, $model2->bankAccount);
        $this->assertEquals($model2->bankAccount->name, 'sample string 2');
        $this->assertEquals($model2->bankAccount->bankName, 'sample string 3');
        $this->assertEquals($model2->bankAccount->accountNumber, 'sample string 4');
        $this->assertEquals($model2->bankAccount->branchName, 'sample string 5');
        $this->assertEquals($model2->bankAccount->branchNumber, 'sample string 6');
        $this->assertEquals($model2->bankAccount->active, true);
        $this->assertEquals($model2->bankAccount->default, true);
        $this->assertEquals($model2->bankAccount->balance, 9.0);
        $this->assertEquals($model2->bankAccount->description, 'sample string 10');
        $this->assertEquals($model2->bankAccount->lastTransactionDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->lastImportDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->hasTransactionsWaitingForReview, true);
        $this->assertEquals($model2->bankAccount->defaultPaymentMethodId, 1);
        $this->assertEquals($model2->bankAccount->paymentMethod, 1);
        $this->assertEquals($model2->bankAccount->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->created->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->currencyId, 1);
        $this->assertEquals($model2->bankAccount->id, 12);

        $this->assertInstanceOf(BankAccountCategory::class, $model2->bankAccount->category);
        $this->assertEquals($model2->bankAccount->category->description, 'sample string 1');
        $this->assertEquals($model2->bankAccount->category->id, 2);
        $this->assertEquals($model2->bankAccount->category->modified->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->category->created->format('Y-m-d'), '2017-07-31');

        $this->assertInstanceOf(BankFeedAccount::class, $model2->bankAccount->bankFeedAccount);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->id, 1);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroupId, 2);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->description, 'sample string 3');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->identifier, 'sample string 4');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->lastRefreshDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->firstImportDate->format('Y-m-d'), '2017-07-31');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->balance, 1.0);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankAccountId, 1);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankAccountName, 'sample string 5');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->lastRefreshStatusId, 6);

        $this->assertInstanceOf(BankFeedAccountGroup::class, $model2->bankAccount->bankFeedAccount->bankFeedAccountGroup);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->id, 1);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderId, 2);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->bankFeedProviderTypeId, 3);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->description, 'sample string 4');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->identifier, 'sample string 5');
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->requiresAdditionalAuthentication, true);
        $this->assertEquals($model2->bankAccount->bankFeedAccount->bankFeedAccountGroup->lastRefreshStatusId, 7);
    }
}
