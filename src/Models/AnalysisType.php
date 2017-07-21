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
 * AnalysisType model
 *
 * The Analysis Type Service provides methods that allow for the retrieval, creation and deletion of Analysis Types.
 * https://accounting.sageone.co.za/api/1.1.2/Help#bookmark_AnalysisType
 */
class AnalysisType extends BaseModel
{
    /**
     * The API Endpoint
     *
     * @var string $endpoint
     */
    protected $endpoint = 'AnalysisType';

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
        'analysisCategories' => [
            'type' => 'AnalysisCategory',
            'collection' => true,
            'nullable' => false,
            'readonly' => false,
        ],
        'active' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],

    ];

    /**
     * Features supported by the endpoint
     *
     * These features enable and disable certain calls from the base model
     *
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];

    public function saveBatch()
    {
        return $this->request->request('POST', $this->endpoint, 'SaveBatch');
    }
}
