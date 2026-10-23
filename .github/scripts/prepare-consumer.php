<?php

// Resolve the package as a consumer, without its development dependencies or workbench.
if ($argc !== 4) {
    fwrite(STDERR, "Usage: php prepare-consumer.php <directory> <laravel-major> <filament-major>\n");
    exit(1);
}

[$script, $directory, $laravel, $filament] = $argv;
$package = json_decode(file_get_contents(__DIR__ . '/../../composer.json'), true, flags: JSON_THROW_ON_ERROR);

if (! is_dir($directory) && ! mkdir($directory, 0777, true)) {
    throw new RuntimeException("Cannot create consumer directory: {$directory}");
}

$manifest = [
    'name' => 'cyber-glass/compatibility-consumer',
    'repositories' => [[
        'type' => 'path',
        'url' => dirname(__DIR__, 2),
        'options' => ['versions' => [$package['name'] => '1.0.0']],
    ]],
    'require' => [
        $package['name'] => '1.0.0',
        'laravel/framework' => "^{$laravel}.0",
        'filament/filament' => "^{$filament}.0",
    ],
    'minimum-stability' => 'stable',
    'prefer-stable' => true,
];

file_put_contents($directory . '/composer.json', json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR) . "\n");
