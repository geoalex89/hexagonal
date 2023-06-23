<?php

declare(strict_types=1);

namespace Hexagonal\Infrastructure\Repository\InMemory\Partner;

use Hexagonal\Domain\Partner\Partner;
use Hexagonal\Domain\Partner\Repository\PartnerRepository as PartnerRepositoryInterface;
use Hexagonal\Domain\Partner\VO\PartnerId;

final class PartnerRepository implements PartnerRepositoryInterface
{
    public function store(Partner $partner): void
    {
        // TODO: Implement store() method.
    }

    public function findByIdAndActive(PartnerId $id): Partner
    {
        // TODO: Implement findByIdAndActive() method.
    }
}