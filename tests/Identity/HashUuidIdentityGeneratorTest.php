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
use Gears\Identity\HashUuidIdentityGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Hash UUID Identity generator test.
 */
class HashUuidIdentityGeneratorTest extends TestCase
{
    public function testGeneration(): void
    {
        $identity = (new HashUuidIdentityGenerator())->generate();

        static::assertInstanceOf(HashUuidIdentity::class, $identity);
    }
}
