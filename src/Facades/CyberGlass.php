<?php

namespace CyberGlass\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CyberGlass\CyberGlassPlugin
 */
class CyberGlass extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'filament-cyber-glass';
    }
}
