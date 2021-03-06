<?php

namespace spec\Nb\RunTrainingBundle\Builder;

use PhpSpec\ObjectBehavior;
use Nb\RunTrainingBundle\Entity\AbstractSession;
use Nb\RunTrainingBundle\Entity\Week;
use Nb\RunTrainingBundle\Provider\WeekProvider;

class WeekBuilderSpec extends ObjectBehavior
{
    function let(WeekProvider $weekProvider)
    {
        $this->beConstructedWith($weekProvider);
    }

    function it_build_a_week(
        AbstractSession $session,
        WeekProvider $weekProvider,
        AbstractSession $session
    ) {
        $weekProvider->getSessionByWeekType('week_3', 10)->willReturn(array(
            $session,
         ));

        $week = $this->build('week_3', 10);
        $week->getSessions()->shouldReturn(array(
            $session
        ));
    }
}
