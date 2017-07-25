<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Vitaliy Likhachev <make.it.git@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Company Logo Model
 *
 * Details on writable properties for Company Logo:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=CompanyLogo
 */
class CompanyLogo extends BaseModel
{
    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'image' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'timestamp' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
    ];
}
