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
    final public static function fromString(string $value)
    {
        // Check $value validity as an identity

        return new static($value);
    }
}
```

### Implementations

Due to its popularity UUID ([RFC 4122](http://tools.ietf.org/html/rfc4122)) based identity implementations are provided

##### UuidIdentity

```php
use Gears\Identity\UuidIdentity;
use Gears\Identity\OrderedUuidIdentityGenerator;
use Gears\Identity\UuidIdentityGenerator;
use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();
$identity = UuidIdentity::fromString($uuid);

// From generator
$identity = (new UuidIdentityGenerator())->generate();
$identity = (new OrderedUuidIdentityGenerator())->generate();

// Get original UUID string
$originalUuid = $identity->getValue();
```

If you want a more concise UUID based identities you can use any of the following:

##### CondensedUuidIdentity

UUID without dashes

```php
use Gears\Identity\CondensedUuidIdentity;
use Gears\Identity\CondensedUuidIdentityGenerator;
use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();
$identity = CondensedUuidIdentity::fromString(\str_replace('-', '', $uuid));

// From UUID string
$identity = CondensedUuidIdentity::fromUuid($uuid);

// From generator
$identity = (new CondensedUuidIdentityGenerator())->generate();

// Get original UUID string
$originalUuid = \sprintf('%s%s-%s-%s-%s-%s%s%s', ...\str_split($identity->getValue(), 4));
```

##### HashUuidIdentity

You need to require https://github.com/ivanakimov/hashids.php

```
composer require hashids/hashids
```

```php
use Gears\Identity\HashUuidIdentity;
use Gears\Identity\HashUuidIdentityGenerator;
use Hashids\Hashids;
use Ramsey\Uuid\Uuid;

$hashIds = new Hashids();
$uuid = Uuid::uuid4()->toString();
$hashedUuid = $hashIds->encodeHex(\str_replace('-', '', $uuid));
$identity = HashUuidIdentity::fromString($hashedUuid);

// From UUID string
$identity = HashUuidIdentity::fromUuid($uuid);

// From generator
$identity = (new HashUuidIdentityGenerator())->generate();

// Get original UUID string
$originalUuid = \sprintf('%s%s-%s-%s-%s-%s%s%s', ...\str_split($hashIds->decodeHex($identity->getValue()), 4));
```

##### ShortUuidIdentity

You need to require https://github.com/pascaldevink/shortuuid

```
composer require pascaldevink/shortuuid
```

```php
use Gears\Identity\ShortUuidIdentity;
use Gears\Identity\ShortUuidIdentityGenerator;
use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Uuid;

$shortUuid = new ShortUuid();
$identity = ShortUuidIdentity::fromString($shortUuid->uuid4());

// From UUID string
$identity = ShortUuidIdentity::fromUuid(Uuid::uuid4()->toString());

// From generator
$identity = (new ShortUuidIdentityGenerator())->generate();

// Get original UUID string
$originalUuid = $shortUuid->decode($identity->getValue())->toString();
```

##### Base62UuidIdentity

You need to require https://github.com/tuupola/base62

```
composer require tuupola/base62
```

```php
use Gears\Identity\Base62UuidIdentity;
use Gears\Identity\Base62UuidIdentityGenerator;
use Ramsey\Uuid\Uuid;
use Tuupola\Base62;

$base62 = new Base62();
$uuid = Uuid::uuid4()->toString();
$base62Uuid = $base62->encode(\hex2bin(\str_replace('-', '', $uuid)));
$identity = Base62UuidIdentity::fromString($base62Uuid);

// From UUID string
$identity = Base62UuidIdentity::fromUuid($uuid);

// From generator
$identity = (new Base62UuidIdentityGenerator())->generate();

// Get original UUID string
$originalUuid = \sprintf('%s%s-%s-%s-%s-%s%s%s', ...\str_split(\bin2hex($base62->decode($identity->getValue())), 4));
```

#### Non-UUID based identities

[phpgears/identity-extra](https://github.com/phpgears/identity-extra) hosts non UUID based identity implementations, such as Mongo's ObjectId and several others

## The Right Identity

There is no point on creating non-unique identities, always use a proven method of ensuring the uniqueness of the identity. This can basically be stated as: **do NOT implement your own mechanism for creating unique identifiers, ever, period**

**It's highly discouraged to allow identities with arbitrary string values**, or values that cannot be checked against to certify correctness, that is the reason why a general open-value identity class is not provided and **you should never implement such a thing**

If you want to maximize interoperability with other systems on your architecture or others', such as message queues, webhooks, shared messages systems, etc, you most probably should go with plain ol' UUID identities as the format is widely accepted and has support in all mayor languages

If you have full control of your architecture and the systems it shares data with you may consider using a more concise UUID identifier or a non-UUID identifier which can have other benefits such as being more user/url friendly, being sortable, etc

_If you happen to know another method of generating unique identifiers let me know so it can be analysed and eventually integrated_

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/identity/issues). Have a look at existing issues before.

See file [CONTRIBUTING.md](https://github.com/phpgears/identity/blob/master/CONTRIBUTING.md)

## License

See file [LICENSE](https://github.com/phpgears/identity/blob/master/LICENSE) included with the source code for a copy of the license terms.
