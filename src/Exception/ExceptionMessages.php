<?php

namespace DarrynTen\SageOne\Exception;

class ExceptionMessages
{
    public static $strings = [
        400 => 'A malformed request was sent through or when a validation rule failed. Validation messages are returned in the response body.',
        401 => 'The user is not correctly authenticated and the call requires authentication. The user does not have access rights for this method.',
        402 => 'The registration has expired and payment is required.',
        404 => 'The requested entity was not found. Entities are bound to companies. Ensure the entity belongs to the company.',
        405 => 'HTTP Verb is not specified or incorrect verb is used. Or The user does not have access to the specified method. This applies to invited users.',
        409 => 'Attempting to delete an item that is currently in use.',
        415 => 'A valid Content-Type header such as application/json is required on all requests.',
        429 => 'The limit of 100 requests per minute per company is exceeded or more there are more than 20 failed login attempts.',
        500 => 'Internal server error',
        503 => 'The service is down for scheduled maintainance',
    ];
}
