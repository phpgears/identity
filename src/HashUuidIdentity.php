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
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

/**
 * Hashed UUID identity.
 */
class HashUuidIdentity extends AbstractIdentity
{
    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    public static function fromString(string $value)
    {
        try {
            $uuid = Uuid::fromString((new Hashids())->decodeHex($value));
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid hashed UUID', $value),
                0,
                $exception
            );
        }

        if ($uuid->getVariant() !== Uuid::RFC_4122 || !\in_array($uuid->getVersion(), \range(1, 5), true)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid hashed UUID', $value)
            );
        }

        return new static($value);
    }
}
