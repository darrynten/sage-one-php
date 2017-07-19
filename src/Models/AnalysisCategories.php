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

/**
 * Account Opening Balance model
 *
 * Details on writable properties for Account Opening Balace
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=AnalysisType
 */
class AnalysisCategories extends ModelCollection
{
	protected $fields = [
		'categories' => [
            'type' => 'collection',
            'nullable' => false,
            'readonly' => false,
        ],
	];
    
	// public function __construct($class, $config, $results)
 //    {
	// 	protected $arr = array(1);
	// 	protected $config = [
	// 	    'username' => 'username',
	// 	    'password' => 'password',
	// 	    'key' => 'key',
	// 	    'endpoint' => '//localhost:8082',
	// 	    'version' => '1.1.2',
	// 	    'companyId' => null,
	// 	];
 //    	parent::__construct($class, $config, $results);
 //    }
}