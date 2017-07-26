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
 * Company Storage Information Model
 *
 */
class CompanyStorageInformation extends BaseModel
{

    /**
     * @var array $fields
     */
    protected $fields = [
        'sizeUsed' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'maxSizeAllowed' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ]
    ];
}
