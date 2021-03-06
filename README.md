# unicontroller-client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/graze/unicontroller-client.svg?style=flat-square)](https://packagist.org/packages/graze/unicontroller-client)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/graze/unicontroller-client.svg?branch=master)](https://travis-ci.org/graze/unicontroller-client)
[![Code Coverage](https://scrutinizer-ci.com/g/graze/unicontroller-client/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/graze/unicontroller-client/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/graze/unicontroller-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/graze/unicontroller-client/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/graze/unicontroller-client.svg?style=flat-square)](https://packagist.org/packages/graze/unicontroller-client)

A Domino Unicontroller client written in PHP.

Check out the [Class Generator Readme](bin/README.md) to see how this client was written.

## Install

Via Composer

``` bash
$ composer require graze/unicontroller-client
```

## Usage

``` php
# instantiate a client
$client = Graze\UnicontrollerClient\UnicontrollerClient::factory();

# connect to a printer
$dsn = '172.16.1.1:9100';
$client->connect($dsn);

# send the 'ReadDesign' command to the printer
$designName = 'current.Design';
$designCurrent = $client->ReadDesign($designName, 0, 0);

# client returns the 'ReadDesign' entity, as defined in the Unicontroller specification
if (!$designCurrent->getReadOk()) {
    echo sprintf('failed to read design, does %s exist?', $designName);
    exit;
}

# modify some text
$ttfItem = $designCurrent->getTtfArray()[0];
$ttfItem->setData('this is some example text');

# add an image
$imageData = file_get_contents('/path/to/image.bmp');

$pictureItem = new Graze\UnicontrollerClient\Entity\Entity\EntityPictureItem();
$pictureItem->setAnchorPoint(0);
$pictureItem->setXPos(9500);
$pictureItem->setYPos(400);
$pictureItem->setWidth(0);
$pictureItem->setHeight(0);
$pictureItem->setOrion(0);
$pictureItem->setDescription('image1');
$pictureItem->setMaintain(1);
$pictureItem->setPrinterReferenceName('image.bmp');
$pictureItem->setUsePixelSize(1);
$pictureItem->setPictureData($imageData);
$pictureItem->setStoreInternally(0);
$pictureItem->setPhantomField(0);

$designCurrent->setPictureArray([$pictureItem]);

# push the design to the printer
$entity->setName('new.Design');
$entity->setSaveDesign(1);
$designNew = $client->serialise($designCurrent);
$resp = $client->send('Design', $designNew, 1);

if (!$resp->success()) {
    echo 'something went wrong';
}

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

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
