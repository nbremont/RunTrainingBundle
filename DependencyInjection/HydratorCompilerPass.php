<?php

namespace Nb\RunTrainingBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class HydratorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('nb_run_training.hydrator_factory')) {
            return;
        }

        $definition = $container->getDefinition(
            'nb_run_training.hydrator_factory'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'nb_run_training.hydrator'
        );

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall(
                    'addHydrator',
                    array(new Reference($id), $attributes["alias"])
                );
            }
        }
    }
}