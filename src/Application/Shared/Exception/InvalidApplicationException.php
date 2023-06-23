<?php
declare(strict_types = 1);

namespace Hexagonal\Application\Shared\Exception;

use Exception;
use Hexagonal\Domain\Shared\Traits\ExceptionHandler;

abstract class InvalidApplicationException extends Exception
{
    use ExceptionHandler;

    protected final function __construct(string $name, string $message = '')
    {
        parent::__construct($message);
        $this->name = $name;
    }
}