# Cyber Glass Theme for Filament 🪟⚡

An ultra-sleek, futuristic **Cyber Glass & Liquid Glassmorphism** theme and UI plugin for **Filament 5** & **Laravel 11/12/13**, featuring authentic SVG chromatic dispersion, progressive blur headers, and physics-driven liquid interactions.

[![Latest Release](https://img.shields.io/github/v/release/jhayao/cyber-theme-filament?style=flat-square)](https://github.com/jhayao/cyber-theme-filament/releases)
[![Tests](https://github.com/jhayao/cyber-theme-filament/actions/workflows/tests.yml/badge.svg)](https://github.com/jhayao/cyber-theme-filament/actions/workflows/tests.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Filament](https://img.shields.io/badge/Filament-v5.0-amber.svg?style=flat-square)](https://filamentphp.com)
[![PHP](https://img.shields.io/badge/PHP-%5E8.2%20%7C%20%5E8.3-blue.svg?style=flat-square)](https://php.net)

---

## Overview

**Cyber Glass** is a next-generation, open-source UI theme and enhancement suite designed for **Filament 5** and **Laravel 11/12/13**. Drawing deep inspiration from state-of-the-art fintech platforms like Revolut Business, high-end Apple glassmorphism, and cyberpunk optical aesthetics, Cyber Glass completely transcends conventional dashboard themes by introducing true optical physics and tactile fluidity to your admin panel.

Unlike basic backdrop-filter skins that merely tint containers, Cyber Glass features an authentic SVG-powered chromatic dispersion pipeline, specular refraction borders, and multi-layered depth. Every surface—from data tables and metric stat cards to slide-over drawers and dialog modals—radiates luminous refraction while maintaining flawless typographic legibility in both light and dark modes. An ambient cyber mesh aura gently illuminates the canvas background, harmonizing dynamically with your configured Filament primary color palette.

Where Cyber Glass truly comes alive is in its physics-driven liquid interactions. Form elements are treated as fluid entities: toggle switches mimic mercury droplets sliding across frictionless glass with 22-stop spring elasticity; checkboxes pop with buoyant tactile feedback; and action buttons exhibit gelatinous squash-and-stretch compression accompanied by liquid light sweep beams on hover. The signature progressive faded header dissolves seamlessly from a crystalline top blur into an imperceptible mist, allowing dashboard content to glide effortlessly underneath.

Engineered with pure CSS performance, hardware-accelerated transforms, and non-intrusive blade render hooks, Cyber Glass delivers a breathtaking aesthetic without sacrificing execution speed, responsiveness, or core Filament functionality. Elevate your application into a mesmerizing digital experience that commands attention from the very first click.

---

## Visual Showcase (Light vs. Dark Mode)

Experience the ultra-clean, high-contrast aesthetics in both Light and Dark modes.

### 1. Analytics Overview & Dynamic Charts
| Light Mode | Dark Mode |
| :---: | :---: |
| <img src="art/dashboard-light.png" alt="Cyber Glass Dashboard - Light Mode" width="100%" /> | <img src="art/dashboard-dark.png" alt="Cyber Glass Dashboard - Dark Mode" width="100%" /> |

### 2. Interactive Data Tables & Liquid Controls
*Featuring liquid mercury toggles, crystal-clear checkboxes, and ambient row highlights.*
| Light Mode | Dark Mode |
| :---: | :---: |
| <img src="art/table-light.png" alt="Users Table - Light Mode" width="100%" /> | <img src="art/table-dark.png" alt="Users Table - Dark Mode" width="100%" /> |

### 3. Cyber Glass Dialog Modals & Form Controls
*Specular glass refraction borders, non-intrusive backdrop blur, and squash-and-stretch buttons.*
| Light Mode | Dark Mode |
| :---: | :---: |
| <img src="art/modal-light.png" alt="Edit User Modal - Light Mode" width="100%" /> | <img src="art/modal-dark.png" alt="Edit User Modal - Dark Mode" width="100%" /> |

### 4. Floating Account & Profile Glass Panels
| Light Mode | Dark Mode |
| :---: | :---: |
| <img src="art/profile-light.png" alt="Profile Modal - Light Mode" width="100%" /> | <img src="art/profile-dark.png" alt="Profile Modal - Dark Mode" width="100%" /> |

---

## Features

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

## Requirements

- **PHP**: 8.2+ (8.3+ for Laravel 13)
- **Laravel**: ^11.28, ^12.0, or ^13.0
- **Filament**: ^5.0

The integration test matrix covers Filament 5 on Laravel 11 and 12 with PHP 8.2, and Laravel 13 with PHP 8.3 and 8.5. Composer also permits Laravel 10 and Filament 3/4; these older combinations receive dependency resolution checks rather than full workbench UI coverage.

For Laravel 13, update dependencies to stable releases that explicitly allow Laravel 13, including Filament and `spatie/laravel-package-tools`. Existing lock files may need an update with dependencies (`composer update -W`). Plugin registration and configuration remain the same, including the legacy `LiquidGlassPlugin` alias.

---

## Installation

Run these commands from an existing Laravel application with a Filament panel installed. To install this fork from [jhayao/cyber-theme-filament](https://github.com/jhayao/cyber-theme-filament), register its GitHub repository with Composer, then require the release:

```bash
composer config repositories.cyber-glass vcs https://github.com/jhayao/cyber-theme-filament
composer require hellozedofficial/cyber-theme-filament:^1.1 -W
```

The Composer package name remains `hellozedofficial/cyber-theme-filament` for compatibility with the original package. The VCS repository selects this fork; requiring the package without that repository uses the upstream Packagist package. Commit the updated application `composer.json` and `composer.lock` so deployments install the same fork and version.

Register the plugin in each panel that should use the theme (usually `app/Providers/Filament/AdminPanelProvider.php`):

```php
use CyberGlass\CyberGlassPlugin;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // Keep your panel's existing configuration here.
        ->plugin(CyberGlassPlugin::make());
}
```

The service provider is discovered automatically. Publish the stylesheet and clear cached application configuration:

```bash
php artisan filament:assets
php artisan optimize:clear
```

Open your panel (typically `/admin`) and refresh the browser. No custom Vite build is required for the package's registered stylesheet.

Optionally publish the configuration file to `config/cyber-glass.php`:

```bash
php artisan vendor:publish --tag="filament-cyber-glass-config"
```

### Updating an existing installation

Add the VCS repository above if switching from the upstream package, then run:

```bash
composer require hellozedofficial/cyber-theme-filament:^1.1 -W
php artisan filament:assets
php artisan optimize:clear
```

Laravel 13 requires PHP 8.3+ and Laravel 13 compatible Filament dependencies. The existing `CyberGlassPlugin` configuration and `LiquidGlassPlugin` alias continue to work.

---

## Usage

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

## Configuration (`config/cyber-glass.php`)

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

## Local Development & Testing

The workbench uses Filament 5. Laravel 13 development uses Testbench/Workbench 11 and Pest 4; Laravel 11/12 can continue using Pest 3 and Testbench/Workbench 9/10 respectively.

```bash
# Start the live preview testbench server (http://127.0.0.1:8000/admin)
composer serve

# Run test suite
composer test

# Rebuild assets and testbench database
composer build
```

---

## Contributing

Contributions are welcome! Please submit issues and pull requests to [jhayao/cyber-theme-filament](https://github.com/jhayao/cyber-theme-filament).

This is a fork of [hellozedofficial/cyber-theme-filament](https://github.com/hellozedofficial/cyber-theme-filament), originally created by HelloZed.

---

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
