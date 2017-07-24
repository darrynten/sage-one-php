<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Models\SupplierAgeingRequest;

class SupplierAgeingRequestModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierAgeingRequest::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierAgeingRequest::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierAgeingRequest::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierAgeingRequest::class, 'supplierId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierAgeingRequest::class, 'supplierId');
    }

    public function testInject()
    {
        $supplierAgeingRequest = new SupplierAgeingRequest($this->config);
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/SupplierAgeingRequest/SupplierAgeingRequest_xx.json"));
        $supplierAgeingRequest->loadResult($data);

        $this->assertInstanceOf(SupplierAgeingRequest::class, $supplierAgeingRequest);
        $this->assertEquals(1, $supplierAgeingRequest->supplierId);
        $this->assertEquals('2017-07-24', $supplierAgeingRequest->toDate->format('Y-m-d'));
        $this->assertEquals(true, $supplierAgeingRequest->summary);
        $this->assertEquals(4, $supplierAgeingRequest->ageingPeriod);
        $this->assertEquals('sample string 5', $supplierAgeingRequest->fromSupplier);
        $this->assertEquals('sample string 6', $supplierAgeingRequest->toSupplier);
        $this->assertEquals('sample string 7', $supplierAgeingRequest->fromCategory);
        $this->assertEquals('sample string 8', $supplierAgeingRequest->toCategory);
        $this->assertEquals(true, $supplierAgeingRequest->includeActive);
        $this->assertEquals(true, $supplierAgeingRequest->includeInactive);
        $this->assertEquals(true, $supplierAgeingRequest->basedOnDueDate);
        $this->assertEquals(true, $supplierAgeingRequest->excludeZeroBalance);
        $this->assertEquals(true, $supplierAgeingRequest->useForeignCurrency);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierAgeingRequest::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testAllException()
    {
        $this->verifyAllException(SupplierAgeingRequest::class);
    }

    public function testGetException()
    {
        $this->verifyGetException(SupplierAgeingRequest::class);
    }

    public function testSaveException()
    {
        $this->verifySaveException(SupplierAgeingRequest::class);
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(SupplierAgeingRequest::class);
    }
}
