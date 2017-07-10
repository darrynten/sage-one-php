<?php

namespace DarrynTen\SageOne;

use DarrynTen\SageOne\Exception\ValidationException;

/**
 * SageOne Validation Helper
 *
 * @category Configuration
 * @package  SageOnePHP
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */
trait Validation
{

    protected $validPrimitiveTypes = [
        'string',
        'integer',
        'boolean',
        'double',
    ];
    /**
     * Check if the type matches a valid primitive
     *
     * @var string $item The item to check
     * @var string $definedType The type that the item should be
     *
     * @return boolean
     */
    public function isValidPrimitive($item, $definedType)
    {
        $itemType = gettype($item);

        if (in_array($itemType, $this->validPrimitiveTypes) && ($itemType === $definedType)) {
            return true;
        }

        return false;
    }

    /**
     * Validates a regex
     *
     * @param string $value
     * @param string $regex
     */
    public function validateRegex($value, $regex)
    {
        if (!preg_match($regex, $value)) {
            throw new ValidationException(
                ValidationException::STRING_REGEX_MISMATCH,
                sprintf('value %s failed to validate', $value)
            );
        }
    }

    /**
     * Validates a value is within a given range.
     *
     * The value can either be an integer, which checks an inclusive range,
     * or can be a string, which checks length.
     *
     * @param string|integer $value
     * @param integer $min
     * @param integer $max
     */
    public function validateRange($value, $min, $max)
    {
        if (gettype($value) === 'integer') {
            if (($value < $min) || ($value > $max)) {
                throw new ValidationException(
                    ValidationException::INTEGER_OUT_OF_RANGE,
                    sprintf(
                        'value %s out of min(%s) max(%s)',
                        $value,
                        $min,
                        $max
                    )
                );
            }

            return;
        }

        if (gettype($value) === 'string') {
            if ((mb_strlen($value) < $min) || (mb_strlen($value) > $max)) {
                throw new ValidationException(
                    ValidationException::STRING_LENGTH_OUT_OF_RANGE,
                    sprintf(
                        'value %s out of min(%s) max(%s)',
                        $value,
                        $min,
                        $max
                    )
                );
            }

            return;
        }

        // Unknown type for validation
        throw new ValidationException(
            ValidationException::VALIDATION_TYPE_ERROR,
            sprintf(
                'value %s is type %s',
                $value,
                gettype($value)
            )
        );
    }
}
