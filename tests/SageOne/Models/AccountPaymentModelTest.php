<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountPayment;

class AccountPaymentModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AccountPayment::class, 'accountId');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(AccountPayment::class, 'bankImportMappingId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AccountPayment::class, 'accountId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AccountPayment::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'accountId' => [
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
                'max' => 8000
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100
            ],
            'reference' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'taxTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'comments' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'exclusive' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'tax' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'total' => [
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
            'accepted' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
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
        $this->verifyFeatures(AccountPayment::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AccountPayment::class, function ($results) {
            $this->assertCount(2, $results);
            $this->assertInstanceOf(AccountPayment::class, $results[0]);
            $this->assertInstanceOf(AccountPayment::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals(1, $model1->id);
            $this->assertEquals(2, $model1->accountId);
            $this->assertEquals('2017-07-12', $model1->date->format('Y-m-d'));
            $this->assertEquals('sample string 4', $model1->payee);
            $this->assertEquals('sample string 5', $model1->description);
            $this->assertEquals('sample string 6', $model1->reference);
            $this->assertEquals(7, $model1->taxTypeId);
            $this->assertEquals('sample string 8', $model1->comments);
            $this->assertEquals(9.0, $model1->exclusive);
            $this->assertEquals(10.0, $model1->tax);
            $this->assertEquals(11.0, $model1->total);
            $this->assertEquals(true, $model1->reconciled);
            $this->assertEquals(13, $model1->bankAccountId);
            $this->assertEquals(1, $model1->analysisCategoryId1);
            $this->assertEquals(1, $model1->analysisCategoryId2);
            $this->assertEquals(1, $model1->analysisCategoryId3);
            $this->assertEquals(true, $model1->accepted);
            $this->assertEquals('sample string 15', $model1->bankUniqueIdentifier);
            $this->assertEquals(1, $model1->importTypeId);
            $this->assertEquals(1, $model1->bankImportMappingId);
            $this->assertEquals(1, $model1->bankAccount_CurrencyId);
            $this->assertEquals(1.0, $model1->bankAccount_ExchangeRate);
            $this->assertEquals('2017-07-12', $model1->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-12', $model1->created->format('Y-m-d'));

            $model2 = $results[1];
            $this->assertEquals(1, $model2->id);
            $this->assertEquals(2, $model2->accountId);
            $this->assertEquals('2017-07-12', $model2->date->format('Y-m-d'));
            $this->assertEquals('sample string 4', $model2->payee);
            $this->assertEquals('sample string 5', $model2->description);
            $this->assertEquals('sample string 6', $model2->reference);
            $this->assertEquals(7, $model2->taxTypeId);
            $this->assertEquals('sample string 8', $model2->comments);
            $this->assertEquals(9.0, $model2->exclusive);
            $this->assertEquals(10.0, $model2->tax);
            $this->assertEquals(11.0, $model2->total);
            $this->assertEquals(true, $model2->reconciled);
            $this->assertEquals(13, $model2->bankAccountId);
            $this->assertEquals(1, $model2->analysisCategoryId1);
            $this->assertEquals(1, $model2->analysisCategoryId2);
            $this->assertEquals(1, $model2->analysisCategoryId3);
            $this->assertEquals(true, $model2->accepted);
            $this->assertEquals('sample string 15', $model2->bankUniqueIdentifier);
            $this->assertEquals(1, $model2->importTypeId);
            $this->assertEquals(1, $model2->bankImportMappingId);
            $this->assertEquals(1, $model2->bankAccount_CurrencyId);
            $this->assertEquals(1.0, $model2->bankAccount_ExchangeRate);
            $this->assertEquals('2017-07-12', $model2->modified->format('Y-m-d'));
            $this->assertEquals('2017-07-12', $model2->created->format('Y-m-d'));

            $this->assertCount(24, json_decode($model1->toJson(), true));
            $this->assertCount(24, json_decode($model2->toJson(), true));
        });
    }

    public function testSave()
    {
        $this->verifySave(AccountPayment::class, function ($model) {
            $model->accountId = 2;
            $model->date = "2017-07-12";
            $model->payee = "sample string 4 updated";
            $model->description = "sample string 5 updated";
            $model->reference = "sample string 6 updated";
            $model->taxTypeId = 7;
            $model->comments = "sample string 8 updated";
            $model->exclusive = 9.0;
            $model->tax = 10.0;
            $model->total = 11.0;
            $model->reconciled = true;
            $model->bankAccountId = 13;
            $model->analysisCategoryId1 = 1;
            $model->analysisCategoryId2 = 1;
            $model->analysisCategoryId3 = 1;
            $model->accepted = true;
            $model->bankUniqueIdentifier = "sample string 15";
            $model->importTypeId = 1;
            $model->bankImportMappingId = 1;
            $model->bankAccount_CurrencyId = 1;
            $model->bankAccount_ExchangeRate = 1.0;
        }, function ($savedModel) {
            $this->assertEquals(2, $savedModel->accountId);
            $this->assertEquals("2017-07-12", $savedModel->date->format('Y-m-d'));
            $this->assertEquals("sample string 4 updated", $savedModel->payee);
            $this->assertEquals("sample string 5 updated", $savedModel->description);
            $this->assertEquals("sample string 6 updated", $savedModel->reference);
            $this->assertEquals(7, $savedModel->taxTypeId);
            $this->assertEquals("sample string 8 updated", $savedModel->comments);
            $this->assertEquals(9.0, $savedModel->exclusive);
            $this->assertEquals(10.0, $savedModel->tax);
            $this->assertEquals(11.0, $savedModel->total);
            $this->assertEquals(true, $savedModel->reconciled);
            $this->assertEquals(13, $savedModel->bankAccountId);
            $this->assertEquals(1, $savedModel->analysisCategoryId1);
            $this->assertEquals(1, $savedModel->analysisCategoryId2);
            $this->assertEquals(1, $savedModel->analysisCategoryId3);
            $this->assertEquals(true, $savedModel->accepted);
            $this->assertEquals("sample string 15", $savedModel->bankUniqueIdentifier);
            $this->assertEquals(1, $savedModel->importTypeId);
            $this->assertEquals(1, $savedModel->bankImportMappingId);
            $this->assertEquals(1, $savedModel->bankAccount_CurrencyId);
            $this->assertEquals(1.0, $savedModel->bankAccount_ExchangeRate);
        });
    }
}
