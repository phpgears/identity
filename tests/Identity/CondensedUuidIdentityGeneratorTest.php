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

use Gears\Identity\CondensedUuidIdentity;
use Gears\Identity\CondensedUuidIdentityGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Condensed UUID Identity generator test.
 */
class CondensedUuidIdentityGeneratorTest extends TestCase
{
    public function testGeneration(): void
    {
        $identity = (new CondensedUuidIdentityGenerator())->generate();

        static::assertInstanceOf(CondensedUuidIdentity::class, $identity);
    }
}
