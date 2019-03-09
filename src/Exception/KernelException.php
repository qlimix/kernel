<?php declare(strict_types=1);

namespace Qlimix\Kernel\Exception;

use Exception;
use Throwable;

final class KernelException extends Exception
{
    public function __construct(?Throwable $previous = null)
    {
        parent::__construct('', 0, $previous);
    }
}
