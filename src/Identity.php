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

/**
 * Identity interface.
 */
interface Identity extends \Serializable, \JsonSerializable
{
    /**
     * Get identity from string.
     *
     * @param string $value
     *
     * @throws InvalidIdentityException
     *
     * @return mixed|self
     */
    public static function fromString(string $value);

    /**
     * Check identity equality.
     *
     * @param mixed $identity
     *
     * @return bool
     */
    public function isEqualTo($identity): bool;

    /**
     * Get identity as string representation.
     *
     * @return string
     */
    public function getValue(): string;
}
