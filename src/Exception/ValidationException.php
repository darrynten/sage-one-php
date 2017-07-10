<?php
/**
 * SageOne API Exception
 *
 * @category Exception
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Exception;

use Exception;
use DarrynTen\SageOne\Exception\ExceptionMessages;

/**
 * Validation exception for SageOne
 *
 * @package SageOne
 */
class ValidationException extends Exception
{
    const INTEGER_OUT_OF_RANGE = 10201;
    const STRING_LENGTH_OUT_OF_RANGE = 10202;
    const STRING_REGEX_MISMATCH = 10203;
    const VALIDATION_TYPE_ERROR = 10204;

    /**
     * Custom Model exception handler
     *
     * @var string $endpoint The name of the model
     * @var integer $code The error code (as per above) [10200 is Generic code]
     * @var string $extra Any additional information to be included
     */
    public function __construct($code = 10200, $extra = '')
    {
        $message = sprintf(
            'Validation error %s %s',
            $extra,
            ExceptionMessages::$validationMessages[$code]
        );

        parent::__construct($message, $code);
    }
}
