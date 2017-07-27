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
 * Attachment Model
 *
 * Details on writable properties for Account Note Attachment:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Attachment
 */
class Attachment extends BaseModel
{

    /**
     * @var string $endpoint
     */
    protected $endpoint = '';

    /**
     * @var array $fields
     */
    protected $fields = [
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false
        ],
        'size' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'attachmentUID' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'data' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];
}
