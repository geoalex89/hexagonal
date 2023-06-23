<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Room\Repository;

use Hexagonal\Domain\Partner\Room;
use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Room\VO\RoomCollection;

interface RoomRepository
{
    public function store(Room $room): void;
    public function findByPartnerId(PartnerId $partnerId): RoomCollection;
}