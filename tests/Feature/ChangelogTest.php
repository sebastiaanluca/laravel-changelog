<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog\Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use SebastiaanLuca\Changelog\Changelog;
use SebastiaanLuca\Changelog\Tests\TestCase;

class ChangelogTest extends TestCase
{
    /**
     * @test
     */
    public function the changelog is read and parsed() : void
    {
        $changelog = Changelog::getChangelog();

        $parsed = __DIR__ . '/../resources/parsed.txt';

        $this->assertStringEqualsFile($parsed, $changelog . PHP_EOL);
    }

    /**
     * @test
     */
    public function the changelog is read and parsed then cached for the given duration() : void
    {
        config()->set('changelog.cache_duration', $duration = (new Carbon)->addMinutes(30));

        Cache::shouldReceive('remember')
            ->once()
            ->withSomeOfArgs('changelog', $duration)
            ->andReturn('cached changelog');

        $changelog = Changelog::getCachedChangelog();

        $this->assertSame(
            'cached changelog',
            $changelog,
        );
    }

    /**
     * @test
     */
    public function the changelog is read and parsed then cached forever() : void
    {
        config()->set('changelog.cache_duration', INF);

        Cache::shouldReceive('rememberForever')
            ->once()
            ->withSomeOfArgs('changelog')
            ->andReturn('cached changelog');

        $changelog = Changelog::getCachedChangelog();

        $this->assertSame(
            'cached changelog',
            $changelog,
        );
    }
}
