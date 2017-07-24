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
 * NotYetImplemented exception for SageOne
 *
 * @package SageOne
 */
class LibraryException extends Exception
{
    const METHOD_NOT_IMPLEMENTED = 10301;

    /**
     * Custom NotYetImplemented exception handler
     * @var int $code default code [10300]
     * @var string $address should contain address.
     */
    public function __construct($code = 10300, $address = '')
    {
        $message = sprintf(
            'Error, "%s" %s. This still needs to be added, please consider contributing to the project.',
            $address,
            ExceptionMessages::$libraryErrorMessages[$code]
        );
        parent::__construct($message, $code);
    }
}
