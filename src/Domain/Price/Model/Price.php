<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\Model;

use Hexagonal\Domain\Price\VO\Period;
use Hexagonal\Domain\Price\VO\PriceId;
use Hexagonal\Domain\Room\VO\RoomId;
use Hexagonal\Domain\Shared\ValueObject\Audit;

final class Price
{
    public function __construct(
        private readonly PriceId $id,
        private readonly RoomId $roomId,
        private readonly Period $period,
        private readonly Audit $audit,
    ) {
    }
}