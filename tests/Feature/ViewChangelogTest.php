<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog\Tests\Feature;

use SebastiaanLuca\Changelog\Changelog;
use SebastiaanLuca\Changelog\Tests\TestCase;

class ViewChangelogTest extends TestCase
{
    /**
     * @test
     */
    public function the changelog can be viewed() : void
    {
        config()->set('changelog.cache', false);

        $response = $this->get(route('changelog'));

        $response->assertOk();
        $response->assertViewIs('changelog::changelog');
        $response->assertViewHas('changelog');
    }

    /**
     * @test
     */
    public function the cached changelog can be viewed() : void
    {
        config()->set('changelog.cache', true);

        $response = $this->get(route('changelog'));

        $response->assertOk();
        $response->assertViewIs('changelog::changelog');
        $response->assertViewHas('changelog');
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        Changelog::routes();
    }
}
