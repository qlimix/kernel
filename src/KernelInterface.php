<?php declare(strict_types=1);

namespace Qlimix\Kernel;

use Qlimix\Kernel\Exception\KernelException;

interface KernelInterface
{
    /**
     * @throws KernelException
     */
    public function run(): void;
}
