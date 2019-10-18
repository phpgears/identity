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
 * Identity generator interface.
 */
interface IdentityGenerator
{
    /**
     * Get generated identity.
     *
     * @return Identity|mixed
     */
    public function generate();
}
