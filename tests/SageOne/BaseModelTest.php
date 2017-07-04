<?php

namespace DarrynTen\SageOne\Tests\SageOne;

use DarrynTen\SageOne\BaseModel;
use DarrynTen\SageOne\Exception\ModelException;

class BaseModelTest extends \PHPUnit_Framework_TestCase
{
    private $config = [
        'username' => 'username',
        'password' => 'password',
        'key' => 'key',
        'endpoint' => '//localhost:8082',
        'version' => '1.1.2',
        'clientId' => null
    ];

    public function testAllException()
    {
        $this->expectException(ModelException::class);

        $model = new BaseModel($this->config);
        $all = $model->all();
    }

    public function testGetException()
    {
        $this->expectException(ModelException::class);

        $model = new BaseModel($this->config);
        $all = $model->get(11);
    }

    public function testSaveException()
    {
        $this->expectException(ModelException::class);

        $model = new BaseModel($this->config);
        $all = $model->save();
    }

    public function testDeleteException()
    {
        $this->expectException(ModelException::class);

        $model = new BaseModel($this->config);
        $all = $model->delete(11);
    }
}
