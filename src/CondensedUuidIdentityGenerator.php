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
 * Condensed UUID identity generator.
 */
class CondensedUuidIdentityGenerator extends AbstractUuidIdentityGenerator
{
    /**
     * {@inheritdoc}
     *
     * @return CondensedUuidIdentity
     */
    public function generate()
    {
        return CondensedUuidIdentity::fromUuid($this->getUuidString());
    }
}
