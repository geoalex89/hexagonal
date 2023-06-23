<?php
declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Collection;

use ArrayIterator;

interface CollectionTypeInterface
{
    public static function create(array $items): self;
    public static function type(): string;
    public function items(): array;
    public function getIterator(): ArrayIterator;
    public function count(): int;
    public function isEmpty(): bool;

    /** @throws InvalidCollectionException */
    public function addItem(object $item): self;

    /** @throws InvalidCollectionException */
    public static function checkType(string $type, object $item): void;
}