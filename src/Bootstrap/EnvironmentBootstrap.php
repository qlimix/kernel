<?php declare(strict_types=1);

namespace Qlimix\Kernel\Bootstrap;

use Qlimix\Kernel\Bootstrap\Environment\LoaderInterface;
use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;
use Throwable;

final class EnvironmentBootstrap implements BootstrapInterface
{
    private LoaderInterface $loader;

    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap(): void
    {
        try {
            $this->loader->load();
        } catch (Throwable $exception) {
            throw new BootstrapException('Failed to bootstrap environment', 0, $exception);
        }
    }
}
