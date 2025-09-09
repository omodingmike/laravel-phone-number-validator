<?php

namespace OmodingMike\PhoneNumberValidator;

use OmodingMike\PhoneNumberValidator\Commands\PhoneNumberValidatorCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PhoneNumberValidatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-phone-number-validator')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_phone_number_validator_table')
            ->hasCommand(PhoneNumberValidatorCommand::class);
    }
}
