<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\TransactionListingDetail;
use DarrynTen\SageOne\Models\SupplierTransactionListing;
use DarrynTen\SageOne\Models\SupplierTransactionListingRequest;

class SupplierTransactionListingModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierTransactionListing::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierTransactionListing::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierTransactionListing::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierTransactionListing::class, 'name');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierTransactionListing::class, 'name');
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierTransactionListing::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testInject()
    {
        $supplierTransactionListing = new SupplierTransactionListing($this->config);
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/SupplierTransactionListing/POST_SupplierTransactionListing_GetSupplierTransactionListingReportingDetail_Post_xx.json"));
        $supplierTransactionListing->loadResult($data);

        $this->assertInstanceOf(SupplierTransactionListing::class, $supplierTransactionListing);
        $this->assertEquals(11, $supplierTransactionListing->id);
        $this->assertEquals('sample string 21', $supplierTransactionListing->name);
        $this->assertEquals('sample string 31', $supplierTransactionListing->currencySymbol);
        $this->assertEquals('2017-07-21', $supplierTransactionListing->openingBalanceDate->format('Y-m-d'));
        $this->assertEquals(5.1, $supplierTransactionListing->openingBalance);
        $this->assertEquals('2017-07-26', $supplierTransactionListing->closingBalanceDate->format('Y-m-d'));
        $this->assertEquals(7.1, $supplierTransactionListing->closingBalance);
        $this->assertInstanceOf(TransactionListingDetail::class, $supplierTransactionListing->transactions->results[0]);
        $this->assertEquals('sample business id', $supplierTransactionListing->transactions->results[0]->businessBaseId);
        $this->assertEquals(100, $supplierTransactionListing->transactions->results[0]->id);
        $this->assertEquals(50, $supplierTransactionListing->transactions->results[0]->documentTypeId);
        $this->assertEquals(4, $supplierTransactionListing->transactions->results[0]->linkId);
        $this->assertEquals('sample name', $supplierTransactionListing->transactions->results[0]->name);
        $this->assertEquals(5, $supplierTransactionListing->transactions->results[0]->currencyId);
        $this->assertEquals('sample currency symbol', $supplierTransactionListing->transactions->results[0]->currencySymbol);
        $this->assertEquals('sample doc number', $supplierTransactionListing->transactions->results[0]->documentNumber);
        $this->assertEquals('sample reference', $supplierTransactionListing->transactions->results[0]->reference);
        $this->assertEquals('sample currency symbol', $supplierTransactionListing->transactions->results[0]->comment);
        $this->assertEquals('2017-09-09', $supplierTransactionListing->transactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('sample description', $supplierTransactionListing->transactions->results[0]->description);
        $this->assertEquals('sample display', $supplierTransactionListing->transactions->results[0]->documentTypeDisplayText);
        $this->assertEquals(60.1, $supplierTransactionListing->transactions->results[0]->total);
        $this->assertEquals(70.2, $supplierTransactionListing->transactions->results[0]->debit);
        $this->assertEquals(80.4, $supplierTransactionListing->transactions->results[0]->credit);
        $this->assertEquals(90.5, $supplierTransactionListing->transactions->results[0]->runningTotal);
        $this->assertInstanceOf(TransactionListingDetail::class, $supplierTransactionListing->transactions->results[1]);
        $this->assertEquals('sample business id 1', $supplierTransactionListing->transactions->results[1]->businessBaseId);
        $this->assertEquals(1001, $supplierTransactionListing->transactions->results[1]->id);
        $this->assertEquals(501, $supplierTransactionListing->transactions->results[1]->documentTypeId);
        $this->assertEquals(41, $supplierTransactionListing->transactions->results[1]->linkId);
        $this->assertEquals('sample name 1', $supplierTransactionListing->transactions->results[1]->name);
        $this->assertEquals(51, $supplierTransactionListing->transactions->results[1]->currencyId);
        $this->assertEquals('sample currency symbol 1', $supplierTransactionListing->transactions->results[1]->currencySymbol);
        $this->assertEquals('sample doc number 1', $supplierTransactionListing->transactions->results[1]->documentNumber);
        $this->assertEquals('sample reference 1', $supplierTransactionListing->transactions->results[1]->reference);
        $this->assertEquals('sample currency symbol 1', $supplierTransactionListing->transactions->results[1]->comment);
        $this->assertEquals('2017-09-01', $supplierTransactionListing->transactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('sample description 1', $supplierTransactionListing->transactions->results[1]->description);
        $this->assertEquals('sample display 1', $supplierTransactionListing->transactions->results[1]->documentTypeDisplayText);
        $this->assertEquals(60.2, $supplierTransactionListing->transactions->results[1]->total);
        $this->assertEquals(70.3, $supplierTransactionListing->transactions->results[1]->debit);
        $this->assertEquals(80.7, $supplierTransactionListing->transactions->results[1]->credit);
        $this->assertEquals(90.8, $supplierTransactionListing->transactions->results[1]->runningTotal);
    }

    public function testGetSupplierTransactionListingReportingDetail()
    {
        $supplierTransactionListing = $this->setUpRequestMock('POST', SupplierTransactionListing::class, 'SupplierTransactionListing/GetSupplierTransactionListingReportingDetail', 'SupplierTransactionListing/POST_SupplierTransactionListing_GetSupplierTransactionListingReportingDetail_RESP.json', 'SupplierTransactionListing/POST_SupplierTransactionListing_GetSupplierTransactionListingReportingDetail_REQ.json');
        $supplierTransactionListingRequestFields = new \stdClass();
        $supplierTransactionListingRequestFields->FromSupplier =  'sample string 1';
        $supplierTransactionListingRequestFields->ToSupplier =  'sample string 2';
        $supplierTransactionListingRequestFields->FromCategory =  'sample string 3';
        $supplierTransactionListingRequestFields->ToCategory =  'sample string 4';
        $supplierTransactionListingRequestFields->FromDate =  '2017-07-26';
        $supplierTransactionListingRequestFields->ToDate =  '2017-07-26';
        $supplierTransactionListingRequestFields->IncludeActive =  true;
        $supplierTransactionListingRequestFields->IncludeInactive =  true;
        $supplierTransactionListingRequestFields->TransactionType =  'sample string 9';
        $supplierTransactionListingRequestFields->ShowOpeningBalance =  true;
        $supplierTransactionListingRequestFields->UseForeignCurrency =  true;

        $supplierTransactionListingRequest = new SupplierTransactionListingRequest($this->config);
        $supplierTransactionListingRequest->loadResult($supplierTransactionListingRequestFields);
        $supplierTransactionListingReportDetails = $supplierTransactionListing->GetSupplierTransactionListingReportingDetail($supplierTransactionListingRequest);

        $this->assertInstanceOf(SupplierTransactionListing::class, $supplierTransactionListingReportDetails->results[0]);
        $this->assertEquals(1, $supplierTransactionListingReportDetails->results[0]->id);
        $this->assertEquals('sample string 2', $supplierTransactionListingReportDetails->results[0]->name);
        $this->assertEquals('sample string 3', $supplierTransactionListingReportDetails->results[0]->currencySymbol);
        $this->assertEquals('2017-07-26', $supplierTransactionListingReportDetails->results[0]->openingBalanceDate->format('Y-m-d'));
        $this->assertEquals(5.0, $supplierTransactionListingReportDetails->results[0]->openingBalance);
        $this->assertEquals('2017-07-26', $supplierTransactionListingReportDetails->results[0]->closingBalanceDate->format('Y-m-d'));
        $this->assertEquals(7.0, $supplierTransactionListingReportDetails->results[0]->closingBalance);
        $this->assertInstanceOf(TransactionListingDetail::class, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]);
        $this->assertEquals('sample business id 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->businessBaseId);
        $this->assertEquals(104, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->id);
        $this->assertEquals(54, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->documentTypeId);
        $this->assertEquals(44, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->linkId);
        $this->assertEquals('sample name 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->name);
        $this->assertEquals(544, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->currencyId);
        $this->assertEquals('sample currency symbol 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->currencySymbol);
        $this->assertEquals('sample doc number 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->documentNumber);
        $this->assertEquals('sample reference 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->reference);
        $this->assertEquals('sample currency symbol 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->comment);
        $this->assertEquals('2017-09-04', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('sample description 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->description);
        $this->assertEquals('sample display 4', $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->documentTypeDisplayText);
        $this->assertEquals(64.1, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->total);
        $this->assertEquals(74.2, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->debit);
        $this->assertEquals(84.4, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->credit);
        $this->assertEquals(94.5, $supplierTransactionListingReportDetails->results[0]->transactions->results[0]->runningTotal);
        $this->assertInstanceOf(TransactionListingDetail::class, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]);
        $this->assertEquals('sample business id 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->businessBaseId);
        $this->assertEquals(105, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->id);
        $this->assertEquals(505, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->documentTypeId);
        $this->assertEquals(45, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->linkId);
        $this->assertEquals('sample name 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->name);
        $this->assertEquals(55, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->currencyId);
        $this->assertEquals('sample currency symbol 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->currencySymbol);
        $this->assertEquals('sample doc number 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->documentNumber);
        $this->assertEquals('sample reference 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->reference);
        $this->assertEquals('sample currency symbol 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->comment);
        $this->assertEquals('2017-09-09', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('sample description 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->description);
        $this->assertEquals('sample display 5', $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->documentTypeDisplayText);
        $this->assertEquals(65.1, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->total);
        $this->assertEquals(75.2, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->debit);
        $this->assertEquals(85.4, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->credit);
        $this->assertEquals(95.5, $supplierTransactionListingReportDetails->results[0]->transactions->results[1]->runningTotal);

        $this->assertInstanceOf(SupplierTransactionListing::class, $supplierTransactionListingReportDetails->results[1]);
        $this->assertEquals(40, $supplierTransactionListingReportDetails->results[1]->id);
        $this->assertEquals('sample string 20', $supplierTransactionListingReportDetails->results[1]->name);
        $this->assertEquals('sample string 30', $supplierTransactionListingReportDetails->results[1]->currencySymbol);
        $this->assertEquals('2017-07-27', $supplierTransactionListingReportDetails->results[1]->openingBalanceDate->format('Y-m-d'));
        $this->assertEquals(50.0, $supplierTransactionListingReportDetails->results[1]->openingBalance);
        $this->assertEquals('2017-07-27', $supplierTransactionListingReportDetails->results[1]->closingBalanceDate->format('Y-m-d'));
        $this->assertEquals(70.0, $supplierTransactionListingReportDetails->results[1]->closingBalance);

        $this->assertInstanceOf(TransactionListingDetail::class, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]);
        $this->assertEquals('sample business id 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->businessBaseId);
        $this->assertEquals(106, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->id);
        $this->assertEquals(506, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->documentTypeId);
        $this->assertEquals(46, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->linkId);
        $this->assertEquals('sample name 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->name);
        $this->assertEquals(56, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->currencyId);
        $this->assertEquals('sample currency symbol 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->currencySymbol);
        $this->assertEquals('sample doc number 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->documentNumber);
        $this->assertEquals('sample reference 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->reference);
        $this->assertEquals('sample currency symbol 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->comment);
        $this->assertEquals('2017-09-06', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->date->format('Y-m-d'));
        $this->assertEquals('sample description 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->description);
        $this->assertEquals('sample display 6', $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->documentTypeDisplayText);
        $this->assertEquals(66.1, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->total);
        $this->assertEquals(76.2, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->debit);
        $this->assertEquals(86.4, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->credit);
        $this->assertEquals(96.5, $supplierTransactionListingReportDetails->results[1]->transactions->results[0]->runningTotal);

        $this->assertInstanceOf(TransactionListingDetail::class, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]);
        $this->assertEquals('sample business id7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->businessBaseId);
        $this->assertEquals(107, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->id);
        $this->assertEquals(57, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->documentTypeId);
        $this->assertEquals(47, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->linkId);
        $this->assertEquals('sample name 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->name);
        $this->assertEquals(7, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->currencyId);
        $this->assertEquals('sample currency symbol 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->currencySymbol);
        $this->assertEquals('sample doc number 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->documentNumber);
        $this->assertEquals('sample reference 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->reference);
        $this->assertEquals('sample currency symbol 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->comment);
        $this->assertEquals('2017-09-07', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->date->format('Y-m-d'));
        $this->assertEquals('sample description 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->description);
        $this->assertEquals('sample display 7', $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->documentTypeDisplayText);
        $this->assertEquals(67.1, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->total);
        $this->assertEquals(77.2, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->debit);
        $this->assertEquals(87.4, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->credit);
        $this->assertEquals(97.5, $supplierTransactionListingReportDetails->results[1]->transactions->results[1]->runningTotal);
    }

    public function testAllException()
    {
        $this->verifyAllException(SupplierTransactionListing::class);
    }

    public function testGetException()
    {
        $this->verifyGetException(SupplierTransactionListing::class);
    }

    public function testSaveException()
    {
        $this->verifySaveException(SupplierTransactionListing::class);
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(SupplierTransactionListing::class);
    }
}
