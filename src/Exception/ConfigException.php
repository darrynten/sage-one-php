<?php
/**
 * SageOne API Exception
 *
 * @category Exception
 * @package  SageOne
 * @author   Fergus Strangways-Dixon <fergusdixon@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Exception;

use Exception;
use DarrynTen\SageOne\Exception\ExceptionMessages;

/**
 * Config exception for SageOne
 *
 * @package SageOne
 */
class ConfigException extends Exception
{
    const MISSING_USERNAME = 10401;
    const MISSING_PASSWORD = 10402;
    const MISSING_API_KEY = 10403;

    /**
     * Custom Configs exception handler
     *
     *
     * @var integer $code The error code (as per above) [10400 is Generic code]
     * @var string $extra Any additional information to be included
     */
    public function __construct($code = 10400)
    {
        $message = sprintf(
            'Config %s',
            ExceptionMessages::$configErrorMessages[$code]
        );

        parent::__construct($message, $code);
    }
}
