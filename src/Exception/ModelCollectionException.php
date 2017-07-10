<?php
/**
 * SageOne API Exception
 *
 * @category Exception
 * @package  SageOne
 * @author   Vitaliy Likhachev <make.it.git@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Exception;

use Exception;
use DarrynTen\SageOne\Exception\ExceptionMessages;

/**
 * Model collection exception for SageOne
 *
 * @package SageOne
 */
class ModelCollectionException extends Exception
{
    const GETTING_UNDEFINED_PROPERTY = 10201;
    const MISSING_REQUIRED_PROPERTY = 10202;

    /**
     * Custom Model collection exception handler
     *
     * @var integer $code The error code [10200 is default]
     * @var string $extra Any additional information to be included
     */
    public function __construct($code = 10200, $extra = '')
    {
        $message = sprintf(
            'ModelCollection %s %s',
            ExceptionMessages::$modelCollectionErrorMessages[$code],
            $extra
        );

        parent::__construct($message, $code);
    }
}
