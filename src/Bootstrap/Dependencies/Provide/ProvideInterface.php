<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap\Dependencies\Provide;

use Qlimix\Kernel\Bootstrap\Dependencies\Provide\Exception\ProvideException;

interface ProvideInterface
{
    /**
     * @throws ProvideException
     */
    public function provide(): void;
}
