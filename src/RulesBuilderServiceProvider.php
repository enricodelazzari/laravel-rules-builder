<?php

namespace Maize\RulesBuilder;

use Maize\RulesBuilder\Commands\RulesBuilderCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
