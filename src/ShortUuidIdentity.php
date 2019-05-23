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
use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

/**
 * Short UUID identity.
 */
class ShortUuidIdentity extends AbstractIdentity
{
    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    final public static function fromString(string $value)
    {
        $uuid = (new ShortUuid())->decode($value);
        if ($uuid->getVariant() !== Uuid::RFC_4122 || !\in_array($uuid->getVersion(), \range(1, 5), true)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid short UUID', $value)
            );
        }

        return new static($value);
    }

    /**
     * Get identity from UUID string.
     *
     * @param string $value
     *
     * @return mixed|static
     */
    final public static function fromUuid(string $value)
    {
        try {
            $uuid = Uuid::fromString($value);
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid UUID', $value),
                0,
                $exception
            );
        }

        if ($uuid->getVariant() !== Uuid::RFC_4122 || !\in_array($uuid->getVersion(), \range(1, 5), true)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid UUID', $value)
            );
        }

        return new static((new ShortUuid())->encode($uuid));
    }
}
