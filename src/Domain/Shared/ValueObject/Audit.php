<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\ValueObject;

use DateTime;
use DateTimeImmutable;
use Hexagonal\Domain\Shared\Exception\InvalidSharedException;
use Hexagonal\Domain\Shared\Interfaces\ArrayRepresentable;
use Hexagonal\Domain\Shared\Utils\DateFormat;

final class Audit implements ArrayRepresentable
{
    /** @throws InvalidSharedException */
    private function __construct(private DateTimeImmutable $createdAt, private ?DateTime $updatedAt)
    {
        $this->constraints();
    }

    /** @throws InvalidSharedException */
    public static function create(
        DateTimeImmutable $createdAt = new \DateTimeImmutable('now', new \DateTimeZone('UTC')),
        ?DateTime $updatedAt = null
    ): self {
        return new self($createdAt, $updatedAt);
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /** @throws InvalidSharedException */
    public function setUpdatedAt(DateTime $updatedAt): Audit
    {
        return new self($this->createdAt(), $updatedAt);
    }

    /** @throws InvalidSharedException */
    private function constraints(): void
    {
        if ($this->updatedAt() instanceof DateTime && $this->createdAt() > $this->updatedAt()) {
            throw InvalidSharedException::invalidAudit(sprintf(
                'Travelling backward in time or what?. Updated <%s> greater than Created <%s>',
                DateFormat::render($this->createdAt()),
                DateFormat::render($this->updatedAt()),
            ));
        }
    }

    public function asArray(): array
    {
        return [
            'created_at' => DateFormat::render($this->createdAt()),
            'updated_at' => null !== $this->updatedAt() ? DateFormat::render($this->updatedAt()) : null,
        ];
    }
}