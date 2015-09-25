<?php

namespace Nb\RunTrainingBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class NbRunTrainingExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('hydrator.xml');

        $this->initializeParamters($config, $container);
    }

    /**
     * @param array $config
     * @param ContainerBuilder $container
     */
    protected function initializeParamters(array $config, ContainerBuilder $container)
    {
        $container->setParameter('nb_run_training', $config);
        $container->setParameter('nb_run_training.session', $config['session']);
        $container->setParameter('nb_run_training.week', $config['week']);
        $container->setParameter('nb_run_training.training', $config['training']);
    }
}
