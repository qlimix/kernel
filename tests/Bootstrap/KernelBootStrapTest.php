<?php declare(strict_types=1);

namespace Qlimix\Tests\Kernel\Http;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Qlimix\Kernel\Bootstrap\BootstrapInterface;
use Qlimix\Kernel\Bootstrap\Environment\Exception\LoaderException as EnvLoaderException;
use Qlimix\Kernel\Bootstrap\Exception\BootstrapException;
use Qlimix\Kernel\Bootstrap\KernelBootstrap;

final class KernelBootStrapTest extends TestCase
{
    private MockObject $bootstrapMock;

    private KernelBootstrap $bootstrap;

    protected function setUp(): void
    {
        $this->bootstrapMock = $this->createMock(BootstrapInterface::class);

        $this->bootstrap = new KernelBootstrap([$this->bootstrapMock]);
    }

    /**
     * @test
     */
    public function shouldBootstrap(): void
    {
        $this->bootstrapMock->expects($this->once())
            ->method('bootstrap');

        $this->bootstrap->bootstrap();
    }

    /**
     * @test
     */
    public function shouldFailOnBootstrapFailure(): void
    {
        $this->bootstrapMock->expects($this->once())
            ->method('bootstrap')
            ->willThrowException(new EnvLoaderException());

        $this->expectException(BootstrapException::class);

        $this->bootstrap->bootstrap();
    }
}
