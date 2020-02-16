<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap;

use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;
use Throwable;

final class KernelBootstrap implements BootstrapInterface
{
    private Environment\LoaderInterface $envLoader;

    private Dependencies\LoaderInterface $depLoader;

    public function __construct(Environment\LoaderInterface $envLoader, Dependencies\LoaderInterface $depLoader)
    {
        $this->envLoader = $envLoader;
        $this->depLoader = $depLoader;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap(): void
    {
        try {
            $this->envLoader->load();
            $this->depLoader->load();
        } catch (Throwable $exception) {
            throw new BootstrapException('Failed to bootstrap', 0, $exception);
        }
    }
}
