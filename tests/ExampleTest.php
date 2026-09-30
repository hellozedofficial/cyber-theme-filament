<?php

use CyberGlass\CyberGlassPlugin;
use LiquidGlass\LiquidGlassPlugin;

it('can instantiate the cyber glass plugin', function () {
    $plugin = CyberGlassPlugin::make();

    expect($plugin)->toBeInstanceOf(CyberGlassPlugin::class)
        ->and($plugin->getId())->toBe('filament-cyber-glass')
        ->and($plugin->isEnabled())->toBeTrue();
});

it('supports backward compatibility with LiquidGlassPlugin', function () {
    $plugin = LiquidGlassPlugin::make();

    expect($plugin)->toBeInstanceOf(CyberGlassPlugin::class)
        ->and($plugin->isEnabled())->toBeTrue();
});

it('can customize blur intensity', function () {
    $plugin = CyberGlassPlugin::make()->blur('24px');

    expect($plugin->getBlur())->toBe('24px');
});

it('can configure background glow', function () {
    $plugin = CyberGlassPlugin::make()->backgroundGlow(true);

    expect($plugin->isBackgroundGlowEnabled())->toBeTrue();
});

it('can configure faded progressive blurred header', function () {
    $plugin = CyberGlassPlugin::make()->fadedHeader(true, '32px');

    expect($plugin->isFadedHeader())->toBeTrue()
        ->and($plugin->getHeaderBlur())->toBe('32px');
});

it('can configure frosted modal, slide over, and dropdown blur', function () {
    $plugin = CyberGlassPlugin::make()
        ->modalBlur('30px')
        ->slideOverBlur('36px')
        ->dropdownBlur('20px');

    expect($plugin->getModalBlur())->toBe('30px')
        ->and($plugin->getSlideOverBlur())->toBe('36px')
        ->and($plugin->getDropdownBlur())->toBe('20px');
});
