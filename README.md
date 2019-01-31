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

By extending `Gears\Identity\AbstractIdentity` you can easily have an Identity classes

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

### UUID implementations

Due to its popularity UUID based identity implementations are provided

Main direct UUID value implementation is available in class `Gears\Identity\UuidIdentity`

If you want a more concise UUID based identities you can use any of the following

* `Gears\Identity\ShortUuidIdentity`. You need to composer require [pascaldevink/shortuuid](https://github.com/pascaldevink/shortuuid)
* `Gears\Identity\HashUuidIdentity`. You need to composer require [hashids/hashids](https://github.com/ivanakimov/hashids.php). Be aware that original UUID should be hashed as hexadecimal strings, so no dashes, review Hashids documentation

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/identity/issues). Have a look at existing issues before.

See file [CONTRIBUTING.md](https://github.com/phpgears/identity/blob/master/CONTRIBUTING.md)

## License

See file [LICENSE](https://github.com/phpgears/identity/blob/master/LICENSE) included with the source code for a copy of the license terms.
