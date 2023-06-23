<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Collection;

use Hexagonal\Domain\Shared\Exception\InvalidDomainException;

class InvalidCollectionException extends InvalidDomainException
{
    private const INVALID_TYPE_COLLECTION = 'invalid_type_collection';

    public static function invalidCollectionType(string $message = ''): self
    {
        return new self(self::INVALID_TYPE_COLLECTION, $message);
    }
}