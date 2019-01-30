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

use Gears\Identity\ShortUuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Short UUID Identity test.
 */
class ShortUuidIdentityTest extends TestCase
{
    public function testCreation(): void
    {
        $shortUuid = 'QuwMZbb9f3ccpacCPmVRaF';
        $stub = ShortUuidIdentity::fromString($shortUuid);

        $this->assertSame($shortUuid, $stub->getValue());
        $this->assertSame($shortUuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identifier "invalidShortUUID" is not a valid short UUID
     */
    public function testInvalidShortUuid(): void
    {
        ShortUuidIdentity::fromString('invalidShortUUID');
    }
}
