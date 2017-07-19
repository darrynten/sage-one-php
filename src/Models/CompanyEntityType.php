<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Brian Maiyo <kipropbrian@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Company Entity Type Model
 *
 * The Company Entity Type Model provides methods that allow for the retrieval Company Entity Types:
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_CompanyEntityType
 */
class CompanyEntityType extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'CompanyEntityType';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'countryId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'ownershipDescription' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'holdingDescription' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'holdingUnit' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
        ],
        'canIssueShares' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => false,
        'delete' => false
    ];
}
