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
 * Hash UUID identity generator.
 */
class HashUuidIdentityGenerator extends AbstractUuidIdentityGenerator
{
    /**
     * {@inheritdoc}
     *
     * @return HashUuidIdentity
     */
    public function generate()
    {
        return HashUuidIdentity::fromUuid($this->getUuidString());
    }
}
