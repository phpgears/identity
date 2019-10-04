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
use Hashids\Hashids;

/**
 * Hashed UUID identity.
 */
class HashUuidIdentity extends AbstractUuidIdentity
{
    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    final public static function fromString(string $value)
    {
        try {
            static::uuidFromString((new Hashids())->decodeHex($value));
        } catch (InvalidIdentityException $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid hashed UUID', $value),
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
     * @return mixed|static
     */
    final public static function fromUuid(string $value)
    {
        $uuid = static::uuidFromString($value);

        return new static((new Hashids())->encodeHex(\str_replace('-', '', $uuid->toString())));
    }
}
