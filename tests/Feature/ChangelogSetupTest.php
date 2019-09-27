<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog\Tests\Feature;

use SebastiaanLuca\Changelog\Tests\TestCase;

class ChangelogSetupTest extends TestCase
{
    /**
     * @test
     */
    public function the default view exists() : void
    {
        $this->assertTrue(
            view()->exists('changelog::changelog')
        );
    }

    /**
     * @test
     */
    public function the configuration file exists() : void
    {
        $this->assertIsArray(
            config('changelog')
        );
    }

    /**
     * @test
     */
    public function the configuration file is complete() : void
    {
        $config = config('changelog');

        $this->assertArrayHasKey('file', $config);
        $this->assertArrayHasKey('route', $config);
        $this->assertArrayHasKey('view', $config);
        $this->assertArrayHasKey('cache', $config);
        $this->assertArrayHasKey('cache_duration', $config);
        $this->assertArrayHasKey('cache_key', $config);
    }
}
