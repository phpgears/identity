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

/**
 * Short UUID identity.
 */
class ShortUuidIdentity extends AbstractUuidIdentity
{
    /**
     * {@inheritdoc}
     */
    final public static function fromString(string $value)
    {
        try {
            static::assertUuidVariant((new ShortUuid())->decode($value));
        } catch (\Exception $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid short UUID', $value),
                0,
                $exception
            );
        }

        return new static($value);
    }

    /**
     * Get identity from UUID string.
     *
     * @param string $value
     *
     * @throws InvalidIdentityException
     *
     * @return mixed|static
     */
    final public static function fromUuid(string $value)
    {
        $uuid = static::uuidFromString($value);

        return new static((new ShortUuid())->encode($uuid));
    }
}
