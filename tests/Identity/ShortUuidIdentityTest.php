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
use Gears\Identity\ShortUuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Short UUID Identity test.
 */
class ShortUuidIdentityTest extends TestCase
{
    public function testFromString(): void
    {
        $shortUuid = 'QuwMZbb9f3ccpacCPmVRaF';
        $stub = ShortUuidIdentity::fromString($shortUuid);

        $this->assertSame($shortUuid, $stub->getValue());
        $this->assertSame($shortUuid, (string) $stub);
    }

    public function testInvalidShortUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "invalidShortUUID" is not a valid short UUID');

        ShortUuidIdentity::fromString('invalidShortUUID');
    }

    public function testNonRFC4122ShortUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "zaDP55gm3yL9cV2D" is not a valid short UUID');

        ShortUuidIdentity::fromString('zaDP55gm3yL9cV2D');
    }

    public function testFromUuid(): void
    {
        $shortUuid = 'FfRp8fQyGyCnTW42bXJ4yB';
        $stub = ShortUuidIdentity::fromUuid('3802ed46-6490-417b-9cd7-968efa4af5e1');

        $this->assertSame($shortUuid, $stub->getValue());
        $this->assertSame($shortUuid, (string) $stub);
    }

    public function testInvalidUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "invalidUUID" is not a valid UUID');

        ShortUuidIdentity::fromUuid('invalidUUID');
    }

    public function testNonRFC4122Uuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage(
            'Provided identity value "00000000-07bf-961b-abd8-c4716f92fcc0" is not a valid UUID'
        );

        ShortUuidIdentity::fromUuid('00000000-07bf-961b-abd8-c4716f92fcc0');
    }
}
