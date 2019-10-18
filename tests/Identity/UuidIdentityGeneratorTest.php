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
use Gears\Identity\UuidIdentityGenerator;
use PHPUnit\Framework\TestCase;

/**
 * UUID Identity generator test.
 */
class UuidIdentityGeneratorTest extends TestCase
{
    public function testGeneration(): void
    {
        $identity = (new UuidIdentityGenerator())->generate();

        static::assertInstanceOf(UuidIdentity::class, $identity);
    }
}
