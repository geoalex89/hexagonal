<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\ValueObject;

use Symfony\Component\Uid\Ulid;

abstract class EntityUlid extends Ulid implements \Stringable
{
    public final function __construct(string $ulid = null)
    {
        parent::__construct($ulid);
    }

    public static function fromString(string $ulid): static
    {
        $ulid = parent::fromString($ulid);
        return new static($ulid->__toString());
    }

    public static function create(string $value = null): static
    {
        return new static($value);
    }
}