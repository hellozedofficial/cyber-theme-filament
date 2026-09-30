# Cyber Glass Theme for Filament 🪟⚡

A premium, futuristic **Cyber Glass & Liquid Glassmorphism** theme and UI plugin for **Filament 5** & **Laravel 11/12**, featuring authentic SVG chromatic dispersion, progressive blur headers, and physics-driven liquid interactions.

[![License](https://img.shields.io/badge/license-Proprietary%20%2F%20Commercial-red.svg?style=flat-square)](LICENSE.md)
[![Filament](https://img.shields.io/badge/Filament-v5.0-amber.svg?style=flat-square)](https://filamentphp.com)
[![PHP](https://img.shields.io/badge/PHP-%5E8.2%20%7C%20%5E8.3-blue.svg?style=flat-square)](https://php.net)

---

## ✨ Features

- **Cyber Ambient Mesh Glow**: Ethereal multi-stop radial glow orbs dynamically harmonized with your Filament panel's primary color palette in both light and dark modes.
- **Progressive Faded Blurred Header**: Modern sticky topbar with a crisp blur at the top that dissolves gracefully into a transparent mist at the bottom edge.
- **Authentic Liquid Physics Interactions**:
  - **Liquid Mercury Toggles**: Fluid gelatinous spring animations matching your panel's primary color.
  - **Crystal Clear Checkboxes**: Pop-bounce elastic feel with primary glow accents.
  - **Dynamic Buttons**: Jelly compression and liquid light beam sweeps on hover.
  - **Cyber Glass Modals & Drawers**: Deep backdrop refraction with specular highlights and border diffusion.
- **Zero Configuration Necessary**: Works out of the box with Filament 5 panels with full customization capabilities.
- **100% Backward Compatibility**: Seamless drop-in replacement for `LiquidGlassPlugin`.

---

## 🚀 Requirements

- **PHP**: ^8.2 or ^8.3
- **Laravel**: ^11.28 or ^12.0
- **Filament**: ^5.0

---

## 📦 Installation (Commercial / Private Setup)

Add this repository to your project's `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:hellozedofficial/cyber-theme-filament.git"
    }
]
```

Then require the package:

```bash
composer require hellozedofficial/cyber-theme-filament:^1.0
```

Optionally publish the configuration file:

```bash
php artisan vendor:publish --tag="filament-cyber-glass-config"
```

---

## 🎨 Usage

Register `CyberGlassPlugin` in your Filament Panel Provider (e.g. `app/Providers/Filament/AdminPanelProvider.php`):

```php
use CyberGlass\CyberGlassPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->default()
        ->id('admin')
        ->path('admin')
        ->plugin(
            CyberGlassPlugin::make()
                ->blur('16px')                         // Base glass blur intensity
                ->fadedHeader(true, '28px')            // Topbar progressive blur
                ->modalBlur('28px')                    // Center dialog modals
                ->slideOverBlur('32px')                // Slide-over drawer modals
                ->dropdownBlur('24px')                 // Dropdown popovers
                ->backgroundGlow(true)                 // Ambient cyber glow mesh
        );
}
```

---

## ⚙️ Configuration (`config/cyber-glass.php`)

```php
return [
    'enabled' => true,

    // Ambient Multi-Stop Background Mesh Glow
    'background_glow' => [
        'enabled' => true,
        'dark' => [
            'bg_canvas' => '#070b14',
            'royal_blue' => 'rgba(30, 64, 175, 0.32)',
            'blue_purple' => 'rgba(109, 40, 217, 0.22)',
            'ambient' => 'rgba(14, 165, 233, 0.15)',
        ],
        'light' => [
            'bg_canvas' => '#f3f6fa',
            'royal_blue' => 'rgba(37, 99, 235, 0.14)',
            'blue_purple' => 'rgba(139, 92, 246, 0.10)',
            'ambient' => 'rgba(14, 165, 233, 0.10)',
        ],
    ],

    // Faded Blurred Header
    'header' => [
        'faded_blur' => true,
        'blur_intensity' => '28px',
    ],

    // Cyber Modals
    'modals' => [
        'blur' => '28px',
    ],

    // Cyber Slide-overs
    'slide_overs' => [
        'blur' => '32px',
    ],

    // Cyber Dropdowns
    'dropdowns' => [
        'blur' => '24px',
    ],
];
```

---

## 🛠 Local Development & Testing

```bash
# Start the live preview testbench server (http://127.0.0.1:8000/admin)
composer serve

# Run test suite
composer test

# Rebuild assets and testbench database
composer build
```

---

## 📄 Commercial License

Copyright (c) HelloZed. All rights reserved.

This software is commercial and proprietary. Unauthorized copying, modification, redistribution, or sharing of this file/software, via any medium, is strictly prohibited without a valid commercial license agreement from HelloZed.
