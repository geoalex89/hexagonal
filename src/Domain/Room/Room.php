<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Partner;

use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Room\VO\RoomId;
use Hexagonal\Domain\Shared\ValueObject\Audit;

final class Room
{
    public function __construct(
        private readonly RoomId $id,
        private readonly PartnerId $partnerId,
        private Audit $audit,
    ) {
    }

    public function id(): RoomId
    {
        return $this->id;
    }

    public function partnerId(): PartnerId
    {
        return $this->partnerId;
    }

    public function audit(): Audit
    {
        return $this->audit;
    }
}