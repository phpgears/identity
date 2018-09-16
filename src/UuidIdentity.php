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

use Gears\Identity\Exception\InvalidIdentityException;
use Ramsey\Uuid\Uuid;

/**
 * UUID identity.
 */
class UuidIdentity extends AbstractIdentity
{
    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    public static function fromString(string $value)
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identifier "%s" is not a valid UUID', $value)
            );
        }

        return new static($value);
    }
}
