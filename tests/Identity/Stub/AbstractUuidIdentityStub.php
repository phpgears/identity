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

namespace Gears\Identity\Tests\Stub;

use Gears\Identity\AbstractUuidIdentity;
use Gears\Identity\Identity;

/**
 * Abstract UUID based identity stub class.
 */
class AbstractUuidIdentityStub extends AbstractUuidIdentity
{
    /**
     * {@inheritdoc}
     */
    public static function fromString(string $value)
    {
        return new static(static::uuidFromString($value)->toString());
    }
}
