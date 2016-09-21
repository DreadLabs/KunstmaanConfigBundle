<?php

/*
 * This file is part of the `DreadLabs/KunstmaanConfigBundle` project.
 *
 * (c) https://github.com/DreadLabs/KunstmaanConfigBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DreadLabs\KunstmaanConfigBundle;

use DreadLabs\KunstmaanConfigBundle\DependencyInjection\Compiler\OverrideMediaFilesystemAdapterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DreadLabsKunstmaanConfigBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new OverrideMediaFilesystemAdapterPass());
    }
}
