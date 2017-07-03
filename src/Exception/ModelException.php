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

/**
 * Model exception for SageOne
 *
 * @package SageOne
 */
class ModelException extends Exception
{

    /**
     * @inheritdoc
     */
    public function __construct($message = 'Model Exception', $code = 100)
    {
        parent::__construct($message, $code);
    }
}
