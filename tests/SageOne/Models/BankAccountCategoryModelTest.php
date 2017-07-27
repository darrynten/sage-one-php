<?php
namespace DarrynTen\SageOne\Tests\SageOne\Models;
use DarrynTen\SageOne\Models\BankAccountOpeningBalance;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;
class BankAccountOpeningBalanceModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankAccountOpeningBalance::class);
    }
    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankAccountOpeningBalance::class);
    }
    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankAccountOpeningBalance::class);
    }
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankAccountOpeningBalance::class, 'bankAccountId');
    }
    public function testCanNullify()
    {
        $this->verifyCanNullify(BankAccountOpeningBalance::class, 'bankAccount_CurrencyId');
    }
    public function testBadImport()
    {
        $this->verifyBadImport(BankAccountOpeningBalance::class, 'bankAccountId');
    }
    public function testAttributes()
    {
        $this->verifyAttributes(BankAccountOpeningBalance::class, [
            'bankAccountId' => [
                'type' => 'integer',
                'nullable' => false,
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
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'balance' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'reason' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }
    public function testFeatures()
    {
        $this->verifyFeatures(BankAccountOpeningBalance::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => true
        ]);
    }
    public function testInject()
    {
        $this->verifyInject(BankAccountOpeningBalance::class, function ($model) {
            $this->assertEquals($model->bankAccountId, 1);
            $this->assertEquals($model->bankAccount_CurrencyId, 1);
            $this->assertEquals($model->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->balance, 3.0);
            $this->assertEquals($model->reason, 'sample string 4');
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-25');
            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(7, $objArray);
        });
    }
    public function testGetAll()
    {
        $this->verifyGetAll(BankAccountOpeningBalance::class, function ($results) {
            $this->assertCount(2, $results);
            $this->assertInstanceOf(BankAccountOpeningBalance::class, $results[0]);
            $this->assertInstanceOf(BankAccountOpeningBalance::class, $results[1]);
            $model1 = $results[0];
            $this->assertEquals($model1->bankAccountId, 1);
            $this->assertEquals($model1->bankAccount_CurrencyId, 1);
            $this->assertEquals($model1->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($model1->id, 2);
            $this->assertEquals($model1->balance, 3.0);
            $this->assertEquals($model1->reason, 'sample string 4');
            $this->assertEquals($model1->date->format('Y-m-d'), '2017-07-25');
            $model2 = $results[1];
            $this->assertEquals($model2->bankAccountId, 10);
            $this->assertEquals($model2->bankAccount_CurrencyId, 11);
            $this->assertEquals($model2->bankAccount_ExchangeRate, 12.0);
            $this->assertEquals($model2->id, 13);
            $this->assertEquals($model2->balance, 14.0);
            $this->assertEquals($model2->reason, 'sample string 15');
            $this->assertEquals($model2->date->format('Y-m-d'), '2017-07-25');
            $this->assertCount(7, json_decode($model1->toJson(), true));
            $this->assertCount(7, json_decode($model2->toJson(), true));
        });
    }
    public function testGetId()
    {
        $this->verifyGetId(BankAccountOpeningBalance::class, 2, function ($model) {
            $this->assertEquals($model->bankAccountId, 1);
            $this->assertEquals($model->bankAccount_CurrencyId, 1);
            $this->assertEquals($model->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($model->id, 2);
            $this->assertEquals($model->balance, 3.0);
            $this->assertEquals($model->reason, 'sample string 4');
            $this->assertEquals($model->date->format('Y-m-d'), '2017-07-25');
        });
    }
    public function testSave()
    {
        $this->verifySave(BankAccountOpeningBalance::class, function ($model) {
            $model->bankAccountId = 1;
            $model->bankAccount_CurrencyId = 1;
            $model->bankAccount_ExchangeRate = 1.0;
            $model->id = 2;
            $model->balance = 3.0;
            $model->reason = 'sample string 4';
            $model->date = '2017-07-25';
        }, function ($savedModel) {
            $this->assertEquals($savedModel->bankAccountId, 1);
            $this->assertEquals($savedModel->bankAccount_CurrencyId, 1);
            $this->assertEquals($savedModel->bankAccount_ExchangeRate, 1.0);
            $this->assertEquals($savedModel->id, 2);
            $this->assertEquals($savedModel->balance, 3.0);
            $this->assertEquals($savedModel->reason, 'sample string 4');
            $this->assertEquals($savedModel->date->format('Y-m-d'), '2017-07-25');
        });
    }
}
