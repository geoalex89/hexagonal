<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Exception;

final class InvalidSharedException extends InvalidDomainException
{
    public const INVALID_AUDIT = 'invalid_audit';

    public static function invalidAudit(string $message): self
    {
        return new self(self::INVALID_AUDIT, $message);
    }
}