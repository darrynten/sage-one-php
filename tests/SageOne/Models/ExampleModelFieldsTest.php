<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Example;

class ExampleModelFieldsTest extends BaseModelTest
{
    public function testAttributes()
    {
        $this->verifyAttributes(Example::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'exampleWithCamel' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => true,
            ],
            'stringRange' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
                'min' => 1,
                'max' => 10,
            ],
            'stringWithDefault' => [
                'type' => 'string',
                'nullable' => true,
                'readonly' => false,
                'default' => 'some default value',
            ],
            'integerRange' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
                'min' => 1,
                'max' => 2147483647,
            ],
            'someBoolean' => [
                'type' => 'boolean',
                'nullable' => false,
                'readonly' => false,
            ],
            'requiredString' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'required' => true,
            ],
            'emailAddress' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
                'min' => 0,
                'max' => 100,
                'regex' => "/^[A-Za-z0-9,!#\$%&'\*\+\/=\?\^_`\{\|}~-]+(\.[A-Za-z0-9,!#\$%&'\*\+\/=\?\^_`\{\|}~-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*\.([A-Za-z]{2,})$/"
            ],
        ]);
    }
}
