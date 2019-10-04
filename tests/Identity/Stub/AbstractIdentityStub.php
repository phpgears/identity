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

namespace Gears\Identity\Tests\Stub;

use Gears\Identity\AbstractIdentity;
use Gears\Identity\Identity;

/**
 * Abstract identity stub class.
 */
class AbstractIdentityStub extends AbstractIdentity
{
    /**
     * {@inheritdoc}
     */
    public static function fromString(string $value)
    {
        return new static($value);
    }
}
