<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Traits;

trait ExceptionHandler
{
    private string $name;

    public function name(): string
    {
        return $this->name;
    }

    public function is(string $name): bool
    {
        return $this->name() === $name;
    }
}