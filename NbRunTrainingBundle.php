<?php

namespace Nb\RunTrainingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Nb\RunTrainingBundle\DependencyInjection\HydratorCompilerPass;

class NbRunTrainingBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new HydratorCompilerPass());
    }
}
