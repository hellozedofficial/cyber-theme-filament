<?php

namespace LiquidGlass\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LiquidGlass\LiquidGlassPlugin
 */
class LiquidGlass extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'filament-liquid-glass';
    }
}
