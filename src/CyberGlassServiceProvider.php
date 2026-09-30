<?php

namespace CyberGlass;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CyberGlassServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-cyber-glass';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile('cyber-glass')
            ->hasViews()
            ->hasTranslations();
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-cyber-glass');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-liquid-glass');
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('filament-cyber-glass', __DIR__ . '/../resources/css/filament-cyber-glass.css'),
        ], package: 'hellozedofficial/filament-cyber-glass');

        FilamentAsset::register([
            Css::make('filament-liquid-glass', __DIR__ . '/../resources/css/filament-cyber-glass.css'),
        ], package: 'dev/filament-liquid-glass');

        // Register dynamic theme variables in HTML head
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn (): string => view('filament-cyber-glass::styles')->render(),
        );

        // Register ambient background glow and SVG filter at body start
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn (): string => view('filament-cyber-glass::background-glow')->render() . view('filament-cyber-glass::svg-filter')->render(),
        );
    }
}
