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
 * Identity value object interface.
 */
interface Identity
{
    /**
     * Get identity from string.
     *
     * @param string $value
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

    /**
     * @return string
     */
    public function __toString(): string;
}
