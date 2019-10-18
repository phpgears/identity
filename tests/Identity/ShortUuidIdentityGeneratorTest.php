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
use Gears\Identity\ShortUuidIdentityGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Short UUID Identity generator test.
 */
class ShortUuidIdentityGeneratorTest extends TestCase
{
    public function testGeneration(): void
    {
        $identity = (new ShortUuidIdentityGenerator())->generate();

        static::assertInstanceOf(ShortUuidIdentity::class, $identity);
    }
}
