<?php declare(strict_types=1);

namespace Bootstrap;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Qlimix\Kernel\Bootstrap\Dependencies\LoaderInterface;
use Qlimix\Kernel\Bootstrap\DependencyBootstrap;
use Qlimix\Kernel\Bootstrap\Environment\Exception\LoaderException as EnvLoaderException;
use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;

final class DependencyBootstrapTest extends TestCase
{
    private MockObject $loader;

    private DependencyBootstrap $bootstrap;

    protected function setUp(): void
    {
        $this->loader = $this->createMock(LoaderInterface::class);

        $this->bootstrap = new DependencyBootstrap($this->loader);
    }

    /**
     * @test
     */
    public function shouldBootstrap(): void
    {
        $this->loader->expects($this->once())
            ->method('load');

        $this->bootstrap->bootstrap();
    }

    /**
     * @test
     */
    public function shouldFailOnBootstrapFailure(): void
    {
        $this->loader->expects($this->once())
            ->method('load')
            ->willThrowException(new EnvLoaderException());

        $this->expectException(BootstrapException::class);

        $this->bootstrap->bootstrap();
    }
}
