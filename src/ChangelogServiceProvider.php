<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog;

use Illuminate\Support\ServiceProvider;

class ChangelogServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->configure();
    }

    /**
     * Register the package configuration.
     *
     * @return void
     */
    private function configure() : void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/changelog.php', 'laravel-changelog');
    }
}
