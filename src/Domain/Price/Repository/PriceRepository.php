<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\Repository;

use Hexagonal\Domain\Price\Model\Price;
use Hexagonal\Domain\Price\VO\Period;
use Hexagonal\Domain\Room\VO\RoomId;

interface PriceRepository
{
    public function store(Price $price): void;
    public function findRoomIdAndPeriod(RoomId $roomId, Period $period): ?Price;
}