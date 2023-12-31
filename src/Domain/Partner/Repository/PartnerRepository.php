<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Partner\Repository;

use Hexagonal\Domain\Partner\Exception\PartnerException;
use Hexagonal\Domain\Partner\Partner;
use Hexagonal\Domain\Partner\VO\PartnerId;

interface PartnerRepository
{
    public function store(Partner $partner): void;
    /** @throws PartnerException */
    public function findByIdAndActive(PartnerId $id): Partner;
}