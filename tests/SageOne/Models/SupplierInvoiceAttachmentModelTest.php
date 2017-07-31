<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierInvoiceAttachment;
use DarrynTen\SageOne\Models\Attachment;
use DarrynTen\SageOne\Models\CompanyStorageInformation;
use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Exception\LibraryException;
use ReflectionClass;

class SupplierInvoiceAttachmentModelTest extends BaseModelTest
{
    public function testAttributes()
    {
        $this->verifyAttributes(SupplierInvoiceAttachment::class, []);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierInvoiceAttachment::class, [
            'all' => false, 'get' => true, 'delete' => true, 'save' => true
        ]);
    }

    public function testFeatureGet()
    {
        $model = new SupplierInvoiceAttachment($this->config);
        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('featureGetReturns');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue($model);

        $this->assertCount(2, $value);
        $this->assertEquals('Attachment', $value['type']);
        $this->assertEquals(true, $value['collection']);
    }

    public function testFeatureGetException()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/Get/1',
            'SupplierInvoiceAttachment/GET_SupplierInvoiceAttachment_Get_xx.json'
        );

        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('featureGetReturns');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue($model);
        $value['type'] = 'InvalidClass';
        $reflectValue->setValue($model, $value);

        $this->expectException(ModelException::class);
        $this->expectExceptionMessage('Model "SupplierInvoiceAttachment" Received namespaced class "DarrynTen\SageOne\Models\InvalidClass" which does not exist Property is referencing an undefined, non-primitive class');
        $this->expectExceptionCode(10110);

        $model->get(1);
    }

    public function testFeatureGetExceptionUnimplemented()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/Get/1',
            'SupplierInvoiceAttachment/GET_SupplierInvoiceAttachment_Get_xx.json'
        );

        $reflect = new ReflectionClass($model);
        $reflectValue = $reflect->getProperty('featureGetReturns');
        $reflectValue->setAccessible(true);
        $value = $reflectValue->getValue($model);
        $value['collection'] = false;
        $reflectValue->setValue($model, $value);

        $this->expectException(LibraryException::class);
        $this->expectExceptionMessage('Error, "DarrynTen\SageOne\Models\SupplierInvoiceAttachment:get()" Method not yet implemented. This still needs to be added, please consider contributing to the project');
        $this->expectExceptionCode(10301);
        $model->get(1);
    }

    public function testGetId()
    {
        $this->verifyGetId(SupplierInvoiceAttachment::class, 1, function ($collection) {
            $this->assertInstanceOf(ModelCollection::class, $collection);
            $this->assertCount(2, $collection->results);

            $this->assertInstanceOf(Attachment::class, $collection->results[0]);
            $this->assertInstanceOf(Attachment::class, $collection->results[1]);

            $this->assertEquals('sample string 1', $collection->results[0]->name);
            $this->assertEquals('sample string 1', $collection->results[1]->name);
            $this->assertEquals(2, $collection->results[0]->size);
            $this->assertEquals(2, $collection->results[1]->size);
            $this->assertEquals('09975bb7-50d5-4b45-b876-9281ec08c336', $collection->results[1]->attachmentUID);
            $this->assertEquals('09975bb7-50d5-4b45-b876-9281ec08c336', $collection->results[0]->attachmentUID);
            $this->assertEquals('QEA=', $collection->results[1]->data);
            $this->assertEquals('QEA=', $collection->results[0]->data);
        });
    }

    public function testDownload()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/Download/c37fbc7d-0a09-4990-9a55-b889f6699617',
            'files/test.png'
        );

        $fileContent = $model->download('c37fbc7d-0a09-4990-9a55-b889f6699617');
        $tmpFile = tmpfile();
        fwrite($tmpFile, $fileContent);

        $tmpFilePath = stream_get_meta_data($tmpFile)['uri'];
        $savedFileMD5 = md5_file($tmpFilePath);
        $originalFileMD5 = md5_file(__DIR__ . '/../../mocks/files/test.png');
        $this->assertEquals($savedFileMD5, $originalFileMD5);

        fclose($tmpFile);
    }

    public function testGetCompanyStorageInformation()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/GetCompanyStorageInformation',
            'SupplierInvoiceAttachment/GET_SupplierInvoiceAttachment_GetCompanyStorageInformation.json'
        );

        $response = $model->getCompanyStorageInformation();
        $this->assertInstanceOf(CompanyStorageInformation::class, $response);
        $this->assertEquals(1, $response->sizeUsed);
        $this->assertEquals(2, $response->maxSizeAllowed);
    }

    public function testDelete()
    {
        $this->verifyDelete(SupplierInvoiceAttachment::class, 'c37fbc7d-0a09-4990-9a55-b889f6699617', true);
    }

    public function testDeleteFail()
    {
        $this->verifyDelete(SupplierInvoiceAttachment::class, 'c37fbc7d-0a09-4990-9a55-b889f6699617', false);
    }

    public function testDeleteAll()
    {
        $model = $this->setUpRequestMock(
            'DELETE',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/DeleteAll/c37fbc7d-0a09-4990-9a55-b889f6699617',
            null,
            null,
            [],
            204
        );

        $this->assertEquals(true, $model->deleteAll('c37fbc7d-0a09-4990-9a55-b889f6699617'));
    }

    public function testDeleteAllFail()
    {
        $model = $this->setUpRequestMock(
            'DELETE',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/DeleteAll/c37fbc7d-0a09-4990-9a55-b889f6699617',
            null,
            null,
            [],
            300 // We set code 300 for now (which is invalid of course)
        );

        $this->assertEquals(false, $model->deleteAll('c37fbc7d-0a09-4990-9a55-b889f6699617'));
    }

    public function testAllowDelete()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/AllowDelete/c37fbc7d-0a09-4990-9a55-b889f6699617',
            'SupplierInvoiceAttachment/GET_SupplierInvoiceAttachment_AllowDelete.json'
        );

        $this->assertEquals(true, $model->allowDelete('c37fbc7d-0a09-4990-9a55-b889f6699617'));
    }

    public function testAllowDeleteFail()
    {
        $model = $this->setUpRequestMock(
            'GET',
            SupplierInvoiceAttachment::class,
            'SupplierInvoiceAttachment/AllowDelete/c37fbc7d-0a09-4990-9a55-b889f6699617',
            'SupplierInvoiceAttachment/GET_SupplierInvoiceAttachment_AllowDelete_Fail.json'
        );

        $this->assertEquals(false, $model->allowDelete('c37fbc7d-0a09-4990-9a55-b889f6699617'));
    }

    public function testValidate()
    {
        $model = new SupplierInvoiceAttachment($this->config);

        $this->expectException(LibraryException::class);
        $this->expectExceptionMessage('Error, "\DarrynTen\SageOne\Models\SupplierInvoiceAttachment::validate()" Method not yet implemented. This still needs to be added, please consider contributing to the project..');
        $this->expectExceptionCode(10301);

        $model->validate();
    }
}
