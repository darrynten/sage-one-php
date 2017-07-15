<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SalesRepresentative;

class SalesRepresentativeModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SalesRepresentative::class, 'firstName');
    }

    public function testSetReadOnly()
    {
        $this->verifySetReadOnly(SalesRepresentative::class, 'created');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SalesRepresentative::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'firstName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
                'min' => 0,
                'max' => 50,
            ],
            'lastName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
                'min' => 0,
                'max' => 50,
            ],
            'name' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],
            'active' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'email' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'mobile' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'telephone' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 30,
            ],
            'created' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => true,
            ],
            'modified' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => true,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SalesRepresentative::class, [
            'all' => true, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(SalesRepresentative::class, function ($results) {
            $this->assertCount(2, $results);

            $model1 = $results[0];
            $model2 = $results[1];
            $this->assertInstanceOf(SalesRepresentative::class, $model1);
            $this->assertInstanceOf(SalesRepresentative::class, $model2);
            $this->assertCount(10, json_decode($model1->toJson(), true));
            $this->assertCount(10, json_decode($model2->toJson(), true));

            $this->assertEquals(1, $model1->id);
            $this->assertEquals('sample string 2', $model1->firstName);
            $this->assertEquals('sample string 3', $model1->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model1->name);
            $this->assertEquals(true, $model1->active);
            $this->assertEquals('sample string 6', $model1->email);
            $this->assertEquals('sample string 7', $model1->mobile);
            $this->assertEquals('sample string 8', $model1->telephone);
            $this->assertEquals('2017-07-15', $model1->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model1->modified->format('Y-m-d'));

            $this->assertEquals(1, $model2->id);
            $this->assertEquals('sample string 2', $model2->firstName);
            $this->assertEquals('sample string 3', $model2->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model2->name);
            $this->assertEquals(true, $model2->active);
            $this->assertEquals('sample string 6', $model2->email);
            $this->assertEquals('sample string 7', $model2->mobile);
            $this->assertEquals('sample string 8', $model2->telephone);
            $this->assertEquals('2017-07-15', $model2->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model2->modified->format('Y-m-d'));
        });
    }

    public function testGetId()
    {
        $this->verifyGetId(SalesRepresentative::class, 2, function ($model) {
            $this->assertInstanceOf(SalesRepresentative::class, $model);
            $this->assertCount(10, json_decode($model->toJson(), true));

            $this->assertEquals(1, $model->id);
            $this->assertEquals('sample string 2', $model->firstName);
            $this->assertEquals('sample string 3', $model->lastName);
            $this->assertEquals('sample string 2 sample string 3', $model->name);
            $this->assertEquals(true, $model->active);
            $this->assertEquals('sample string 6', $model->email);
            $this->assertEquals('sample string 7', $model->mobile);
            $this->assertEquals('sample string 8', $model->telephone);
            $this->assertEquals('2017-07-15', $model->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $model->modified->format('Y-m-d'));
        });
    }

    public function testSave()
    {
        $this->verifySave(SalesRepresentative::class, function ($model) {
            $model->firstName = 'sample string 2';
            $model->lastName = 'sample string 3';
            $model->active = true;
            $model->email = 'sample string 6';
            $model->mobile = 'sample string 7';
            $model->telephone = 'sample string 8';
        }, function ($savedModel) {
            $this->assertInstanceOf(SalesRepresentative::class, $savedModel);
            $this->assertCount(10, json_decode($savedModel->toJson(), true));

            $this->assertEquals(1, $savedModel->id);
            $this->assertEquals('sample string 2', $savedModel->firstName);
            $this->assertEquals('sample string 3', $savedModel->lastName);
            $this->assertEquals('sample string 2 sample string 3', $savedModel->name);
            $this->assertEquals(true, $savedModel->active);
            $this->assertEquals('sample string 6', $savedModel->email);
            $this->assertEquals('sample string 7', $savedModel->mobile);
            $this->assertEquals('sample string 8', $savedModel->telephone);
            $this->assertEquals('2017-07-15', $savedModel->created->format('Y-m-d'));
            $this->assertEquals('2017-07-15', $savedModel->modified->format('Y-m-d'));
        });
    }

    public function testDelete()
    {
        $this->verifyDelete(SalesRepresentative::class, 1, function ($response) {
            // TODO actual checks
        });
    }

    public function testHasActivity()
    {
        $model1 = $this->setUpRequestMock(
            'GET',
            SalesRepresentative::class,
            'SalesRepresentative/HasActivity/1',
            'SalesRepresentative/GET_SalesRepresentative_HasActivity_1.json'
        );
        $this->assertEquals(true, $model1->hasActivity(1));

        $model2 = $this->setUpRequestMock(
            'GET',
            SalesRepresentative::class,
            'SalesRepresentative/HasActivity/2',
            'SalesRepresentative/GET_SalesRepresentative_HasActivity_2.json'
        );
        $this->assertEquals(false, $model2->hasActivity(2));
    }
}
