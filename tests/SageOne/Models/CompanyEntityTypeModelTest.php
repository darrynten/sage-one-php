<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\CompanyEntity;

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

    public function testCanNotSave()
    {
        $this->verifySaveException(CompanyEntityType::class);
    }

    public function testCanNotDelete()
    {
        $this->verifyDeleteException(CompanyEntityType::class);
    }
}