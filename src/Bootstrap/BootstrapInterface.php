<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap;

use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;

interface BootstrapInterface
{
    /**
     * @throws BootstrapException
     */
    public function bootstrap(): void;
}
