[![PHP version](https://img.shields.io/badge/PHP-%3E%3D7.1-8892BF.svg?style=flat-square)](http://php.net)
[![Latest Version](https://img.shields.io/packagist/v/phpgears/identity.svg?style=flat-square)](https://packagist.org/packages/phpgears/identity)
[![License](https://img.shields.io/github/license/phpgears/identity.svg?style=flat-square)](https://github.com/phpgears/identity/blob/master/LICENSE)

[![Build Status](https://img.shields.io/travis/phpgears/identity.svg?style=flat-square)](https://travis-ci.org/phpgears/identity)
[![Style Check](https://styleci.io/repos/149015417/shield)](https://styleci.io/repos/149015417)
[![Code Quality](https://img.shields.io/scrutinizer/g/phpgears/identity.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpgears/identity)
[![Code Coverage](https://img.shields.io/coveralls/phpgears/identity.svg?style=flat-square)](https://coveralls.io/github/phpgears/identity)

[![Total Downloads](https://img.shields.io/packagist/dt/phpgears/identity.svg?style=flat-square)](https://packagist.org/packages/phpgears/identity/stats)
[![Monthly Downloads](https://img.shields.io/packagist/dm/phpgears/identity.svg?style=flat-square)](https://packagist.org/packages/phpgears/identity/stats)

# Identity

Identity objects for PHP

## Installation

### Composer

```
composer require phpgears/identity
```

## Usage

Require composer autoload file

```php
require './vendor/autoload.php';
```

By extending `Gears\Identity\AbstractIdentity` you can easily have an Identity class

```php
use Gears\Identity\AbstractIdentity;

class CustomIdentity extends AbstractIdentity
{
    public static function fromString(string $value)
    {
        // Check $value validity as an identity

        return new static($value);
    }
}
```

### Available implementations

Due to its popularity UUID based identity implementations are provided

##### UuidIdentity

```php
use Gears\Identity\UuidIdentity;
use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();
$identity = UuidIdentity::fromString($uuid);
```

If you want a more concise UUID based identities you can use any of the following:

##### ShortUuidIdentity

You need to require [pascaldevink/shortuuid](https://github.com/pascaldevink/shortuuid)

```php
use Gears\Identity\ShortUuidIdentity;
use PascalDeVink\ShortUuid\ShortUuid;

$shortUuid = new ShortUuid();
$identity = ShortUuidIdentity::fromString($shortUuid->uuid4());

// Should you need to get original UUID
$originalUuid = $shortUuid->decode($identity->getValue())->toString();
```

##### HashUuidIdentity

You need to require [hashids/hashids](https://github.com/ivanakimov/hashids.php)

```php
use Gears\Identity\HashUuidIdentity;
use Hashids\Hashids;
use Ramsey\Uuid\Uuid;

$hashIds = new Hashids();
$uuid = Uuid::uuid4()->toString();
$hashedUuid = $hashIds->encodeHex(\str_replace('-', '', $uuid));
$identity = HashUuidIdentity::fromString($hashedUuid);

// Should you need to get original UUID, mind that UUID has no dash separators
$originalUuid = $hashIds->decodeHex($identity->getValue());
```

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/identity/issues). Have a look at existing issues before.

See file [CONTRIBUTING.md](https://github.com/phpgears/identity/blob/master/CONTRIBUTING.md)

## License

See file [LICENSE](https://github.com/phpgears/identity/blob/master/LICENSE) included with the source code for a copy of the license terms.
