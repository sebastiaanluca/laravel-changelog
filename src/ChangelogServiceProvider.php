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
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() : void
    {
        $this->registerPublishableResources();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->getShortPackageName());
    }

    /**
     * Register the package configuration.
     *
     * @return void
     */
    private function configure() : void
    {
        $this->mergeConfigFrom(
            $this->getConfigurationPath(),
            $this->getShortPackageName()
        );
    }

    /**
     * @return void
     */
    private function registerPublishableResources() : void
    {
        $this->publishes(
            [$this->getConfigurationPath() => config_path($this->getShortPackageName() . '.php')],
            $this->getPackageName() . ' (configuration)'
        );
    }

    /**
     * @return string
     */
    private function getConfigurationPath() : string
    {
        return __DIR__ . '/config/changelog.php';
    }

    /**
     * @return string
     */
    private function getShortPackageName() : string
    {
        return 'changelog';
    }

    /**
     * @return string
     */
    private function getPackageName() : string
    {
        return 'laravel-' . $this->getShortPackageName();
    }
}
