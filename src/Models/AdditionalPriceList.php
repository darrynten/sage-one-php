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
 * Additional Price List Model
 *
 * Details on writable properties for Additional Price List:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AdditionalPriceList
 */
class AdditionalPriceList extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AdditionalPriceList';

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
            'min' => 0,
            'max' => 100,
        ],
        'isDefault' => [
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
        'save' => true,
        'delete' => true
    ];

    /**
     * Confirms if Additional Price List is in use by an Additional Item Price or a Customer.
     *
     * @return bool
     */
    public function allowDelete()
    {
        return $this->request->request('POST', $this->endpoint, 'AllowDelete');
    }

    /**
     * Gets a list of Additional Price Lists based on the list of identifiers.
     *
     * @param array $ids The list of identifiers
     * @return ModelCollection
     */
    public function getListsById(array $ids)
    {
        $response = $this->request->request('POST', $this->endpoint, 'Get', $ids);
        return new ModelCollection(AdditionalPriceList::class, $this->config, $response);
    }
}
