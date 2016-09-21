<?php

/*
 * This file is part of the `DreadLabs/KunstmaanConfigBundle` project.
 *
 * (c) https://github.com/DreadLabs/KunstmaanConfigBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DreadLabs\KunstmaanConfigBundle\Tests\DependencyInjection\Compiler;

use DreadLabs\KunstmaanConfigBundle\DependencyInjection\Compiler\OverrideMediaFilesystemAdapterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class OverrideMediaFilesystemAdapterPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerBuilder|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $container;

    /**
     * @var Definition|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $definition;

    public function setUp()
    {
        $this->container = $this->getMockBuilder(ContainerBuilder::class)->getMock();
        $this->definition = $this->getMockBuilder(Definition::class)->getMock();
    }

    /**
     * @test
     */
    public function itFetchesTheCurrentDefinition()
    {
        $this->expectDefinition();

        $compilerPass = new OverrideMediaFilesystemAdapterPass();
        $compilerPass->process($this->container);
    }

    protected function expectDefinition()
    {
        $this->container
            ->expects($this->once())
            ->method('getDefinition')
            ->with($this->equalTo('kunstmaan_media.filesystem_adapter'))
            ->willReturn($this->definition);
    }

    /**
     * @test
     */
    public function itReplacesTheFirstArgument()
    {
        $this->expectDefinition();

        $this->container
            ->expects($this->once())
            ->method('getParameter')
            ->with($this->equalTo('dreadlabs_kunstmaan_config.media.filesystem_adapter.path'))
            ->willReturn('app/web');

        $this->definition
            ->expects($this->once())
            ->method('replaceArgument')
            ->with(
                $this->equalTo(0),
                $this->equalTo('app/web')
            );

        $compilerPass = new OverrideMediaFilesystemAdapterPass();
        $compilerPass->process($this->container);
    }
}
