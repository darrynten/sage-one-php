<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Fergus Strangways-Dixon <fergusdixon@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Company Note Model
 *
 * Details on writable properties for Company Note:
 * https://accounting.sageone.co.za/api/1.1.2#bookmark_CompanyNote
 */
class CompanyNote extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'CompanyNote';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'subject' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
            'min' => 0,
            'max' => 100,
        ],
        'entryDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'actionDate' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
        ],
        'status' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'note' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'hasAttachments' => [
            'type' => 'boolean',
            'nullable' => true,
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
        'delete' => true,
    ];

    /**
     * Returns a collection of company notes.
     *
     * @var string $id id of specific ??company or note??
     * @return ModelCollection A collection of company notes
     * @link https://accounting.sageone.co.za/api/1.1.2/Help/Api/GET-CompanyNote-GetCompanyNotes-id
     */
    public function getCompanyNotes(string $id)
    {
        $results = $this->request->request('GET', $this->endpoint, sprintf('GetCompanyNotes/%s', $id));
        return new ModelCollection(CompanyNote::class, $this->config, $results);
    }
}