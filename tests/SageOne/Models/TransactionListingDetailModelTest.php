<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\TransactionListingDetail;

class TransactionListingDetailModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(TransactionListingDetail::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(TransactionListingDetail::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(TransactionListingDetail::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(TransactionListingDetail::class, 'businessBaseId');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(TransactionListingDetail::class, 'businessBaseId');
    }

    public function testInject()
    {
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/TransactionListingDetail/TransactionListingDetail_xx.json"));
        $transactionListingDetail = new TransactionListingDetail($this->config);
        $transactionListingDetail->loadResult($data);
        $this->assertInstanceOf(TransactionListingDetail::class, $transactionListingDetail);
        $this->assertEquals('sample business id', $transactionListingDetail->businessBaseId);
        $this->assertEquals(100, $transactionListingDetail->id);
        $this->assertEquals(50, $transactionListingDetail->documentTypeId);
        $this->assertEquals(4, $transactionListingDetail->linkId);
        $this->assertEquals('sample name', $transactionListingDetail->name);
        $this->assertEquals(5, $transactionListingDetail->currencyId);
        $this->assertEquals('sample currency symbol', $transactionListingDetail->currencySymbol);
        $this->assertEquals('sample doc number', $transactionListingDetail->documentNumber);
        $this->assertEquals('sample reference', $transactionListingDetail->reference);
        $this->assertEquals('sample currency symbol', $transactionListingDetail->comment);
        $this->assertEquals('2017-09-09', $transactionListingDetail->date->format('Y-m-d'));
        $this->assertEquals('sample description', $transactionListingDetail->description);
        $this->assertEquals('sample display', $transactionListingDetail->documentTypeDisplayText);
        $this->assertEquals(60.1, $transactionListingDetail->total);
        $this->assertEquals(70.2, $transactionListingDetail->debit);
        $this->assertEquals(80.4, $transactionListingDetail->credit);
        $this->assertEquals(90.5, $transactionListingDetail->runningTotal);
    }
    public function testFeatures()
    {
        $this->verifyFeatures(TransactionListingDetail::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }
    public function testAllException()
    {
        $this->verifyAllException(TransactionListingDetail::class);
    }
    public function testGetException()
    {
        $this->verifyGetException(TransactionListingDetail::class);
    }
    public function testSaveException()
    {
        $this->verifySaveException(TransactionListingDetail::class);
    }
    public function testDeleteException()
    {
        $this->verifyDeleteException(TransactionListingDetail::class);
    }
}
