<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankFeedAccountGroup;

class BankFeedAccountGroupModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankFeedAccountGroup::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankFeedAccountGroup::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankFeedAccountGroup::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankFeedAccountGroup::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(BankFeedAccountGroup::class, 'bankFeedProviderId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(BankFeedAccountGroup::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankFeedProviderId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankFeedProviderTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'identifier' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'requiresAdditionalAuthentication' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'lastRefreshStatusId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testInject()
    {
        $this->verifyInject(BankFeedAccountGroup::class, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->bankFeedProviderId, 2);
            $this->assertEquals($model->bankFeedProviderTypeId, 3);
            $this->assertEquals($model->description, 'sample string 4');
            $this->assertEquals($model->identifier, 'sample string 5');
            $this->assertTrue($model->requiresAdditionalAuthentication);
            $this->assertEquals($model->lastRefreshStatusId, 7);

            $objArray = json_decode($model->toJson(), true);
            $this->assertCount(7, $objArray);
        });
    }

    public function testFeatures()
    {
        $this->verifyFeatures(BankFeedAccountGroup::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }
}
