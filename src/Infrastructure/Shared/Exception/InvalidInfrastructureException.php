<?php
declare(strict_types=1);

namespace Hexagonal\Infrastructure\Shared\Exception;

use Exception;
use Hexagonal\Domain\Shared\Traits\ExceptionHandler;

abstract class InvalidInfrastructureException extends Exception
{
    use ExceptionHandler;

    protected function __construct(string $name, string $message = '')
    {
        parent::__construct($message);
        $this->name = $name;
    }
}