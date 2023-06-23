<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Partner\Exception;

use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Shared\Exception\InvalidDomainException;

class PartnerException extends InvalidDomainException
{
    public const PARTNER_NOT_FOUND = 'partner_not_found';

    public static function notFound(PartnerId $id): self
    {
        return new self(self::PARTNER_NOT_FOUND, sprintf('Partner <%s> not found', $id));
    }
}