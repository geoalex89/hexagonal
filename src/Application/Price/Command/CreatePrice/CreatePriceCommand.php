<?php

declare(strict_types=1);

namespace Hexagonal\Application\Price\Command\CreatePrice;

use Hexagonal\Application\Shared\Interfaces\CommandInterface;
use Hexagonal\Domain\Shared\Interfaces\ArrayRepresentable;

class CreatePriceCommand implements CommandInterface, ArrayRepresentable
{
    public function __construct(
        public readonly string $partnerId,
        public readonly \DateTimeImmutable $starDate,
        public readonly \DateTimeImmutable $enDate,
        public readonly int $amount,
    ) {
    }

    public function partnerId(): string
    {
        return $this->partnerId;
    }

    public function starDate(): \DateTimeImmutable
    {
        return $this->starDate;
    }

    public function enDate(): \DateTimeImmutable
    {
        return $this->enDate;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function asArray(): array
    {
        return [
            ''
        ];
    }
}