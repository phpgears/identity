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

use Gears\Identity\Tests\Stub\AbstractIdentityStub;
use PHPUnit\Framework\TestCase;

/**
 * Abstract Identity test.
 */
class AbstractIdentityTest extends TestCase
{
    public function testFromString(): void
    {
        $stub = AbstractIdentityStub::fromString('thisIsMyId');

        static::assertSame('thisIsMyId', $stub->getValue());
    }

    public function testSerialization(): void
    {
        $stub = AbstractIdentityStub::fromString('thisIsMyId');

        $serialized = \version_compare(\PHP_VERSION, '7.4.0') >= 0
            ? 'O:46:"Gears\Identity\Tests\Stub\AbstractIdentityStub":1:{s:5:"value";s:10:"thisIsMyId";}'
            : 'C:46:"Gears\Identity\Tests\Stub\AbstractIdentityStub":18:{s:10:"thisIsMyId";}';

        static::assertSame($serialized, \serialize($stub));
        static::assertSame('thisIsMyId', (\unserialize($serialized))->getValue());
        static::assertSame('"thisIsMyId"', \json_encode($stub));
    }

    public function testEquality(): void
    {
        $stub = AbstractIdentityStub::fromString('thisIsMyId');

        static::assertTrue($stub->isEqualTo(AbstractIdentityStub::fromString('thisIsMyId')));
        static::assertFalse($stub->isEqualTo(AbstractIdentityStub::fromString('anotherId')));
    }
}
