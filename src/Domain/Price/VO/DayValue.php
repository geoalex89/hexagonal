<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\VO;

final class DayValue
{
    public function __construct(
        private readonly int $day,
        private readonly int $amount
    ) {
    }
}