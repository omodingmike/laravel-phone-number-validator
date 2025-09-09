<?php

namespace OmodingMike\PhoneNumberValidator\Commands;

use Illuminate\Console\Command;

class PhoneNumberValidatorCommand extends Command
{
    public $signature = 'laravel-phone-number-validator';

    public $description = 'My command';

    public function handle(): int
    {
        $value = config('phone-number-validator.error_message');
        $this->comment($value);

        return self::SUCCESS;
    }
}
