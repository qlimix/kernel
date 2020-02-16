<?php declare(strict_types=1);

namespace Qlimix\Tests\Kernel\Http;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;
use Qlimix\Kernel\Bootstrap\KernelBootstrap;
use Qlimix\Kernel\Bootstrap\Dependencies\Exception\LoaderException as DepLoaderException;
use Qlimix\Kernel\Bootstrap\Dependencies\LoaderInterface as DepLoaderInterface;
use Qlimix\Kernel\Bootstrap\Environment\Exception\LoaderException as EnvLoaderException;
use Qlimix\Kernel\Bootstrap\Environment\LoaderInterface as EnvLoaderInterface;

final class KernelBootStrapTest extends TestCase
{
    private MockObject $envLoader;

    private MockObject $depLoader;

    private KernelBootstrap $bootstrap;

    protected function setUp(): void
    {
        $this->envLoader = $this->createMock(EnvLoaderInterface::class);
        $this->depLoader = $this->createMock(DepLoaderInterface::class);

        $this->bootstrap = new KernelBootstrap($this->envLoader, $this->depLoader);
    }

    /**
     * @test
     */
    public function shouldBootstrap(): void
    {
        $this->envLoader->expects($this->once())
            ->method('load');

        $this->depLoader->expects($this->once())
            ->method('load');

        $this->bootstrap->bootstrap();
    }

    /**
     * @test
     */
    public function shouldFailOnEnvLoaderFailure(): void
    {
        $this->envLoader->expects($this->once())
            ->method('load')
            ->willThrowException(new EnvLoaderException());

        $this->depLoader->expects($this->never())
            ->method('load');

        $this->expectException(BootstrapException::class);

        $this->bootstrap->bootstrap();
    }

    /**
     * @test
     */
    public function shouldFailOnDepLoaderFailure(): void
    {
        $this->envLoader->expects($this->once())
            ->method('load');

        $this->depLoader->expects($this->once())
            ->method('load')
            ->willThrowException(new DepLoaderException());

        $this->expectException(BootstrapException::class);

        $this->bootstrap->bootstrap();
    }
}
