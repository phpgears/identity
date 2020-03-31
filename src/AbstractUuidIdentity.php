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
        if (\interface_exists('Ramsey\Uuid\DeprecatedUuidInterface')) {
            /** @var \Ramsey\Uuid\Rfc4122\FieldsInterface $fields */
            $fields = $uuid->getFields();
            $variant = $fields->getVariant();
            $version = $fields->getVersion();
        } else {
            $variant = $uuid->getVariant();
            $version = $uuid->getVersion();
        }

        if ($variant !== Uuid::RFC_4122 || !\in_array($version, \range(1, 6), true)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid UUID', $uuid->toString())
            );
        }
    }
}
