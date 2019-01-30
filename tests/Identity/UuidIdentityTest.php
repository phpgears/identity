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

use Gears\Identity\UuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * UUID Identity test.
 */
class UuidIdentityTest extends TestCase
{
    public function testCreation(): void
    {
        $uuid = '4c4316cb-b48b-44fb-a034-90d789966bac';
        $stub = UuidIdentity::fromString($uuid);

        $this->assertSame($uuid, $stub->getValue());
        $this->assertSame($uuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identifier "invalidUUID" is not a valid UUID
     */
    public function testInvalidUuid(): void
    {
        UuidIdentity::fromString('invalidUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identifier "00000000-07bf-861b-abd8-c4716f92fcc0" is not a valid UUID
     */
    public function testNonRFC4122Uuid(): void
    {
        UuidIdentity::fromString('00000000-07bf-861b-abd8-c4716f92fcc0');
    }
}
