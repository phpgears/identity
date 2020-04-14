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

use Gears\Identity\Exception\UnsupportedIdentityException;
use Gears\Identity\OrderedUuidIdentityGenerator;
use Gears\Identity\UuidIdentity;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Ordered UUID Identity generator test.
 */
class OrderedUuidIdentityGeneratorTest extends TestCase
{
    public function testUnsupported(): void
    {
        if (\interface_exists('Ramsey\Uuid\DeprecatedUuidInterface')) {
            $this->markTestSkipped('Ordered UUID are supported');
        }

        $this->expectException(UnsupportedIdentityException::class);
        $this->expectExceptionMessage('Ordered UUID (version 6) not available. Update ramsey/uuid to version ^4.0.');

        (new OrderedUuidIdentityGenerator())->generate();
    }

    public function testGeneration(): void
    {
        if (!\interface_exists('Ramsey\Uuid\DeprecatedUuidInterface')) {
            $this->markTestSkipped('Ordered UUID are not supported');
        }

        $identity = (new OrderedUuidIdentityGenerator())->generate();

        static::assertInstanceOf(UuidIdentity::class, $identity);
    }
}
