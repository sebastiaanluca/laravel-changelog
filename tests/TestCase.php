<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use SebastiaanLuca\Changelog\ChangelogServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app) : array
    {
        return [
            ChangelogServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        config()->set('changelog.file', __DIR__ . '/resources/CHANGELOG.md');
    }
}
