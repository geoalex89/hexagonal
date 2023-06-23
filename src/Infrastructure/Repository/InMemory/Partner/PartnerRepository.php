<?php

declare(strict_types=1);

namespace Hexagonal\Infrastructure\Repository\InMemory\Partner;

use Hexagonal\Domain\Partner\Exception\PartnerException;
use Hexagonal\Domain\Partner\Partner;
use Hexagonal\Domain\Partner\Repository\PartnerRepository as PartnerRepositoryInterface;
use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Shared\ValueObject\Audit;

final class PartnerRepository implements PartnerRepositoryInterface
{
    public function store(Partner $partner): void
    {
        // TODO: Implement store() method.
    }

    public function findByIdAndActive(PartnerId $id): Partner
    {
        return $this->dummyRegister()[strval($id)] ?? throw PartnerException::notFound($id);
    }

    private function dummyRegister(): array
    {
        return [
            '01H3MB0QSN43520J754EK0M2CM' =>
                (new Partner(PartnerId::create('01H3MB0QSN43520J754EK0M2CM'), true, Audit::create()))
        ];
    }
}