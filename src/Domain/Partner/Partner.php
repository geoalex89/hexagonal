<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Partner;

use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Shared\ValueObject\Audit;

final class Partner
{
    public function __construct(
        private readonly PartnerId $id,
        private readonly boolean $status,
        private readonly Audit $audit,
    ) {
    }
}