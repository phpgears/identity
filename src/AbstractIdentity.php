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

use Gears\Immutability\ImmutabilityBehaviour;

/**
 * Base immutable identity.
 */
abstract class AbstractIdentity implements Identity
{
    use ImmutabilityBehaviour;

    /**
     * Identity value.
     *
     * @var string
     */
    private $value;

    /**
     * AbstractIdentity constructor.
     *
     * @param string $value
     */
    final protected function __construct(string $value)
    {
        $this->assertImmutable();

        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    final public function isEqualTo($identity): bool
    {
        return \is_object($identity)
            && \get_class($identity) === static::class
            && $identity->getValue() === $this->getValue();
    }

    /**
     * {@inheritdoc}
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return array<string, mixed>
     */
    final public function __serialize(): array
    {
        return ['value' => $this->value];
    }

    /**
     * @param array<string, mixed> $data
     */
    final public function __unserialize(array $data): void
    {
        $this->assertImmutable();

        $this->value = $data['value'];
    }

    /**
     * {@inheritdoc}
     */
    final public function serialize(): string
    {
        return \serialize($this->value);
    }

    /**
     * {@inheritdoc}
     *
     * @param mixed $serialized
     */
    final public function unserialize($serialized): void
    {
        $this->assertImmutable();

        $this->value = \unserialize($serialized, ['allowed_classes' => false]);
    }

    /**
     * {@inheritdoc}
     */
    final public function jsonSerialize(): string
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     *
     * @return string[]
     */
    final protected function getAllowedInterfaces(): array
    {
        return [Identity::class];
    }
}
