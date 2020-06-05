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

use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;

/**
 * Abstract UUID identity generator.
 */
abstract class AbstractUuidIdentityGenerator implements IdentityGenerator
{
    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * Get UUID string.
     *
     * @return string
     */
    protected function getUuidString(): string
    {
        return $this->getUuidGenerator()->uuid4()->toString();
    }

    /**
     * Get UUID generator.
     *
     * @return UuidFactoryInterface
     */
    private function getUuidGenerator(): UuidFactoryInterface
    {
        if ($this->uuidFactory === null) {
            $this->uuidFactory = new UuidFactory();
            $this->uuidFactory->setCodec(new TimestampFirstCombCodec($this->uuidFactory->getUuidBuilder()));
            $this->uuidFactory->setRandomGenerator(
                new CombGenerator($this->uuidFactory->getRandomGenerator(), $this->uuidFactory->getNumberConverter())
            );
        }

        return $this->uuidFactory;
    }
}
