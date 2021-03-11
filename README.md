# Laravel Changelog

[![Latest stable release][version-badge]][link-packagist]
[![Software license][license-badge]](LICENSE.md)
[![Build status][githubaction-badge]][link-githubaction]
[![Total downloads][downloads-badge]][link-packagist]
[![Total stars][stars-badge]][link-github]

[![Read my blog][blog-link-badge]][link-blog]
[![View my other packages and projects][packages-link-badge]][link-packages]
[![Follow @sebastiaanluca on Twitter][twitter-profile-badge]][link-twitter]
[![Share this package on Twitter][twitter-share-badge]][link-twitter-share]

__Show your project's parsed Markdown changelog in your application.__

## Requirements

- PHP 8 or higher
- Laravel 8 or higher

Looking for support for earlier versions? Try out any of the previous package versions.

## How to use

Ensure you have a `CHANGELOG.md` file in the root of your project.

Secondly, register the routes by calling the appropriate method in your main routes file:

```php
\SebastiaanLuca\Changelog\Changelog::routes();
```

This will enable you to visit the parsed changelog in your browser by visiting `https://example.com/changelog`.

By default, the changelog is cached. A good practice is to clear the cache during deployment by running:

```shell
php artisan cache:clear
```

## Alternative use

If you don't wish to use the package's routing, you can get the parsed and cached changelog in your own controller:

```php
$changelog = \SebastiaanLuca\Changelog\Changelog::getCachedChangelog();
```

## Customization

To customize a setting, first publish the configuration file and open `config/changelog.php`:

```shell
php artisan vendor:publish --tag="laravel-changelog (configuration)"
```

Here you can change the location of the log, the route name and URL, the view used to display the log, and if and how you want to cache it.

## License

This package operates under the MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
composer install
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email [hello@sebastiaanluca.com][link-author-email] instead of using the issue tracker.

## Credits

- [Sebastiaan Luca][link-github-profile]
- [All Contributors][link-contributors]

## About

My name is Sebastiaan and I'm a freelance Laravel developer specializing in building custom Laravel applications. Check out my [portfolio][link-portfolio] for more information, [my blog][link-blog] for the latest tips and tricks, and my other [packages][link-packages] to kick-start your next project.

Have a project that could use some guidance? Send me an e-mail at [hello@sebastiaanluca.com][link-author-email]!

[version-badge]: https://img.shields.io/packagist/v/sebastiaanluca/laravel-changelog.svg?label=stable
[license-badge]: https://img.shields.io/badge/license-MIT-informational.svg
[githubaction-badge]: https://github.com/sebastiaanluca/laravel-changelog/actions/workflows/test.yml/badge.svg?branch=master
[downloads-badge]: https://img.shields.io/packagist/dt/sebastiaanluca/laravel-changelog.svg?color=brightgreen
[stars-badge]: https://img.shields.io/github/stars/sebastiaanluca/laravel-changelog.svg?color=brightgreen

[blog-link-badge]: https://img.shields.io/badge/link-blog-lightgrey.svg
[packages-link-badge]: https://img.shields.io/badge/link-other_packages-lightgrey.svg
[twitter-profile-badge]: https://img.shields.io/twitter/follow/sebastiaanluca.svg?style=social
[twitter-share-badge]: https://img.shields.io/twitter/url/http/shields.io.svg?style=social

[link-github]: https://github.com/sebastiaanluca/laravel-changelog
[link-packagist]: https://packagist.org/packages/sebastiaanluca/laravel-changelog
[link-githubaction]: https://github.com/sebastiaanluca/laravel-changelog/actions/workflows/test.yml?query=branch%3Amaster
[link-contributors]: ../../contributors

[link-portfolio]: https://sebastiaanluca.com
[link-blog]: https://sebastiaanluca.com/blog
[link-packages]: https://packagist.org/packages/sebastiaanluca
[link-twitter]: https://twitter.com/sebastiaanluca
[link-twitter-share]: https://twitter.com/home?status=https%3A//github.com/sebastiaanluca/laravel-changelog%20via%20%40sebastiaanluca
[link-github-profile]: https://github.com/sebastiaanluca
[link-author-email]: mailto:hello@sebastiaanluca.com
