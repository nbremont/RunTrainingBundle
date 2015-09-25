<?php

namespace spec\Nb\RunTrainingBundle\Builder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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
        WeekProvider $weekProvider
    ) {
        $weekProvider->getSessionByWeekType('week_3', 10)->willReturn(array(
            $session,
         ));

        $this->build('week_3', 10)
             ->shouldReturnAnInstanceOf('Nb\RunTrainingBundle\Entity\Week')
            ;
    }
}
