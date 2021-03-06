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
    public function testFromString(): void
    {
        $uuid = '4c4316cb-b48b-44fb-a034-90d789966bac';
        $stub = UuidIdentity::fromString($uuid);

        static::assertSame($uuid, $stub->getValue());
    }
}
