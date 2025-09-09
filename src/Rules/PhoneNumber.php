<?php

    namespace OmodingMike\PhoneNumberValidator\Rules;

    use Closure;
    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Translation\PotentiallyTranslatedString;
    use OmodingMike\PhoneNumberValidator\PhoneNumberValidator;

    class PhoneNumber implements ValidationRule
    {
        /**
         * Run the validation rule.
         *
         * @param \Closure(string, ?string=): PotentiallyTranslatedString $fail
         */
        public function validate(string $attribute , mixed $value , Closure $fail) : void
        {
            if ( ! PhoneNumberValidator::isValid( $value ) ) {
                $message = config( 'phone-number-validator.error_message' ) ?? 'is not a valid phone number';
                $fail( "The :attribute $message" );
            }
        }
    }
