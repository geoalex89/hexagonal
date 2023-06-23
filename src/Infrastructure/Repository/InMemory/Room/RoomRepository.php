<?php

declare(strict_types=1);

namespace Hexagonal\Infrastructure\Repository\InMemory\Room;

use Hexagonal\Domain\Partner\Room;
use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Room\Repository\RoomRepository as RoomRepositoryInterface;
use Hexagonal\Domain\Room\VO\RoomCollection;

final class RoomRepository implements RoomRepositoryInterface
{
    public function store(Room $room): void
    {
        // TODO: Implement store() method.
    }

    public function findByPartnerId(PartnerId $partnerId): RoomCollection
    {
        // TODO: Implement findByPartnerId() method.
    }
}