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

namespace Gears\Identity;

use Ramsey\Uuid\Uuid;

/**
 * Abstract UUID identity generator.
 */
abstract class AbstractUuidIdentityGenerator implements IdentityGenerator
{
    /**
     * Get UUID string.
     *
     * @return string
     */
    protected function getUuidString(): string
    {
        return Uuid::uuid4()->toString();
    }
}
