<?php

/*
 * identity (https://github.com/phpgears/identity).
 * Identity objects for PHP.
 *
 * @license MIT
 * @link https://github.com/phpgears/identity
 * @author Julián Gutiérrez <juliangut@gmail.com>
 */

declare(strict_types=1);

namespace Gears\Identity\Tests;

use Gears\Identity\Base62UuidIdentity;
use Gears\Identity\Exception\InvalidIdentityException;
use PHPUnit\Framework\TestCase;

/**
 * Base62 UUID Identity test.
 */
class Base62UuidIdentityTest extends TestCase
{
    public function testInvalidBase62Uuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "invalidBase62UUID" is not a valid bas62 UUID');

        Base62UuidIdentity::fromString('invalidBase62UUID');
    }

    public function testNonRFC4122Base62Uuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "14eEn5G9R1FmCRn08bMkMz" is not a valid bas62 UUID');

        Base62UuidIdentity::fromString('14eEn5G9R1FmCRn08bMkMz');
    }

    public function testFromString(): void
    {
        $base62Uuid = '5Emmuz1MtDyH0ulbheVWbM';
        $stub = Base62UuidIdentity::fromString($base62Uuid);

        static::assertSame($base62Uuid, $stub->getValue());
    }

    public function testFromUuid(): void
    {
        $base62Uuid = '1hguHv6WskxxsOZWWde1D7';
        $stub = Base62UuidIdentity::fromUuid('3802ed46-6490-417b-9cd7-968efa4af5e1');

        static::assertSame($base62Uuid, $stub->getValue());
    }
}
