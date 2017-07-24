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
 * NotYetImplemented exception for SageOne
 *
 * @package SageOne
 */
class NotYetImplementedException extends Exception
{
    const METHOD_NOT_IMPLEMENTED = 10301;

    /**
     * Custom NotYetImplemented exception handler
     * @var int $code default code [10300]
     * @var string $methodAddress should contain method address.
     */
    public function __construct($code = 10300, $methodAddress = '')
    {
        $message = sprintf(
            'Error, "%s" %s',
            $methodAddress,
            ExceptionMessages::$notYetImplementedErrorMessages[$code]
        );
        parent::__construct($message, $code);
    }
}
