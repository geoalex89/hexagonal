<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Partner;

use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Shared\ValueObject\Audit;

final class Partner
{
    public function __construct(
        private readonly PartnerId $id,
        private readonly bool $status,
        private readonly Audit $audit,
    ) {
    }

    public function id(): PartnerId
    {
        return $this->id;
    }

    public function status(): bool
    {
        return $this->status;
    }

    public function audit(): Audit
    {
        return $this->audit;
    }
}