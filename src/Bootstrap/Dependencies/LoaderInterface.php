<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap\Dependencies;

use Qlimix\Kernel\Bootstrap\Dependencies\Exception\LoaderException;

interface LoaderInterface
{
    /**
     * @throws LoaderException
     */
    public function load(): void;
}
