<?php

namespace DarrynTen\SageOne\Exception;

/**
 * Exception message strings for the ApiException object that gets throws.
 *
 * Maps to the SageOne docs.
 */
class ExceptionMessages
{
    // Model codes 101xx
    public static $modelErrorMessages = [
        // Methods
        10100 => 'Undefined model exception',
        10101 => 'Get all is not supported',
        10102 => 'Get single is not supported',
        10103 => 'Save is not supported',
        10104 => 'Delete is not supported',
        // Properties
        10110 => 'Property is referencing an undefined, non-primitive class',
        10111 => 'Property is null without nullable permission',
        10112 => 'A property is missing in the loadResult payload',
        10113 => 'Attempting to set a property that is not defined in the model',
        10114 => 'Attempting to set a read-only property',
        10115 => 'Unexpected class encountered while preparing row',
        10116 => 'Attempting to get an undefined property',
    ];

    // Validation codes 1012x
    public static $validationMessages = [
        10200 => 'Unknown validation error',
        10201 => 'Integer value is out of range',
        10202 => 'String length is out of range',
        10203 => 'String did not match validation regex',
        10204 => 'Validation type is invalid',
    ];

    // Maps to standard HTTP error codes
    public static $strings = [
        400 => 'A malformed request was sent through or when a validation rule '
             . 'failed. Validation messages are returned in the response body.',
        401 => 'The user is not correctly authenticated and the call requires '
             . 'authentication. The user does not have access rights for this method.',
        402 => 'The registration has expired and payment is required.',
        404 => 'The requested entity was not found. Entities are bound to '
             . 'companies. Ensure the entity belongs to the company.',
        405 => 'HTTP Verb is not specified or incorrect verb is used. Or The user '
             . 'does not have access to the specified method. This applies to '
             . 'invited users.',
        409 => 'Attempting to delete an item that is currently in use.',
        415 => 'A valid Content-Type header such as application/json is required on '
             . 'all requests.',
        429 => 'The limit of 100 requests per minute per company is exceeded or '
             . 'more there are more than 20 failed login attempts.',
        500 => 'Internal server error',
        503 => 'The service is down for scheduled maintainance',
    ];
}
