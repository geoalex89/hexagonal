<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\ValueObject;

use Stringable;

abstract class StringValueObject implements Stringable
{
    protected final function __construct(protected readonly string $value)
    {
    }

    public static function create(string $value): static
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(StringValueObject $compared): bool
    {
        return $this->value() === $compared->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }
}