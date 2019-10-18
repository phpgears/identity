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

use Gears\Identity\Base62UuidIdentity;
use Gears\Identity\Base62UuidIdentityGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Base62 UUID Identity generator test.
 */
class Base62UuidIdentityGeneratorTest extends TestCase
{
    public function testGeneration(): void
    {
        $identity = (new Base62UuidIdentityGenerator())->generate();

        static::assertInstanceOf(Base62UuidIdentity::class, $identity);
    }
}
