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
use Tuupola\Base62;

/**
 * Base62 UUID identity.
 */
class Base62UuidIdentity extends AbstractUuidIdentity
{
    /**
     * {@inheritdoc}
     */
    final public static function fromString(string $value)
    {
        try {
            $decoded = \bin2hex((new Base62())->decode($value));

            static::uuidFromString(\sprintf('%s%s-%s-%s-%s-%s%s%s', ...\str_split($decoded, 4)));
        } catch (\Exception $exception) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid bas62 UUID.', $value),
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

        /** @var string $binaryUuid */
        $binaryUuid = \hex2bin(\str_replace('-', '', $uuid->toString()));

        return new static((new Base62())->encode($binaryUuid));
    }
}
