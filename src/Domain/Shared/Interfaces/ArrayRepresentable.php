<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Interfaces;

interface ArrayRepresentable
{
    public function asArray(): array;
}