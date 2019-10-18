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
 * Short UUID identity generator.
 */
class ShortUuidIdentityGenerator extends AbstractUuidIdentityGenerator
{
    /**
     * {@inheritdoc}
     *
     * @return ShortUuidIdentity
     */
    public function generate()
    {
        return ShortUuidIdentity::fromUuid($this->getUuidString());
    }
}
