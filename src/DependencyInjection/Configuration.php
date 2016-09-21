<?php

/*
 * This file is part of the `DreadLabs/KunstmaanConfigBundle` project.
 *
 * (c) https://github.com/DreadLabs/KunstmaanConfigBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DreadLabs\KunstmaanConfigBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see ({@link
 * http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class})
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dreadlabs_kunstmaan_config');

        $rootNode
            ->children()
                ->arrayNode('media')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('filesystem_adapter')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('path')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                    ->defaultValue('%liipimagine_webroot%%kunstmaan_media.media_path%')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
