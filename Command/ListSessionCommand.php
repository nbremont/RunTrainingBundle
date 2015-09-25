<?php

namespace Nb\RunTrainingBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Nb\RunTrainingBundle\Entity\Plan;

Class ListSessionCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('run:session:list')
            ->setDescription('list all session')
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'Name of plan'
            )
            ->addArgument(
                'training_type',
                InputArgument::OPTIONAL,
                'Training Type of plan',
                '10'
            )
            ->addArgument(
                'type',
                InputArgument::OPTIONAL,
                'Type of week',
                'week_3'
            )
            ->addArgument(
                'nb_week',
                InputArgument::OPTIONAL,
                'number of week',
                '8'
            )
            ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $trainingType = $input->getArgument('training_type');
        $type = $input->getArgument('type');
        $nbWeek = $input->getArgument('nb_week');

        $plan = new Plan();
        $plan->setName($name);
        $plan->setTrainingType($trainingType);
        $plan->setNbWeek($nbWeek);
        $plan->setWeekType($type);

        $planBuilt = $this
            ->getContainer()
            ->get('nb_run_training.builder.plan')
            ->build($plan)
            ;

        dump($planBuilt);
    }
}
