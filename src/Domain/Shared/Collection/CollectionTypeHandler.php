<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Collection;

use ArrayIterator;

trait CollectionTypeHandler
{
    final private function __construct(private array $items) {}

    /** @throws InvalidCollectionException */
    public static function create(array $items): self
    {
        foreach ($items as &$item) {
            $item = is_array($item) ?  array_values($item)[0] : $item;
            self::checkType(self::type(), $item);
        }

        return new self($items);
    }

    public function items(): array
    {
        return $this->items;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items());
    }

    public function count(): int
    {
        return count($this->items());
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    /** @inheritDoc */
    public function addItem(object $item): self
    {
        self::checkType(self::type(), $item);
        $this->items[] = $item;
        return $this;
    }

    /** @inheritDoc */
    public static function checkType(string $type, object $item): void
    {
        if (!($item instanceof $type)) {
            throw InvalidCollectionException::invalidCollectionType(
                sprintf('Object given <%s> is not same as <%s>', $type, get_class($item))
            );
        }
    }
}