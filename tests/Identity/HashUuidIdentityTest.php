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
use Gears\Identity\HashUuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Hashed UUID Identity test.
 */
class HashUuidIdentityTest extends TestCase
{
    public function testInvalidHashUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "invalidHashedUUID" is not a valid hashed UUID');

        HashUuidIdentity::fromString('invalidHashedUUID');
    }

    public function testNonRFC4122HashUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage(
            'Provided identity value "gGJqXEqR7AFZjBkzP9MLtWYP9AA" is not a valid hashed UUID'
        );

        HashUuidIdentity::fromString('gGJqXEqR7AFZjBkzP9MLtWYP9AA');
    }

    public function testFromString(): void
    {
        $hashedUuid = 'gqYxv3lMPXSEkGoonzDZtMNwE4Q';
        $stub = HashUuidIdentity::fromString($hashedUuid);

        static::assertSame($hashedUuid, $stub->getValue());
    }

    public function testFromUuid(): void
    {
        $hashedUuid = 'vp5kzNgRlxuwLOJ5OJWAsQyBWkOw';
        $stub = HashUuidIdentity::fromUuid('3802ed46-6490-417b-9cd7-968efa4af5e1');

        static::assertSame($hashedUuid, $stub->getValue());
    }
}
