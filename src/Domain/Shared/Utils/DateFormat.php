<?php
declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Utils;

use DateTimeInterface;

final class DateFormat
{
    public const DATETIME_TZ_FORMAT = 'Y-m-d H:i:s.v e';

    public static function render(?DateTimeInterface $dateTime, string $format = self::DATETIME_TZ_FORMAT): ?string
    {
        return $dateTime?->format($format);
    }
}