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
use Gears\Identity\Tests\Stub\AbstractUuidIdentityStub;
use PHPUnit\Framework\TestCase;

/**
 * Abstract UUID based identity test.
 */
class AbstractUuidIdentityTest extends TestCase
{
    public function testInvalidUuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage('Provided identity value "invalidUUID" is not a valid UUID');

        AbstractUuidIdentityStub::fromString('invalidUUID');
    }

    public function testNonRFC4122Uuid(): void
    {
        $this->expectException(InvalidIdentityException::class);
        $this->expectExceptionMessage(
            'Provided identity value "00000000-07bf-961b-abd8-c4716f92fcc0" is not a valid UUID'
        );

        AbstractUuidIdentityStub::fromString('00000000-07bf-961b-abd8-c4716f92fcc0');
    }
}
