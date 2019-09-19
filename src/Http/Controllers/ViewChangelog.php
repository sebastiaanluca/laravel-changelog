<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog\Http\Controllers;

use Illuminate\Contracts\Config\Repository;
use SebastiaanLuca\Changelog\Changelog;

class ViewChangelog
{
    /**
     * @var \Illuminate\Contracts\Config\Repository
     */
    private $config;

    /**
     * @param \Illuminate\Contracts\Config\Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Respond to the route request.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $changelog = $this->config->get('changelog.cache') === true
            ? Changelog::getCachedChangelog()
            : Changelog::getChangelog();

        return view($this->config->get('changelog.view'))->with(compact('changelog'));
    }
}
