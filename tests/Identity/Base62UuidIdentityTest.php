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
use PHPUnit\Framework\TestCase;

/**
 * Base62 UUID Identity test.
 */
class Base62UuidIdentityTest extends TestCase
{
    public function testFromString(): void
    {
        $base62Uuid = '5Emmuz1MtDyH0ulbheVWbM';
        $stub = Base62UuidIdentity::fromString($base62Uuid);

        $this->assertSame($base62Uuid, $stub->getValue());
        $this->assertSame($base62Uuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "invalidBase62UUID" is not a valid bas62 UUID
     */
    public function testInvalidBase62Uuid(): void
    {
        Base62UuidIdentity::fromString('invalidBase62UUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "14eEn5G9R1FmCRn08bMkMz" is not a valid bas62 UUID
     */
    public function testNonRFC4122Base62Uuid(): void
    {
        Base62UuidIdentity::fromString('14eEn5G9R1FmCRn08bMkMz');
    }

    public function testFromUuid(): void
    {
        $base62Uuid = '1hguHv6WskxxsOZWWde1D7';
        $stub = Base62UuidIdentity::fromUuid('3802ed46-6490-417b-9cd7-968efa4af5e1');

        $this->assertSame($base62Uuid, $stub->getValue());
        $this->assertSame($base62Uuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "invalidUUID" is not a valid UUID
     */
    public function testInvalidUuid(): void
    {
        Base62UuidIdentity::fromUuid('invalidUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "00000000-07bf-961b-abd8-c4716f92fcc0" is not a valid UUID
     */
    public function testNonRFC4122Uuid(): void
    {
        Base62UuidIdentity::fromUuid('00000000-07bf-961b-abd8-c4716f92fcc0');
    }
}
