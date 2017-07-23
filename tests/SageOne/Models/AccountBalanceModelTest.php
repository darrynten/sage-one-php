<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\AccountBalance;
use DarrynTen\SageOne\Models\AccountBalanceBudgetResponse;
use DarrynTen\SageOne\Models\BudgetItemPeriod;
use DarrynTen\SageOne\Models\ModelCollection;

class AccountBalanceModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AccountBalance::class, 'date');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AccountBalance::class, 'type');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AccountBalance::class, [
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
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AccountBalance::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(AccountBalance::class, function ($results) {
            $this->assertEquals(2, count($results));
 
            $model1 = $results[0];
            $model2 = $results[1];

            $this->assertInstanceOf(AccountBalance::class, $model1);
            $this->assertInstanceOf(AccountBalance::class, $model2);

            $this->assertInstanceOf(ModelCollection::class, $model1->budgetItemPeriods);
            $this->assertInstanceOf(ModelCollection::class, $model2->budgetItemPeriods);

            $this->assertEquals(1, $model1->id);
            $this->assertEquals(1, $model1->type);
            $this->assertEquals('2017-07-19', $model1->date->format('Y-m-d'));
            $this->assertEquals('sample string 3', $model1->description);
            $this->assertEquals(4, $model1->categoryId);
            $this->assertEquals('sample string 5', $model1->categoryDescription);
            $this->assertEquals(1, $model1->analysisCategoryId);
            $this->assertEquals('sample string 6', $model1->analysisCategoryDescription);
            $this->assertEquals(1.0, $model1->debit);
            $this->assertEquals(1.0, $model1->credit);
            $this->assertEquals(1.0, $model1->total);

            $this->assertCount(2, $model1->budgetItemPeriods->results);
            $this->assertInstanceOf(BudgetItemPeriod::class, $model1->budgetItemPeriods->results[0]);
            $this->assertInstanceOf(BudgetItemPeriod::class, $model1->budgetItemPeriods->results[1]);
            $this->assertEquals(1, $model1->budgetItemPeriods->results[0]->id);
            $this->assertEquals('2017-07-19', $model1->budgetItemPeriods->results[0]->date->format('Y-m-d'));
            $this->assertEquals(3.0, $model1->budgetItemPeriods->results[0]->total);
            $this->assertEquals(1, $model1->budgetItemPeriods->results[1]->id);
            $this->assertEquals('2017-07-19', $model1->budgetItemPeriods->results[1]->date->format('Y-m-d'));
            $this->assertEquals(3.0, $model1->budgetItemPeriods->results[1]->total);

            $this->assertEquals(1, $model2->id);
            $this->assertEquals(1, $model2->type);
            $this->assertEquals('2017-07-19', $model2->date->format('Y-m-d'));
            $this->assertEquals('sample string 3', $model2->description);
            $this->assertEquals(4, $model2->categoryId);
            $this->assertEquals('sample string 5', $model2->categoryDescription);
            $this->assertEquals(1, $model2->analysisCategoryId);
            $this->assertEquals('sample string 6', $model2->analysisCategoryDescription);
            $this->assertEquals(1.0, $model2->debit);
            $this->assertEquals(1.0, $model2->credit);
            $this->assertEquals(1.0, $model2->total);

            $this->assertCount(2, $model2->budgetItemPeriods->results);
            $this->assertInstanceOf(BudgetItemPeriod::class, $model2->budgetItemPeriods->results[0]);
            $this->assertInstanceOf(BudgetItemPeriod::class, $model2->budgetItemPeriods->results[1]);
            $this->assertEquals(1, $model2->budgetItemPeriods->results[0]->id);
            $this->assertEquals('2017-07-19', $model2->budgetItemPeriods->results[0]->date->format('Y-m-d'));
            $this->assertEquals(3.0, $model2->budgetItemPeriods->results[0]->total);
            $this->assertEquals(1, $model2->budgetItemPeriods->results[1]->id);
            $this->assertEquals('2017-07-19', $model2->budgetItemPeriods->results[1]->date->format('Y-m-d'));
            $this->assertEquals(3.0, $model2->budgetItemPeriods->results[1]->total);
        }, 'POST', 'AccountBalance/POST_AccountBalance_Get_REQ.json');
    }
    
    public function testGetAccountBudgetsById()
    {
        $model = $this->setUpRequestMock(
            'GET',
            AccountBalance::class,
            'AccountBalance/GetAccountBudgetsById/?budgetId=1',
            'AccountBalance/GET_AccountBalance_GetAccountBudgetsByld_budgetId_xx.json'
        );

        $response = $model->getAccountBudgetsById(1);
        $this->assertInstanceOf(ModelCollection::class, $response);
        $this->assertCount(2, $response->results);

        $model1 = $response->results[0];
        $model2 = $response->results[1];

        $this->assertEquals(1, $model1->id);
        $this->assertEquals(1, $model1->type);
        $this->assertEquals('2017-07-01', $model1->date->format('Y-m-d'));
        $this->assertEquals('sample string 3', $model1->description);
        $this->assertEquals(4, $model1->categoryId);
        $this->assertEquals('sample string 5', $model1->categoryDescription);
        $this->assertEquals(1, $model1->analysisCategoryId);
        $this->assertEquals('sample string 6', $model1->analysisCategoryDescription);
        $this->assertEquals(1.0, $model1->debit);
        $this->assertEquals(1.0, $model1->credit);
        $this->assertEquals(1.0, $model1->total);

        $this->assertCount(2, $model1->budgetItemPeriods->results);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model1->budgetItemPeriods->results[0]);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model1->budgetItemPeriods->results[1]);
        $this->assertEquals(1, $model1->budgetItemPeriods->results[0]->id);
        $this->assertEquals('2017-07-01', $model1->budgetItemPeriods->results[0]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model1->budgetItemPeriods->results[0]->total);
        $this->assertEquals(1, $model1->budgetItemPeriods->results[1]->id);
        $this->assertEquals('2017-07-01', $model1->budgetItemPeriods->results[1]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model1->budgetItemPeriods->results[1]->total);

        $this->assertEquals(1, $model2->id);
        $this->assertEquals(1, $model2->type);
        $this->assertEquals('2017-07-01', $model2->date->format('Y-m-d'));
        $this->assertEquals('sample string 3', $model2->description);
        $this->assertEquals(4, $model2->categoryId);
        $this->assertEquals('sample string 5', $model2->categoryDescription);
        $this->assertEquals(1, $model2->analysisCategoryId);
        $this->assertEquals('sample string 6', $model2->analysisCategoryDescription);
        $this->assertEquals(1.0, $model2->debit);
        $this->assertEquals(1.0, $model2->credit);
        $this->assertEquals(1.0, $model2->total);

        $this->assertCount(2, $model2->budgetItemPeriods->results);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model2->budgetItemPeriods->results[0]);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model2->budgetItemPeriods->results[1]);
        $this->assertEquals(1, $model2->budgetItemPeriods->results[0]->id);
        $this->assertEquals('2017-07-01', $model2->budgetItemPeriods->results[0]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model2->budgetItemPeriods->results[0]->total);
        $this->assertEquals(1, $model2->budgetItemPeriods->results[1]->id);
        $this->assertEquals('2017-07-01', $model2->budgetItemPeriods->results[1]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model2->budgetItemPeriods->results[1]->total);
    }

    public function testGetAccountBudgets()
    {
        $model = $this->setUpRequestMock(
            'GET',
            AccountBalance::class,
            'AccountBalance/GetAccountBudgets',
            'AccountBalance/GET_AccountBalance_GetAccountBudgets.json'
        );

        $response = $model->getAccountBudgets();
        $this->assertInstanceOf(ModelCollection::class, $response);
        $this->assertCount(2, $response->results);

        $budget1 = $response->results[0];
        $budget2 = $response->results[1];

        $this->assertInstanceOf(AccountBalanceBudgetResponse::class, $budget1);
        $this->assertInstanceOf(AccountBalanceBudgetResponse::class, $budget2);

        $model1 = $budget1->accountBalances->results[0];
        $model2 = $budget1->accountBalances->results[1];

        $this->assertEquals(1, $model1->id);
        $this->assertEquals(1, $model1->type);
        $this->assertEquals('2017-07-01', $model1->date->format('Y-m-d'));
        $this->assertEquals('sample string 3', $model1->description);
        $this->assertEquals(4, $model1->categoryId);
        $this->assertEquals('sample string 5', $model1->categoryDescription);
        $this->assertEquals(1, $model1->analysisCategoryId);
        $this->assertEquals('sample string 6', $model1->analysisCategoryDescription);
        $this->assertEquals(1.0, $model1->debit);
        $this->assertEquals(1.0, $model1->credit);
        $this->assertEquals(1.0, $model1->total);

        $this->assertCount(2, $model1->budgetItemPeriods->results);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model1->budgetItemPeriods->results[0]);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model1->budgetItemPeriods->results[1]);
        $this->assertEquals(1, $model1->budgetItemPeriods->results[0]->id);
        $this->assertEquals('2017-07-01', $model1->budgetItemPeriods->results[0]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model1->budgetItemPeriods->results[0]->total);
        $this->assertEquals(1, $model1->budgetItemPeriods->results[1]->id);
        $this->assertEquals('2017-07-01', $model1->budgetItemPeriods->results[1]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model1->budgetItemPeriods->results[1]->total);

        $this->assertEquals(1, $model2->id);
        $this->assertEquals(1, $model2->type);
        $this->assertEquals('2017-07-01', $model2->date->format('Y-m-d'));
        $this->assertEquals('sample string 3', $model2->description);
        $this->assertEquals(4, $model2->categoryId);
        $this->assertEquals('sample string 5', $model2->categoryDescription);
        $this->assertEquals(1, $model2->analysisCategoryId);
        $this->assertEquals('sample string 6', $model2->analysisCategoryDescription);
        $this->assertEquals(1.0, $model2->debit);
        $this->assertEquals(1.0, $model2->credit);
        $this->assertEquals(1.0, $model2->total);

        $this->assertCount(2, $model2->budgetItemPeriods->results);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model2->budgetItemPeriods->results[0]);
        $this->assertInstanceOf(BudgetItemPeriod::class, $model2->budgetItemPeriods->results[1]);
        $this->assertEquals(1, $model2->budgetItemPeriods->results[0]->id);
        $this->assertEquals('2017-07-01', $model2->budgetItemPeriods->results[0]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model2->budgetItemPeriods->results[0]->total);
        $this->assertEquals(1, $model2->budgetItemPeriods->results[1]->id);
        $this->assertEquals('2017-07-01', $model2->budgetItemPeriods->results[1]->date->format('Y-m-d'));
        $this->assertEquals(3.0, $model2->budgetItemPeriods->results[1]->total);
    }
}
