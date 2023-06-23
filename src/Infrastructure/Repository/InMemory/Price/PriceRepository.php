<?php

declare(strict_types=1);

namespace Hexagonal\Infrastructure\Repository\InMemory\Partner;

use Hexagonal\Domain\Price\Model\Price;
use Hexagonal\Domain\Price\Repository\PriceRepository as PriceRepositoryInterface;
use Hexagonal\Domain\Price\VO\Period;
use Hexagonal\Domain\Room\VO\RoomId;

final class PriceRepository implements PriceRepositoryInterface
{
    public function store(Price $price): void
    {
        // TODO: Implement store() method.
    }

    public function findRoomIdAndPeriod(RoomId $roomId, Period $period): ?Price
    {
        // TODO: Implement findRoomIdAndPeriod() method.
    }
}