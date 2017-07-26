<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierTransactionListingRequest;

class SupplierTransactionListingRequestModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierTransactionListingRequest::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierTransactionListingRequest::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierTransactionListingRequest::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierTransactionListingRequest::class, 'fromSupplier');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierTransactionListingRequest::class, 'fromSupplier');
    }

    public function testInject()
    {
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/SupplierTransactionListingRequest/SupplierTransactionListingRequest_xx.json"));
        $supplierTransactionListingRequest = new SupplierTransactionListingRequest($this->config);
        $supplierTransactionListingRequest->loadResult($data);
        $this->assertInstanceOf(SupplierTransactionListingRequest::class, $supplierTransactionListingRequest);
        $this->assertEquals('sample string 1', $supplierTransactionListingRequest->fromSupplier);
        $this->assertEquals('sample string 2', $supplierTransactionListingRequest->toSupplier);
        $this->assertEquals('sample string 3', $supplierTransactionListingRequest->fromCategory);
        $this->assertEquals('sample string 4', $supplierTransactionListingRequest->toCategory);
        $this->assertEquals('2017-07-26', $supplierTransactionListingRequest->fromDate->format('Y-m-d'));
        $this->assertEquals('2017-07-26', $supplierTransactionListingRequest->toDate->format('Y-m-d'));
        $this->assertEquals(true, $supplierTransactionListingRequest->includeActive);
        $this->assertEquals(true, $supplierTransactionListingRequest->includeInactive);
        $this->assertEquals('sample string 9', $supplierTransactionListingRequest->transactionType);
        $this->assertEquals(true, $supplierTransactionListingRequest->showOpeningBalance);
        $this->assertEquals(true, $supplierTransactionListingRequest->useForeignCurrency);
    }
    public function testFeatures()
    {
        $this->verifyFeatures(SupplierTransactionListingRequest::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }
    public function testAllException()
    {
        $this->verifyAllException(SupplierTransactionListingRequest::class);
    }
    public function testGetException()
    {
        $this->verifyGetException(SupplierTransactionListingRequest::class);
    }
    public function testSaveException()
    {
        $this->verifySaveException(SupplierTransactionListingRequest::class);
    }
    public function testDeleteException()
    {
        $this->verifyDeleteException(SupplierTransactionListingRequest::class);
    }
}
