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

use Gears\Identity\Exception\InvalidIdentityException;
use Gears\Identity\UuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * UUID Identity test.
 */
class UuidIdentityTest extends TestCase
{
    public function testFromString(): void
    {
        $uuid = '4c4316cb-b48b-44fb-a034-90d789966bac';
        $stub = UuidIdentity::fromString($uuid);

        static::assertSame($uuid, $stub->getValue());
        static::assertSame($uuid, (string) $stub);
    }

    public function testInvalidUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "invalidUUID" is not a valid UUID');

        UuidIdentity::fromString('invalidUUID');
    }

    public function testNonRFC4122Uuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage(
            'Provided identity value "00000000-07bf-961b-abd8-c4716f92fcc0" is not a valid UUID'
        );

        UuidIdentity::fromString('00000000-07bf-961b-abd8-c4716f92fcc0');
    }
}
