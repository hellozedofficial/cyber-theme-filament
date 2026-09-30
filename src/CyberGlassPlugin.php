<?php

namespace CyberGlass;

use Filament\Contracts\Plugin;
use Filament\Panel;

class CyberGlassPlugin implements Plugin
{
    protected bool $enabled = true;
    protected bool $backgroundGlow = true;
    protected bool $fadedHeader = true;
    protected string $blur = '16px';
    protected string $headerBlur = '28px';
    protected string $modalBlur = '28px';
    protected string $slideOverBlur = '32px';
    protected string $dropdownBlur = '24px';
    protected ?array $darkGlow = null;
    protected ?array $lightGlow = null;
    protected array $targets = [];

    public function getId(): string
    {
        return 'filament-cyber-glass';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament('filament-cyber-glass');

        return $plugin;
    }

    public function register(Panel $panel): void
    {
        // Panel-specific registration
    }

    public function boot(Panel $panel): void
    {
        if ($this->darkGlow !== null) {
            config()->set('cyber-glass.background_glow.dark', array_merge(
                config('cyber-glass.background_glow.dark', config('liquid-glass.background_glow.dark', [])),
                $this->darkGlow
            ));
        }

        if ($this->lightGlow !== null) {
            config()->set('cyber-glass.background_glow.light', array_merge(
                config('cyber-glass.background_glow.light', config('liquid-glass.background_glow.light', [])),
                $this->lightGlow
            ));
        }

        config()->set('cyber-glass.background_glow.enabled', $this->backgroundGlow);
        config()->set('cyber-glass.header.faded_blur', $this->fadedHeader);
        config()->set('cyber-glass.header.blur_intensity', $this->headerBlur);
        config()->set('cyber-glass.modals.blur', $this->modalBlur);
        config()->set('cyber-glass.slide_overs.blur', $this->slideOverBlur);
        config()->set('cyber-glass.dropdowns.blur', $this->dropdownBlur);
    }

    public function enable(bool $condition = true): static
    {
        $this->enabled = $condition;

        return $this;
    }

    public function backgroundGlow(bool $condition = true): static
    {
        $this->backgroundGlow = $condition;

        return $this;
    }

    public function fadedHeader(bool $condition = true, string $blurIntensity = '28px'): static
    {
        $this->fadedHeader = $condition;
        $this->headerBlur = $blurIntensity;

        return $this;
    }

    public function blur(string $blur): static
    {
        $this->blur = $blur;

        return $this;
    }

    public function modalBlur(string $blur = '28px'): static
    {
        $this->modalBlur = $blur;

        return $this;
    }

    public function slideOverBlur(string $blur = '32px'): static
    {
        $this->slideOverBlur = $blur;

        return $this;
    }

    public function dropdownBlur(string $blur = '24px'): static
    {
        $this->dropdownBlur = $blur;

        return $this;
    }

    public function darkGlow(
        ?string $bgCanvas = null,
        ?string $primary = null,
        ?string $secondary = null,
        ?string $ambient = null
    ): static {
        $this->darkGlow = array_filter([
            'bg_canvas' => $bgCanvas,
            'royal_blue' => $primary,
            'blue_purple' => $secondary,
            'ambient' => $ambient,
        ]);

        return $this;
    }

    public function lightGlow(
        ?string $bgCanvas = null,
        ?string $primary = null,
        ?string $secondary = null,
        ?string $ambient = null
    ): static {
        $this->lightGlow = array_filter([
            'bg_canvas' => $bgCanvas,
            'royal_blue' => $primary,
            'blue_purple' => $secondary,
            'ambient' => $ambient,
        ]);

        return $this;
    }

    public function targetSurfaces(array $targets): static
    {
        $this->targets = $targets;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function hasBackgroundGlow(): bool
    {
        return $this->backgroundGlow;
    }

    public function isBackgroundGlowEnabled(): bool
    {
        return $this->backgroundGlow;
    }

    public function hasFadedHeader(): bool
    {
        return $this->fadedHeader;
    }

    public function isFadedHeader(): bool
    {
        return $this->fadedHeader;
    }

    public function getBlur(): string
    {
        return $this->blur;
    }

    public function getHeaderBlur(): string
    {
        return $this->headerBlur;
    }

    public function getModalBlur(): string
    {
        return $this->modalBlur;
    }

    public function getSlideOverBlur(): string
    {
        return $this->slideOverBlur;
    }

    public function getDropdownBlur(): string
    {
        return $this->dropdownBlur;
    }

    public function getTargets(): array
    {
        return $this->targets ?: config('cyber-glass.surfaces', config('liquid-glass.surfaces', []));
    }
}
