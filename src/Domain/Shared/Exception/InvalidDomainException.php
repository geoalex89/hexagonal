<?php

declare(strict_types=1);

namespace Hexagonal\Domain\Shared\Exception;

use Hexagonal\Domain\Shared\Traits\ExceptionHandler;
use Exception;

abstract class InvalidDomainException extends Exception
{
    use ExceptionHandler;

    protected final function __construct(string $name, string $message = '')
    {
        parent::__construct($message);
        $this->name = $name;
    }
}