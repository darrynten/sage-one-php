<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\ExchangeRate;
use DarrynTen\SageOne\Models\ModelCollection;

class ExchangeRateModelTest extends BaseModelTest
{
    public function testAttributes()
    {
        $this->verifyAttributes(ExchangeRate::class, [
            'isBaseCurrency' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'baseCurrencyCode' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],
            'currencyCode' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],
            'currencyDescription' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],
            'currencySymbol' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],
            'hasActivity' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'isFutureRate' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'rateInverse' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'originalRateInverse' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'groupId' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],
            'rateDate' => [
                'type' => 'DateTime',
                'nullable' => false,
                'readonly' => true,
            ],
            'exchangeRateId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => true,
            ],
            'currencyId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => true,
            ],
            'rate' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'originalRate' => [
                'type' => 'double',
                'nullable' => false,
                'readonly' => true,
            ],
            'hasManualRate' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => true,
            ],
            'note' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => true,
            ],

        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(ExchangeRate::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(ExchangeRate::class, function ($results) {
            $this->assertEquals(2, count($results));
            $model1 = $results[0];
            $model2 = $results[1];

            $this->assertInstanceOf(ExchangeRate::class, $model1);
            $this->assertInstanceOf(ExchangeRate::class, $model2);

            $this->assertEquals(true, $model1->isBaseCurrency);
            $this->assertEquals('sample string 2', $model1->baseCurrencyCode);
            $this->assertEquals('sample string 3', $model1->currencyCode);
            $this->assertEquals('sample string 4', $model1->currencyDescription);
            $this->assertEquals('sample string 5', $model1->currencySymbol);
            $this->assertEquals(true, $model1->hasActivity);
            $this->assertEquals(true, $model1->isFutureRate);
            $this->assertEquals(0.083333333333333329, $model1->rateInverse);
            $this->assertEquals(0.076923076923076927, $model1->originalRateInverse);
            $this->assertEquals('603f71f8-824e-4b3b-9d21-0a94aa06396b', $model1->groupId);
            $this->assertEquals('2017-07-22', $model1->rateDate->format('Y-m-d'));
            $this->assertEquals(10, $model1->exchangeRateId);
            $this->assertEquals(11, $model1->currencyId);
            $this->assertEquals(12.0, $model1->rate);
            $this->assertEquals(13.0, $model1->originalRate);
            $this->assertEquals(true, $model1->hasManualRate);
            $this->assertEquals('sample string 15', $model1->note);

            $this->assertEquals(true, $model2->isBaseCurrency);
            $this->assertEquals('sample string 2', $model2->baseCurrencyCode);
            $this->assertEquals('sample string 3', $model2->currencyCode);
            $this->assertEquals('sample string 4', $model2->currencyDescription);
            $this->assertEquals('sample string 5', $model2->currencySymbol);
            $this->assertEquals(true, $model2->hasActivity);
            $this->assertEquals(true, $model2->isFutureRate);
            $this->assertEquals(0.083333333333333329, $model2->rateInverse);
            $this->assertEquals(0.076923076923076927, $model2->originalRateInverse);
            $this->assertEquals('603f71f8-824e-4b3b-9d21-0a94aa06396b', $model2->groupId);
            $this->assertEquals('2017-07-22', $model2->rateDate->format('Y-m-d'));
            $this->assertEquals(10, $model2->exchangeRateId);
            $this->assertEquals(11, $model2->currencyId);
            $this->assertEquals(12.0, $model2->rate);
            $this->assertEquals(13.0, $model2->originalRate);
            $this->assertEquals(true, $model2->hasManualRate);
            $this->assertEquals('sample string 15', $model2->note);
        });
    }
}
