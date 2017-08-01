<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\BankFeedAccount;


class BankFeedAccountModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(BankFeedAccount::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(BankFeedAccount::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(BankFeedAccount::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(BankFeedAccount::class, 'id');
    }

    public function testCanNullify()
    {
        $this->verifyCanNullify(BankFeedAccount::class, 'balance');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(BankFeedAccount::class, 'bankFeedAccountGroupId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(BankFeedAccount::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankFeedAccountGroupId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'bankFeedAccountGroup' => [
                'type' => 'BankFeedAccountGroup',
                'nullable' => false,
                'readonly' => false,
            ],
            'description' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'identifier' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'lastRefreshDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'firstImportDate' => [
                'type' => 'DateTime',
                'nullable' => true,
                'readonly' => false,
            ],
            'balance' => [
                'type' => 'double',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankAccountId' => [
                'type' => 'integer',
                'nullable' => true,
                'readonly' => false,
            ],
            'bankAccountName' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
            ],
            'lastRefreshStatusId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }
}
