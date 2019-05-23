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

use Gears\Identity\HashUuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Hashed UUID Identity test.
 */
class HashUuidIdentityTest extends TestCase
{
    public function testFromString(): void
    {
        $hashedUuid = 'gqYxv3lMPXSEkGoonzDZtMNwE4Q';
        $stub = HashUuidIdentity::fromString($hashedUuid);

        $this->assertSame($hashedUuid, $stub->getValue());
        $this->assertSame($hashedUuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "invalidHashedUUID" is not a valid hashed UUID
     */
    public function testInvalidHashUuid(): void
    {
        HashUuidIdentity::fromString('invalidHashedUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "gGJqXEqR7AFZjBkzP9MLtWYP9AA" is not a valid hashed UUID
     */
    public function testNonRFC4122HashUuid(): void
    {
        HashUuidIdentity::fromString('gGJqXEqR7AFZjBkzP9MLtWYP9AA');
    }

    public function testFromUuid(): void
    {
        $hashedUuid = 'vp5kzNgRlxuwLOJ5OJWAsQyBWkOw';
        $stub = HashUuidIdentity::fromUuid('3802ed46-6490-417b-9cd7-968efa4af5e1');

        $this->assertSame($hashedUuid, $stub->getValue());
        $this->assertSame($hashedUuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "invalidUUID" is not a valid UUID
     */
    public function testInvalidUuid(): void
    {
        HashUuidIdentity::fromUuid('invalidUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "00000000-07bf-961b-abd8-c4716f92fcc0" is not a valid UUID
     */
    public function testNonRFC4122Uuid(): void
    {
        HashUuidIdentity::fromUuid('00000000-07bf-961b-abd8-c4716f92fcc0');
    }
}
