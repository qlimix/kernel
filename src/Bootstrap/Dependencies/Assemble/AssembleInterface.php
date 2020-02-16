<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap\Dependencies\Assemble;

use Qlimix\Kernel\Bootstrap\Dependencies\Assemble\Exception\AssembleException;

interface AssembleInterface
{
    /**
     * @throws AssembleException
     */
    public function assemble(): void;
}
