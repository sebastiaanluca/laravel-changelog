<?php

declare(strict_types=1);

namespace SebastiaanLuca\Changelog;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Parsedown;
use SebastiaanLuca\Changelog\Http\Controllers\ViewChangelog;

class Changelog
{
    /**
     * @return void
     */
    public static function routes() : void
    {
        Route::get(static::config('route.url'), ViewChangelog::class)
            ->name(static::config('route.name'));
    }

    /**
     * @return string
     */
    public static function getCachedChangelog() : string
    {
        $key = static::config('cache_key');
        $duration = static::config('cache_duration');

        $callback = static function () : string {
            return static::getChangelog();
        };

        if (static::config('cache_duration') === INF) {
            return Cache::rememberForever($key, $callback);
        }

        return Cache::remember($key, $duration, $callback);
    }

    /**
     * @return string
     */
    public static function getChangelog() : string
    {
        $file = file_get_contents(static::config('file'));

        return Parsedown::instance()->parse($file);
    }

    /**
     * @param string|null $key
     *
     * @return mixed
     */
    private static function config(?string $key = null)
    {
        $key = $key ? '.' . $key : '';

        return config('changelog' . $key);
    }
}
