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

use Gears\Identity\CondensedUuidIdentity;
use Gears\Identity\Exception\InvalidIdentityException;
use PHPUnit\Framework\TestCase;

/**
 * Condensed UUID Identity test.
 */
class CondensedUuidIdentityTest extends TestCase
{
    public function testInvalidCondensedUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage(
            'Provided identity value "invalidCondensedUUID" is not a valid condensed UUID.'
        );

        CondensedUuidIdentity::fromString('invalidCondensedUUID');
    }

    public function testNonRFC4122CondensedUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage(
            'Provided identity value "0000000007bf961babd8c4716f92fcc0" is not a valid condensed UUID.'
        );

        CondensedUuidIdentity::fromString('0000000007bf961babd8c4716f92fcc0');
    }

    public function testFromString(): void
    {
        $uuid = '4c4316cbb48b44fba03490d789966bac';
        $stub = CondensedUuidIdentity::fromString($uuid);

        static::assertSame($uuid, $stub->getValue());
    }

    public function testFromUuid(): void
    {
        $hashedUuid = '3802ed466490417b9cd7968efa4af5e1';
        $stub = CondensedUuidIdentity::fromUuid('3802ed46-6490-417b-9cd7-968efa4af5e1');

        static::assertSame($hashedUuid, $stub->getValue());
    }
}
