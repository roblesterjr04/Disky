# Laravel Disky

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Disky gives you an easy way to copy a file from one disk to another in one line of code.


## Install

Via Composer

``` bash
$ composer require roblesterjr04/disky
```

Add Service Provider to `config/app.php`
``` php
roblesterjr04\Disky\DiskyServiceProvider::class,
```

## Usage

``` php
Storage::copyToDisk('path/to/file', 's3'); // Same as copying from disk('local');

Storage::disk('s3')->copyToDisk('path/to/file', 'ftp');

Storage::disk('ftp')->copyToDisk('path/to/file', 'local');

// Use the same logic to copy a directory

Storage::disk('ftp')->copyToDisk('path/to/directory', 's3');
```

### Multiple Files are supported!

``` php
Storage::copyToDisk(['path/to/file1','path/to/file2'], 's3');

// You can copy to multiple disks!
Storage::copyToDisk(['path/to/file1','path/to/file2'], ['s3','ftp']);

// You can specify one or more folder destinations on the destination drive(s)
Storage::copyToDisk('path/to/file', 's3', 'destination/path');

Storage::copyToDisk('path/to/file', 'ftp', ['destination/path1', 'destination/path2']);

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Rob Lester][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/roblesterjr04/disky.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/roblesterjr04/disky/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/roblesterjr04/disky.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/roblesterjr04/disky.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/roblesterjr04/disky.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/roblesterjr04/disky
[link-travis]: https://travis-ci.org/roblesterjr04/disky
[link-scrutinizer]: https://scrutinizer-ci.com/g/roblesterjr04/disky/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/roblesterjr04/disky
[link-downloads]: https://packagist.org/packages/roblesterjr04/disky
[link-author]: https://github.com/roblesterjr04
[link-contributors]: ../../contributors
