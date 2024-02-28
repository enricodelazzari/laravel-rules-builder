<?php

namespace Maize\RulesBuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Maize\RulesBuilder\RulesBuilder
 */
class RulesBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Maize\RulesBuilder\RulesBuilder::class;
    }
}
