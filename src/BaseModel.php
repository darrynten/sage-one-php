<?php
/**
 * SageOne Library - Base Model
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne;

class BaseModel
{
    private $request;

    public function __construct(array $config)
    {
        $this->request = new RequestHandler($config);
    }

    public function loadFromJson(string $json)
    {
        $object = json_decode($json, true);

        foreach ($object as $key => $value) {
            $this->$key = $value;
        }
    }
}
