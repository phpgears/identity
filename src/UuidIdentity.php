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

/**
 * UUID identity.
 */
class UuidIdentity extends AbstractUuidIdentity
{
    /**
     * {@inheritdoc}
     */
    final public static function fromString(string $value)
    {
        $uuid = static::uuidFromString($value);

        return new static($uuid->toString());
    }
}
