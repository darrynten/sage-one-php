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

use DarrynTen\SageOne\Models\ModelCollection;
use DarrynTen\SageOne\Models\AnalysisCategory;
use DarrynTen\SageOne\Exception\ModelCollectionException;

/**
 * Analysis Category Collection
 *
 * A wrapper class for the array of Analysis Categories returned by Analysis Type
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AnalysisType
 */
class AnalysisCategoryCollection extends ModelCollection
{
    /*
     * This class can only return the results array
     */
    public function __get($key)
    {
        if ($key === 'results') {
            return $this->{$key};
        }

        throw new ModelCollectionException(ModelCollectionException::GETTING_UNDEFINED_PROPERTY, $key);
    }

}