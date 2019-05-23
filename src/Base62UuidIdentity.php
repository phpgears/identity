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
use Tuupola\Base62;

/**
 * Base62 UUID identity.
 */
class Base62UuidIdentity extends AbstractIdentity
{
    private const UUID_HEX_LENGTH = 32;

    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    final public static function fromString(string $value)
    {
        $decoded = \bin2hex((new Base62())->decode($value));
        if (\strlen($decoded) !== static::UUID_HEX_LENGTH) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid bas62 UUID', $value)
            );
        }

        try {
            $uuid = Uuid::fromString(
                \sprintf('%s%s-%s-%s-%s-%s%s%s', ...\str_split($decoded, 4))
            );
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid bas62 UUID', $value),
                0,
                $exception
            );
        }

        if ($uuid->getVariant() !== Uuid::RFC_4122 || !\in_array($uuid->getVersion(), \range(1, 5), true)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid bas62 UUID', $value)
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

        /** @var string $binaryUuid */
        $binaryUuid = \hex2bin(\str_replace('-', '', $uuid->toString()));

        return new static((new Base62())->encode($binaryUuid));
    }
}
