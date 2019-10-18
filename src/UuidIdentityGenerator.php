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
 * UUID identity generator.
 */
class UuidIdentityGenerator extends AbstractUuidIdentityGenerator
{
    /**
     * {@inheritdoc}
     *
     * @return UuidIdentity
     */
    public function generate()
    {
        return UuidIdentity::fromString($this->getUuidString());
    }
}
