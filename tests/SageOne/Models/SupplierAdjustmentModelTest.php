<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Supplier;
use DarrynTen\SageOne\Models\SupplierAdjustment;
use DarrynTen\SageOne\Models\Account;
use DarrynTen\SageOne\Models\TaxType;
use DarrynTen\SageOne\Models\SupplierCategory;
use DarrynTen\SageOne\Request\RequestHandler;
use GuzzleHttp\Client;
use ReflectionClass;
use DarrynTen\SageOne\Exception\ModelException;

class SupplierAdjustmentModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(SupplierAdjustment::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(SupplierAdjustment::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(SupplierAdjustment::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(SupplierAdjustment::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(SupplierAdjustment::class, 'analysisCategoryId1');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(SupplierAdjustment::class, 'date');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(SupplierAdjustment::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'date' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'supplierId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
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
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'taxTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'exclusive' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'tax' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'total' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => false,
            ],
            'contraAccountId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'memo' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'hasAttachment' => [
                'type' => 'bool',
                'nullable' => false,
                'readonly' => false,
            ],
            'supplier' => [
                'type' => 'Supplier',
                'nullable' => false,
                'readonly' => false,
            ],
            'accountName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'analysisCategoryId1' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'analysisCategoryId2' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'analysisCategoryId3' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'account' => [
                'type' => 'Account',
                'nullable' => false,
                'readonly' => true,
            ],
            'locked' => [
                'type' => 'bool',
                'nullable' => false,
                'readonly' => true,
            ],
            'taxPeriodId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => true,
            ],
            'totalOutstanding' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => true,
            ],
            'supplier_CurrencyId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'supplier_ExchangeRate' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ]
        ]);
    }
}
