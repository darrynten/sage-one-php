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
 * Custom exception for SageOne
 *
 * @package SageOne
 */
class RequestHandlerException extends Exception
{
    const MALFORMED_REQUEST = 400;
    const USER_AUTHENTICATION_ERROR = 401;
    const PAYMENT_REQUIRED = 402;
    const ENTITY_NOT_FOUND = 404;
    const HTTP_VERB_ERROR = 405;
    const DELETING_ITEM_IN_USE = 409;
    const CONTENT_TYPE_HEADER_ERROR = 415;
    const REQUEST_OVERLOAD = 429;
    const INTERNAL_SERVER_ERROR = 500;
    const SCHEDULED_MAINTENANCE = 503;
    
    /**
     * @inheritdoc
     */
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        // Construct message from JSON if required.
        if (preg_match('/^[\[\{]\"/', $message)) {
            $messageObject = json_decode($message);
            $message = sprintf(
                '%s: %s - %s',
                $messageObject->status,
                $messageObject->title,
                $messageObject->detail
            );
            if (!empty($messageObject->errors)) {
                $message .= ' - errors: ' . json_encode($messageObject->errors);
            }
        }

        parent::__construct($message, $code, $previous);
    }
}
