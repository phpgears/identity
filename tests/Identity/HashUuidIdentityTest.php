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
    public function testCreation(): void
    {
        $hashedUuid = 'gqYxv3lMPXSEkGoonzDZtMNwE4Q';
        $stub = HashUuidIdentity::fromString($hashedUuid);

        $this->assertSame($hashedUuid, $stub->getValue());
        $this->assertSame($hashedUuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identifier "invalidHashedUUID" is not a valid hashed UUID
     */
    public function testInvalidShortUuid(): void
    {
        HashUuidIdentity::fromString('invalidHashedUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identifier "gGJqXEqR7AFZjBkzP9MLtWYP9AA" is not a valid hashed UUID
     */
    public function testNonRFC4122Uuid(): void
    {
        HashUuidIdentity::fromString('gGJqXEqR7AFZjBkzP9MLtWYP9AA');
    }
}
