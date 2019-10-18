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

/**
 * Base62 UUID identity generator.
 */
class Base62UuidIdentityGenerator extends AbstractUuidIdentityGenerator
{
    /**
     * {@inheritdoc}
     *
     * @return Base62UuidIdentity
     */
    public function generate()
    {
        return Base62UuidIdentity::fromUuid($this->getUuidString());
    }
}
