<?php declare(strict_types=1);

namespace Qlimix\Kernel\Exception;

use Exception;
use Throwable;

final class KernelException extends Exception
{
    public function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
