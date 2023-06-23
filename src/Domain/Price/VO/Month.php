<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\VO;

use Hexagonal\Domain\Price\Exception\PriceException;
use Hexagonal\Domain\Shared\ValueObject\IntValueObject;

final class Month extends IntValueObject
{
    /** @throws PriceException */
    public static function create(int $value): self
    {
        if ($value < 1 || $value > 12) {
            throw PriceException::invalidMonth(sprintf(
                'Month give <%s> is over range exceeded',
                $value
            ));
        }
        return new self($value);
    }
}