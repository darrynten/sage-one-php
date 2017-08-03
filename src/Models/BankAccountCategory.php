
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
 * Bank Account Category Model
 *
 * Details on writable properties for Bank Account Category:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=BankAccountCategory
 */
class BankAccountCategory extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'BankAccountCategory';
    
    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
    ];
    
    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];
}
