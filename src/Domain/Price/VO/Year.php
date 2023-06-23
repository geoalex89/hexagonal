<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\VO;

use Hexagonal\Domain\Price\Exception\PriceException;
use Hexagonal\Domain\Shared\ValueObject\IntValueObject;

final class Year extends IntValueObject
{
    /** @throws PriceException */
    public static function create(int $value): self
    {
        $today = new \DateTime('now', new \DateTimeZone('UTC'));

        if ($value < intval((clone $today)->modify('-2 year')->format('Y')) ||
            $value > intval((clone $today)->modify('+2 year')->format('Y'))
        ) {
            throw PriceException::invalidYear(sprintf(
                'Year must be between two years in the past or two year ahead. Current year <%s> and year given <%s>',
                $today->format('Y'),
                $value,
            ));
        }
        return new self($value);
    }
}