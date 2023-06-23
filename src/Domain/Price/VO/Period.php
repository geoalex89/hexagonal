<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Price\VO;

final class Period
{
    public function __construct(
        private readonly Year $year,
        private readonly Month $month,
        private readonly DayValueCollection $dayValueCollection,
    ) {
    }

    public function year(): Year
    {
        return $this->year;
    }

    public function month(): Month
    {
        return $this->month;
    }

    public function dayValueCollection(): DayValueCollection
    {
        return $this->dayValueCollection;
    }
}