<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\EmailTemplatePlaceHolder;

class EmailTemplatePlaceHolderModelTest extends BaseModelTest
{
    public function testInstanceOf()
    {
        $this->verifyInstanceOf(EmailTemplatePlaceHolder::class);
    }

    public function testSetUndefined()
    {
        $this->verifySetUndefined(EmailTemplatePlaceHolder::class);
    }

    public function testGetUndefined()
    {
        $this->verifyGetUndefined(EmailTemplatePlaceHolder::class);
    }

    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(EmailTemplatePlaceHolder::class, 'id');
    }

    public function testBadImport()
    {
        $this->verifyBadImport(EmailTemplatePlaceHolder::class, 'emailTemplateTypeId');
    }

    public function testAttributes()
    {
        $this->verifyAttributes(EmailTemplatePlaceHolder::class, [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'emailTemplateTypeId' => [
                'type' => 'integer',
                'nullable' => false,
                'readonly' => false,
            ],
            'placeHolder' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'propertyName' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
            'type' => [
                'type' => 'string',
                'nullable' => false,
                'readonly' => false,
            ],
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(EmailTemplatePlaceHolder::class, [
            'all' => true, 'get' => false, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $this->verifyGetAll(EmailTemplatePlaceHolder::class, function ($results) {
            $this->assertCount(2, $results);

            $this->assertInstanceOf(EmailTemplatePlaceHolder::class, $results[0]);
            $this->assertInstanceOf(EmailTemplatePlaceHolder::class, $results[1]);

            $model1 = $results[0];
            $this->assertEquals($model1->id, 1);
            $this->assertEquals($model1->emailTemplateTypeId, 2);
            $this->assertEquals($model1->placeHolder, 'sample string 3');
            $this->assertEquals($model1->propertyName, 'sample string 4');
            $this->assertEquals($model1->type, 'sample string 5');

            $model2 = $results[1];
            $this->assertEquals($model2->id, 11);
            $this->assertEquals($model2->emailTemplateTypeId, 12);
            $this->assertEquals($model2->placeHolder, 'sample string 13');
            $this->assertEquals($model2->propertyName, 'sample string 14');
            $this->assertEquals($model2->type, 'sample string 15');

            $this->assertCount(5, json_decode($model1->toJson(), true));
            $this->assertCount(5, json_decode($model2->toJson(), true));
        });
    }
}
