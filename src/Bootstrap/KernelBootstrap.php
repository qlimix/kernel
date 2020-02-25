<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap;

use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;
use Throwable;

final class KernelBootstrap implements BootstrapInterface
{
    /** @var BootstrapInterface[] */
    private array $bootstraps;

    /**
     * @param BootstrapInterface[] $bootstraps
     */
    public function __construct(array $bootstraps)
    {
        $this->bootstraps = $bootstraps;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap(): void
    {
        try {
            foreach ($this->bootstraps as $bootstrap) {
                $bootstrap->bootstrap();
            }
        } catch (Throwable $exception) {
            throw new BootstrapException('Failed to bootstrap', 0, $exception);
        }
    }
}
