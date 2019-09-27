<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog\Tests\Feature;

use SebastiaanLuca\Changelog\Tests\TestCase;

class ChangelogTest extends TestCase
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


}
