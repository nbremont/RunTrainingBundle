<?php

namespace spec\Nb\RunTrainingBundle\Builder;

use PhpSpec\ObjectBehavior;
use Nb\RunTrainingBundle\Builder\WeekBuilder;
use Nb\RunTrainingBundle\Entity\AbstractSession;
use Nb\RunTrainingBundle\Entity\Plan;
use Nb\RunTrainingBundle\Entity\Week;
use Nb\RunTrainingBundle\Manager\TrainingTypeManager;

class PlanBuilderSpec extends ObjectBehavior
{
    function let(WeekBuilder $weekBuilder, TrainingTypeManager $trainingTypeManager)
    {
        $this->beConstructedWith($weekBuilder, $trainingTypeManager);
    }

    function it_build_a_plan(
        Plan $plan,
        TrainingTypeManager $trainingTypeManager,
        WeekBuilder $weekBuilder,
        Week $week,
        AbstractSession $session
    ) {

        $plan->getTrainingType()->willReturn(10);
        $plan->getNbWeek()->willReturn(1);
        $plan->getWeekType()->willReturn('week_3');

        $week->getSessions()->willReturn(array(
            $session
        ));

        $weekBuilder->build('week_3', 10)->willReturn($week);

        $plan->addWeek($week)->shouldBeCalled();

        $trainingTypeManager->findAll()->willReturn(array(
            10, 21, 42
        ));

        $this->build($plan);
    }
}
