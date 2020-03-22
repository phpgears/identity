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
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Nonstandard\Uuid as NonstandardUuid;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Immutable UUID based identity.
 */
abstract class AbstractUuidIdentity extends AbstractIdentity
{
    /**
     * @param string $uuidString
     *
     * @throws InvalidUuidStringException
     *
     * @return UuidInterface
     */
    final protected static function uuidFromString(string $uuidString): UuidInterface
    {
        try {
            $uuid = Uuid::fromString($uuidString);
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid UUID', $uuidString),
                0,
                $exception
            );
        }

        static::assertUuidVariant($uuid);

        return $uuid;
    }

    /**
     * Assert correct UUID variant.
     *
     * @param UuidInterface $uuid
     *
     * @throws InvalidUuidStringException
     */
    final protected static function assertUuidVariant(UuidInterface $uuid): void
    {
        if ((\class_exists('Ramsey\Uuid\Nonstandard\Uuid') && $uuid instanceof NonstandardUuid)
            || ($uuid->getVariant() !== Uuid::RFC_4122 || !\in_array($uuid->getVersion(), \range(1, 5), true))
        ) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid UUID', $uuid->toString())
            );
        }
    }
}
