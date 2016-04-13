<?php

namespace Sayme\GulpRevBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sayme_gulp_rev');

        $rootNode
            ->children()
                ->scalarNode('manifest_path')
                    ->defaultValue('%kernel.root_dir%/Resources/rev-manifest.json')
                ->end()
                ->scalarNode('build_dir')
                    ->defaultValue('build')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
