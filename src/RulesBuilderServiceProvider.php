<?php

namespace Maize\RulesBuilder;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Maize\RulesBuilder\Commands\RulesBuilderCommand;

class RulesBuilderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-rules-builder')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-rules-builder_table')
            ->hasCommand(RulesBuilderCommand::class);
    }
}
