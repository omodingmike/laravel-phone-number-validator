<?php

namespace OmodingMike\PhoneNumberValidator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OmodingMike\PhoneNumberValidator\PhoneNumberValidator
 */
class PhoneNumberValidator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \OmodingMike\PhoneNumberValidator\PhoneNumberValidator::class;
    }
}
