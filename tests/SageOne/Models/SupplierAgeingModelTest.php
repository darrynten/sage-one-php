<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierAgeing;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierAgeingModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierAgeing::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierAgeing::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierAgeing::class);
    }
}
