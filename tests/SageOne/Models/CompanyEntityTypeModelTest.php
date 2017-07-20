<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\CompanyEntityType;

class CompanyEntityTypeModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(CompanyEntityType::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(CompanyEntityType::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(CompanyEntityType::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(CompanyEntityType::class, 'countryId');
    }

    public function testFeatures()
    {
        $this->verifyFeatures(CompanyEntityType::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => false
        ]);
    }

    public function testAttributes()
    {
        $this->verifyAttributes(CompanyEntityType::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'countryId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'name' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'ownershipDescription' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'holdingDescription' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'holdingUnit' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'canIssueShares' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testGetId()
    {
        $this->verifyGetId(CompanyEntityType::class, 1, function ($model) {
            $this->assertEquals(1, $model->id);
            $this->assertEquals(2, $model->countryId);
            $this->assertEquals('sample string 3', $model->name);
            $this->assertEquals('sample string 4', $model->ownershipDescription);
            $this->assertEquals('sample string 5', $model->holdingDescription);
            $this->assertEquals('sample string 6', $model->holdingUnit);
            $this->assertEquals('2016-07-19', $model->created->format('Y-m-d'));
            $this->assertEquals(true, $model->canIssueShares);
        });
    }

    public function testGetAll()
    {
        $this->verifyGetAll(CompanyEntityType::class, function ($results) {
            $this->assertEquals(2, count($results));

            $this->assertEquals(1, $results[0]->id);
            $this->assertEquals(2, $results[0]->countryId);
            $this->assertEquals('sample string 3', $results[0]->name);
            $this->assertEquals('sample string 4', $results[0]->ownershipDescription);
            $this->assertEquals('sample string 5', $results[0]->holdingDescription);
            $this->assertEquals('sample string 6', $results[0]->holdingUnit);
            $this->assertEquals('2017-07-19', $results[0]->created->format('Y-m-d'));
            $this->assertEquals(true, $results[0]->canIssueShares);

            $this->assertEquals(4, $results[1]->id);
            $this->assertEquals(7, $results[1]->countryId);
            $this->assertEquals('sample string 9', $results[1]->name);
            $this->assertEquals('sample string 10', $results[1]->ownershipDescription);
            $this->assertEquals('sample string 11', $results[1]->holdingDescription);
            $this->assertEquals('sample string 12', $results[1]->holdingUnit);
            $this->assertEquals('2015-01-16', $results[1]->created->format('Y-m-d'));
            $this->assertEquals(false, $results[1]->canIssueShares);
        });
    }

    public function testCanNotSave()
    {
        $this->verifySaveException(CompanyEntityType::class);
    }

    public function testCanNotDelete()
    {
        $this->verifyDeleteException(CompanyEntityType::class);
    }
}
