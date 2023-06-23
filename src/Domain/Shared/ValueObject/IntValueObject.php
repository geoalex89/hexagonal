<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\ValueObject;

use Stringable;

abstract class IntValueObject implements Stringable
{
    protected final function __construct(protected readonly int $value)
    {
    }

    public static function create(int $value): static
    {
        return new static($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(IntValueObject $compared): bool
    {
        return $this->value() === $compared->value();
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }
}