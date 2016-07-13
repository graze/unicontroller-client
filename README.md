# unicontroller-client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/graze/unicontroller-client.svg?style=flat-square)](https://packagist.org/packages/graze/unicontroller-client)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/graze/unicontroller-client/master.svg?style=flat-square)](https://travis-ci.org/graze/unicontroller-client)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/graze/unicontroller-client.svg?style=flat-square)](https://scrutinizer-ci.com/g/graze/unicontroller-client/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/graze/unicontroller-client.svg?style=flat-square)](https://scrutinizer-ci.com/g/graze/unicontroller-client)
[![Total Downloads](https://img.shields.io/packagist/dt/graze/unicontroller-client.svg?style=flat-square)](https://packagist.org/packages/graze/unicontroller-client)

A Domino Unicontroller client written in PHP.

## Install

Via Composer

``` bash
$ composer require graze/unicontroller-client
```

## Usage

``` php
$skeleton = new Graze\UniController\Skeleton('big', 'small', 'dog');
echo $skeleton->sing();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ make test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email security@graze.com instead of using the issue tracker.

## Credits

- [John Smith](https://github.com/john-n-smith)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
