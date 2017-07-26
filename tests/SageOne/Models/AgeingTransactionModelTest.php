<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Exception\ModelException;
use DarrynTen\SageOne\Models\AgeingTransaction;

class AgeingTransactionModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(AgeingTransaction::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(AgeingTransaction::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(AgeingTransaction::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(AgeingTransaction::class, 'documentHeaderId');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(AgeingTransaction::class, 'dueDate');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(AgeingTransaction::class, 'documentHeaderId');
    }

    public function testInject()
    {
        $ageingTransaction = new AgeingTransaction($this->config);
        $data = json_decode(file_get_contents(__DIR__ . "/../../mocks/AgeingTransaction/AgeingTransaction_xx.json"));
        $ageingTransaction->loadResult($data);

        $this->assertInstanceOf(AgeingTransaction::class, $ageingTransaction);
        $this->assertEquals(1, $ageingTransaction->documentHeaderId);
        $this->assertEquals(2, $ageingTransaction->documentTypeId);
        $this->assertEquals('sample string 3', $ageingTransaction->documentNumber);
        $this->assertEquals('sample string 4', $ageingTransaction->reference);
        $this->assertEquals(2, $ageingTransaction->documentType);
        $this->assertEquals('sample string 5', $ageingTransaction->comment);
        $this->assertEquals('2017-07-24', $ageingTransaction->date->format('Y-m-d'));
        $this->assertEquals('2017-07-24', $ageingTransaction->dueDate->format('Y-m-d'));
        $this->assertEquals(45.0, $ageingTransaction->total);
        $this->assertEquals(7.0, $ageingTransaction->current);
        $this->assertEquals(8.0, $ageingTransaction->days30);
        $this->assertEquals(9.0, $ageingTransaction->days60);
        $this->assertEquals(10.0, $ageingTransaction->days90);
        $this->assertEquals(11.0, $ageingTransaction->days120Plus);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(AgeingTransaction::class, [
            'all' => false, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testAllException()
    {
        $this->verifyAllException(AgeingTransaction::class);
    }

    public function testGetException()
    {
        $this->verifyGetException(AgeingTransaction::class);
    }

    public function testSaveException()
    {
        $this->verifySaveException(AgeingTransaction::class);
    }

    public function testDeleteException()
    {
        $this->verifyDeleteException(AgeingTransaction::class);
    }

    public function testBadEnumException()
    {
        $this->verifyBadEnum(AgeingTransaction::class, 'documentTypeId', 20);
    }

    public function testAttributes()
    {
        $this->verifyAttributes(AgeingTransaction::class, [
            'documentHeaderId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'documentTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'enum' => 'documentTypes',
            ],
            'documentNumber' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'reference' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'documentType' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'comment' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
            ],
            'dueDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'total' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'current' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'days30' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'days60' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'days90' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'days120Plus' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }
}
