<?php

namespace Maize\RulesBuilder\Commands;

use Illuminate\Console\Command;

class RulesBuilderCommand extends Command
{
    public $signature = 'laravel-rules-builder';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
