<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Room\VO;

use Hexagonal\Domain\Partner\Room;
use Hexagonal\Domain\Shared\Collection\CollectionTypeHandler;
use Hexagonal\Domain\Shared\Collection\CollectionTypeInterface;

class RoomCollection implements CollectionTypeInterface
{
    use CollectionTypeHandler;

    public static function type(): string
    {
        return Room::class;
    }

}