<?php

namespace LiquidGlass;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LiquidGlassServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-liquid-glass';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile('liquid-glass')
            ->hasViews()
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('filament-liquid-glass', __DIR__ . '/../resources/css/filament-liquid-glass.css'),
        ], package: 'dev/filament-liquid-glass');

        // Register dynamic theme variables in HTML head
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn (): string => view('filament-liquid-glass::styles')->render(),
        );

        // Register ambient royal blue / blue-purple background glow at body start
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn (): string => view('filament-liquid-glass::background-glow')->render() . view('filament-liquid-glass::svg-filter')->render(),
        );
    }
}
