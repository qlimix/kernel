<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap\Environment;

use Qlimix\Kernel\Bootstrap\Environment\Exception\LoaderException;

interface LoaderInterface
{
    /**
     * @throws LoaderException
     */
    public function load(): void;
}
