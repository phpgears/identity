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

use Gears\Identity\Exception\UnsupportedIdentityException;
use Ramsey\Uuid\Uuid;

/**
 * UUID version 6 (ordered UUID) identity generator.
 */
class OrderedUuidIdentityGenerator extends AbstractUuidIdentityGenerator
{
    /**
     * {@inheritdoc}
     *
     * @return UuidIdentity
     */
    public function generate()
    {
        if (!\interface_exists('Ramsey\Uuid\DeprecatedUuidInterface')) {
            throw new UnsupportedIdentityException(
                'Ordered UUID (version 6) are not available. Update ramsey/uuid to version ^4.0'
            );
        }

        return UuidIdentity::fromString(Uuid::uuid6()->toString());
    }
}
