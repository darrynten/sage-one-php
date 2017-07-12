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

use DarrynTen\SageOne\Exception\ModelCollectionException;

/**
 * Paging response of model
 *
 */
class ModelCollection
{
    /**
     * @var integer $totalResults
     */
    protected $totalResults;

    /**
     * @var integer $returnedResults
     */
    protected $returnedResults;

    /**
     * @var array $results
     */
    protected $results;

    /**
     * @var array $keys list available keys on ModelCollection
     */
    private $keys = ['totalResults', 'returnedResults', 'results'];

    /**
     *
     * @param string $key Desired property
     *
     * @throws ModelCollectionException
     */
    public function __get($key)
    {
        if (array_search($key, $this->keys) !== false) {
            return $this->{$key};
        }

        throw new ModelCollectionException(ModelCollectionException::GETTING_UNDEFINED_PROPERTY, $key);
    }

    /**
     * @var string $class Full path to the class
     * @var array $config Configuration array
     * @var stdClass $results object in format of pagination response from SageOne
     */
    public function __construct($class, $config, \stdClass $results)
    {
        if (!property_exists($results, 'TotalResults')) {
            throw new ModelCollectionException(
                ModelCollectionException::MISSING_REQUIRED_PROPERTY,
                'TotalResults'
            );
        }
        if (!property_exists($results, 'ReturnedResults')) {
            throw new ModelCollectionException(
                ModelCollectionException::MISSING_REQUIRED_PROPERTY,
                'ReturnedResults'
            );
        }
        if (!property_exists($results, 'Results')) {
            throw new ModelCollectionException(
                ModelCollectionException::MISSING_REQUIRED_PROPERTY,
                'Results'
            );
        }

        $models = [];
        foreach ($results->Results as $result) {
            $model = new $class($config);
            $model->loadResult($result);
            $models[] = $model;
        }

        $this->totalResults = $results->TotalResults;
        $this->returnedResults = $results->ReturnedResults;
        $this->results = $models;
    }
}
