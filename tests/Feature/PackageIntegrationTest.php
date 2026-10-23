<?php

use CyberGlass\CyberGlassServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;
use LiquidGlass\LiquidGlassServiceProvider;

it('loads the provider declared for auto-discovery without the legacy provider', function () {
    expect(app()->getLoadedProviders())
        ->toHaveKey(CyberGlassServiceProvider::class)
        ->not->toHaveKey(LiquidGlassServiceProvider::class);
});

it('renders theme hooks and the stylesheet on the login page', function () {
    $this->get('/admin/login')
        ->assertSuccessful()
        ->assertSee('id="filament-liquid-glass-variables"', false)
        ->assertSee('class="fi-liquid-glass-glow-ambient"', false)
        ->assertSee('id="glass-filter-_r_b_"', false)
        ->assertSee('css/hellozedofficial/cyber-theme-filament/filament-cyber-glass.css', false);
});

it('registers the distributable theme stylesheet', function () {
    $styles = FilamentAsset::getStyles(['hellozedofficial/cyber-theme-filament']);

    expect($styles)->toHaveCount(1);

    $style = array_values($styles)[0];

    expect($style->getId())->toBe('filament-cyber-glass')
        ->and(realpath($style->getPath()))->toBe(realpath(__DIR__ . '/../../resources/css/filament-cyber-glass.css'))
        ->and(is_file($style->getPath()))->toBeTrue();
});

it('makes configuration available for publishing', function () {
    $paths = ServiceProvider::pathsToPublish(CyberGlassServiceProvider::class, 'filament-cyber-glass-config');
    $source = __DIR__ . '/../../config/cyber-glass.php';

    expect(config('cyber-glass.enabled'))->toBeTrue()
        ->and(array_map('realpath', array_keys($paths)))->toContain(realpath($source))
        ->and(array_values($paths))->toContain(config_path('cyber-glass.php'));
});
