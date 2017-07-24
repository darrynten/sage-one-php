<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\SupplierStatement;
use DarrynTen\SageOne\Models\SupplierStatementLine;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\ModelCollection;

class SupplierStatementModelTest extends BaseModelTest
{
    public function testAttributes()
    {
        $this->verifyAttributes(SupplierStatement::class, [
            'supplier' => [
                'type' => 'Supplier',
                'nullable' => false,
                'readonly' => true
            ],
            'statementLines' => [
                'type' => 'SupplierStatementLine',
                'nullable' => false,
                'readonly' => true,
                'collection' => true
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => true,
            ],
            'totalDue' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'totalPaid' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'current' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'days30' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'days60' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'days90' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'days120Plus' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],

        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(SupplierStatement::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $model = $this->setUpRequestMock(
            'POST',
            SupplierStatement::class,
            'SupplierStatement/Get',
            'SupplierStatement/POST_SupplierStatement_Get_RESP.json',
            'SupplierStatement/POST_SupplierStatement_Get_REQ.json'
        );

        $response = $model->all();
        $this->assertCount(2, $response->results);

        $model1 = $response->results[0];
        $this->assertInstanceOf(SupplierStatement::class, $model1);
        $this->assertInstanceOf(Supplier::class, $model1->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $model1->supplier->category);
        $this->assertInstanceOf(ModelCollection::class, $model1->statementLines);
        $this->assertEquals('2017-07-22', $model1->date->format('Y-m-d'));
        $this->assertEquals(0.0, $model1->totalDue);
        $this->assertEquals(0.0, $model1->totalPaid);
        $this->assertEquals(2.0, $model1->current);
        $this->assertEquals(3.0, $model1->days30);
        $this->assertEquals(4.0, $model1->days60);
        $this->assertEquals(5.0, $model1->days90);
        $this->assertEquals(6.0, $model1->days120Plus);
        $this->assertCount(2, $model1->statementLines->results);
        $this->assertInstanceOf(SupplierStatementLine::class, $model1->statementLines->results[0]);
        $this->assertInstanceOf(SupplierStatementLine::class, $model1->statementLines->results[1]);
        $this->assertEquals(1, $model1->statementLines->results[0]->documentHeaderId);
        $this->assertEquals(2, $model1->statementLines->results[0]->documentTypeId);
        $this->assertEquals(1.0, $model1->statementLines->results[0]->debit);
        $this->assertEquals(2.0, $model1->statementLines->results[0]->credit);
        $this->assertEquals('2017-07-22', $model1->statementLines->results[0]->date->format('Y-m-d'));
        $this->assertEquals('sample string 4', $model1->statementLines->results[0]->documentNumber);
        $this->assertEquals('sample string 6', $model1->statementLines->results[0]->reference);
        $this->assertEquals('sample string 8', $model1->statementLines->results[0]->comment);
        $this->assertEquals(1, $model1->statementLines->results[1]->documentHeaderId);
        $this->assertEquals(2, $model1->statementLines->results[1]->documentTypeId);
        $this->assertEquals(1.0, $model1->statementLines->results[1]->debit);
        $this->assertEquals(2.0, $model1->statementLines->results[1]->credit);
        $this->assertEquals('2017-07-22', $model1->statementLines->results[1]->date->format('Y-m-d'));
        $this->assertEquals('sample string 4', $model1->statementLines->results[1]->documentNumber);
        $this->assertEquals('sample string 6', $model1->statementLines->results[1]->reference);
        $this->assertEquals('sample string 8', $model1->statementLines->results[1]->comment);
        $this->assertEquals('sample string 1', $model1->supplier->category->description);
        $this->assertEquals(2, $model1->supplier->category->id);
        $this->assertEquals('2017-07-22', $model1->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $model1->supplier->category->created->format('Y-m-d'));
        $this->assertEquals($model1->supplier->name, 'sample string 1');
        $this->assertEquals($model1->supplier->taxReference, 'sample string 2');
        $this->assertEquals($model1->supplier->contactName, 'sample string 3');
        $this->assertEquals($model1->supplier->telephone, 'sample string 4');
        $this->assertEquals($model1->supplier->fax, 'sample string 5');
        $this->assertEquals($model1->supplier->mobile, 'sample string 6');
        $this->assertEquals($model1->supplier->email, 'sample string 7');
        $this->assertEquals($model1->supplier->webAddress, 'sample string 8');
        $this->assertEquals(true, $model1->supplier->active);
        $this->assertEquals($model1->supplier->balance, 10.0);
        $this->assertEquals($model1->supplier->creditLimit, 11.0);
        $this->assertEquals($model1->supplier->postalAddress01, 'sample string 12');
        $this->assertEquals($model1->supplier->postalAddress02, 'sample string 13');
        $this->assertEquals($model1->supplier->postalAddress03, 'sample string 14');
        $this->assertEquals($model1->supplier->postalAddress04, 'sample string 15');
        $this->assertEquals($model1->supplier->postalAddress05, 'sample string 16');
        $this->assertEquals($model1->supplier->deliveryAddress01, 'sample string 17');
        $this->assertEquals($model1->supplier->deliveryAddress02, 'sample string 18');
        $this->assertEquals($model1->supplier->deliveryAddress03, 'sample string 19');
        $this->assertEquals($model1->supplier->deliveryAddress04, 'sample string 20');
        $this->assertEquals($model1->supplier->deliveryAddress05, 'sample string 21');
        $this->assertEquals(true, $model1->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals($model1->supplier->textField1, 'sample string 22');
        $this->assertEquals($model1->supplier->textField2, 'sample string 23');
        $this->assertEquals($model1->supplier->textField3, 'sample string 24');
        $this->assertEquals($model1->supplier->numericField1, 1.0);
        $this->assertEquals($model1->supplier->numericField2, 1.0);
        $this->assertEquals($model1->supplier->numericField3, 1.0);
        $this->assertEquals(true, $model1->supplier->yesNoField1);
        $this->assertEquals(true, $model1->supplier->yesNoField2);
        $this->assertEquals(true, $model1->supplier->yesNoField3);
        $this->assertEquals($model1->supplier->dateField1->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->dateField2->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->dateField3->format('Y-m-d'), '2017-07-22');
        $this->assertInstanceOf(\DateTime::class, $model1->supplier->modified);
        $this->assertEquals($model1->supplier->modified->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->modified->getTimezone()->getName(), 'UTC');
        $this->assertInstanceOf(\DateTime::class, $model1->supplier->created);
        $this->assertEquals($model1->supplier->created->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->created->getTimezone()->getName(), 'UTC');
        $this->assertEquals($model1->supplier->businessRegistrationNumber, 'sample string 29');
        $this->assertEquals($model1->supplier->RMCDApprovalNumber, 'sample string 30');
        $this->assertEquals($model1->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->currencyId, 1);
        $this->assertEquals($model1->supplier->currencySymbol, 'sample string 31');
        $this->assertEquals(true, $model1->supplier->hasActivity);
        $this->assertEquals($model1->supplier->defaultDiscountPercentage, 1.0);
        $this->assertEquals($model1->supplier->defaultTaxTypeId, 1);
        $this->assertInstanceOf(TaxType::class, $model1->supplier->defaultTaxType);
        $this->assertEquals($model1->supplier->defaultTaxType->id, 1);
        $this->assertEquals($model1->supplier->defaultTaxType->name, 'sample string 2');
        $this->assertEquals($model1->supplier->defaultTaxType->percentage, 3.1);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model1->supplier->defaultTaxType->isManualTax);
        $this->assertEquals($model1->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model1->supplier->dueDateMethodId, 1);
        $this->assertEquals($model1->supplier->dueDateMethodValue, 1);
        $this->assertEquals($model1->supplier->id, 33);

        $model2 = $response->results[0];
        $this->assertInstanceOf(SupplierStatement::class, $model2);
        $this->assertInstanceOf(Supplier::class, $model2->supplier);
        $this->assertInstanceOf(SupplierCategory::class, $model2->supplier->category);
        $this->assertInstanceOf(ModelCollection::class, $model2->statementLines);
        $this->assertEquals('2017-07-22', $model2->date->format('Y-m-d'));
        $this->assertEquals(0.0, $model2->totalDue);
        $this->assertEquals(0.0, $model2->totalPaid);
        $this->assertEquals(2.0, $model2->current);
        $this->assertEquals(3.0, $model2->days30);
        $this->assertEquals(4.0, $model2->days60);
        $this->assertEquals(5.0, $model2->days90);
        $this->assertEquals(6.0, $model2->days120Plus);
        $this->assertCount(2, $model2->statementLines->results);
        $this->assertInstanceOf(SupplierStatementLine::class, $model2->statementLines->results[0]);
        $this->assertInstanceOf(SupplierStatementLine::class, $model2->statementLines->results[1]);
        $this->assertEquals(1, $model2->statementLines->results[0]->documentHeaderId);
        $this->assertEquals(2, $model2->statementLines->results[0]->documentTypeId);
        $this->assertEquals(1.0, $model2->statementLines->results[0]->debit);
        $this->assertEquals(2.0, $model2->statementLines->results[0]->credit);
        $this->assertEquals('2017-07-22', $model2->statementLines->results[0]->date->format('Y-m-d'));
        $this->assertEquals('sample string 4', $model2->statementLines->results[0]->documentNumber);
        $this->assertEquals('sample string 6', $model2->statementLines->results[0]->reference);
        $this->assertEquals('sample string 8', $model2->statementLines->results[0]->comment);
        $this->assertEquals(1, $model2->statementLines->results[1]->documentHeaderId);
        $this->assertEquals(2, $model2->statementLines->results[1]->documentTypeId);
        $this->assertEquals(1.0, $model2->statementLines->results[1]->debit);
        $this->assertEquals(2.0, $model2->statementLines->results[1]->credit);
        $this->assertEquals('2017-07-22', $model2->statementLines->results[1]->date->format('Y-m-d'));
        $this->assertEquals('sample string 4', $model2->statementLines->results[1]->documentNumber);
        $this->assertEquals('sample string 6', $model2->statementLines->results[1]->reference);
        $this->assertEquals('sample string 8', $model2->statementLines->results[1]->comment);
        $this->assertEquals('sample string 1', $model2->supplier->category->description);
        $this->assertEquals(2, $model2->supplier->category->id);
        $this->assertEquals('2017-07-22', $model2->supplier->category->modified->format('Y-m-d'));
        $this->assertEquals('2017-07-22', $model2->supplier->category->created->format('Y-m-d'));
        $this->assertEquals($model2->supplier->name, 'sample string 1');
        $this->assertEquals($model2->supplier->taxReference, 'sample string 2');
        $this->assertEquals($model2->supplier->contactName, 'sample string 3');
        $this->assertEquals($model2->supplier->telephone, 'sample string 4');
        $this->assertEquals($model2->supplier->fax, 'sample string 5');
        $this->assertEquals($model2->supplier->mobile, 'sample string 6');
        $this->assertEquals($model2->supplier->email, 'sample string 7');
        $this->assertEquals($model2->supplier->webAddress, 'sample string 8');
        $this->assertEquals(true, $model2->supplier->active);
        $this->assertEquals($model2->supplier->balance, 10.0);
        $this->assertEquals($model2->supplier->creditLimit, 11.0);
        $this->assertEquals($model2->supplier->postalAddress01, 'sample string 12');
        $this->assertEquals($model2->supplier->postalAddress02, 'sample string 13');
        $this->assertEquals($model2->supplier->postalAddress03, 'sample string 14');
        $this->assertEquals($model2->supplier->postalAddress04, 'sample string 15');
        $this->assertEquals($model2->supplier->postalAddress05, 'sample string 16');
        $this->assertEquals($model2->supplier->deliveryAddress01, 'sample string 17');
        $this->assertEquals($model2->supplier->deliveryAddress02, 'sample string 18');
        $this->assertEquals($model2->supplier->deliveryAddress03, 'sample string 19');
        $this->assertEquals($model2->supplier->deliveryAddress04, 'sample string 20');
        $this->assertEquals($model2->supplier->deliveryAddress05, 'sample string 21');
        $this->assertEquals(true, $model2->supplier->autoAllocateToOldestInvoice);
        $this->assertEquals($model2->supplier->textField1, 'sample string 22');
        $this->assertEquals($model2->supplier->textField2, 'sample string 23');
        $this->assertEquals($model2->supplier->textField3, 'sample string 24');
        $this->assertEquals($model2->supplier->numericField1, 1.0);
        $this->assertEquals($model2->supplier->numericField2, 1.0);
        $this->assertEquals($model2->supplier->numericField3, 1.0);
        $this->assertEquals(true, $model2->supplier->yesNoField1);
        $this->assertEquals(true, $model2->supplier->yesNoField2);
        $this->assertEquals(true, $model2->supplier->yesNoField3);
        $this->assertEquals($model2->supplier->dateField1->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->dateField2->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->dateField3->format('Y-m-d'), '2017-07-22');
        $this->assertInstanceOf(\DateTime::class, $model2->supplier->modified);
        $this->assertEquals($model2->supplier->modified->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->modified->getTimezone()->getName(), 'UTC');
        $this->assertInstanceOf(\DateTime::class, $model2->supplier->created);
        $this->assertEquals($model2->supplier->created->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->created->getTimezone()->getName(), 'UTC');
        $this->assertEquals($model2->supplier->businessRegistrationNumber, 'sample string 29');
        $this->assertEquals($model2->supplier->RMCDApprovalNumber, 'sample string 30');
        $this->assertEquals($model2->supplier->taxStatusVerified->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->currencyId, 1);
        $this->assertEquals($model2->supplier->currencySymbol, 'sample string 31');
        $this->assertEquals(true, $model2->supplier->hasActivity);
        $this->assertEquals($model2->supplier->defaultDiscountPercentage, 1.0);
        $this->assertEquals($model2->supplier->defaultTaxTypeId, 1);
        $this->assertInstanceOf(TaxType::class, $model2->supplier->defaultTaxType);
        $this->assertEquals($model2->supplier->defaultTaxType->id, 1);
        $this->assertEquals($model2->supplier->defaultTaxType->name, 'sample string 2');
        $this->assertEquals($model2->supplier->defaultTaxType->percentage, 3.1);
        $this->assertEquals(true, $model2->supplier->defaultTaxType->isDefault);
        $this->assertEquals(true, $model2->supplier->defaultTaxType->hasActivity);
        $this->assertEquals(true, $model2->supplier->defaultTaxType->isManualTax);
        $this->assertEquals($model2->supplier->defaultTaxType->created->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->defaultTaxType->modified->format('Y-m-d'), '2017-07-22');
        $this->assertEquals($model2->supplier->dueDateMethodId, 1);
        $this->assertEquals($model2->supplier->dueDateMethodValue, 1);
        $this->assertEquals($model2->supplier->id, 33);
    }
}
