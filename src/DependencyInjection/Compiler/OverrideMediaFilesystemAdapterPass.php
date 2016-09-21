<?php

/*
 * This file is part of the `DreadLabs/KunstmaanConfigBundle` project.
 *
 * (c) https://github.com/DreadLabs/KunstmaanConfigBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DreadLabs\KunstmaanConfigBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OverrideMediaFilesystemAdapterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('kunstmaan_media.filesystem_adapter');
        $definition->replaceArgument(
            0,
            $container->getParameter('dreadlabs_kunstmaan_config.media.filesystem_adapter.path')
        );
    }
}
