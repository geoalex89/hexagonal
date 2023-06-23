<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\VO;

use Hexagonal\Domain\Shared\Collection\CollectionTypeHandler;
use Hexagonal\Domain\Shared\Collection\CollectionTypeInterface;

final class DayValueCollection implements CollectionTypeInterface
{
    use CollectionTypeHandler;

    public static function type(): string
    {
        return DayValue::class;
    }
}