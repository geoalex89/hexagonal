<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\Exception;

use Hexagonal\Domain\Shared\Exception\InvalidDomainException;

final class PriceException extends InvalidDomainException
{
    public const INVALID_YEAR = 'invalid_year';
    public const INVALID_MONTH = 'invalid_month';

    public static function invalidYear(string $message): self
    {
        return new self(self::INVALID_YEAR, $message);
    }

    public static function invalidMonth(string $message): self
    {
        return new self(self::INVALID_MONTH, $message);
    }

}