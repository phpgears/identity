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
    public function testCreation(): void
    {
        $stub = AbstractIdentityStub::fromString('thisIsMyId');

        $this->assertSame('thisIsMyId', $stub->getValue());
        $this->assertSame('thisIsMyId', (string) $stub);
    }

    public function testEquality(): void
    {
        $stub = AbstractIdentityStub::fromString('thisIsMyId');

        $this->assertTrue($stub->isEqualTo(AbstractIdentityStub::fromString('thisIsMyId')));
        $this->assertFalse($stub->isEqualTo(AbstractIdentityStub::fromString('anotherId')));
    }
}
