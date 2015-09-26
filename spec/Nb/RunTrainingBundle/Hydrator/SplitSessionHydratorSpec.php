<?php

namespace spec\Nb\RunTrainingBundle\Hydrator;

use PhpSpec\ObjectBehavior;

class SplitSessionHydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nb\RunTrainingBundle\Hydrator\SplitSessionHydrator');
    }

    function it_should_hydrate_long_object_with_json_object()
    {
        $jsonObject = new \stdClass();
        $jsonObject->distance = 300;
        $jsonObject->repeat_split_bracket_start = 8;
        $jsonObject->repeat_split_bracket_end = 12;
        $jsonObject->repeat_session_start = 1;
        $jsonObject->repeat_session_end = 2;
        $jsonObject->split_recovery = 2;
        $jsonObject->session_recovery = 3;
        $jsonObject->vo2m = 16;
        $jsonObject->training_type = array(10, 21, 42);

        $splitSession = $this->hydrate($jsonObject);
        $splitSession->getDistance()->shouldReturn(300);
        $splitSession->getRepeatSplitBracketStart()->shouldReturn(8);
        $splitSession->getRepeatSplitBracketEnd()->shouldReturn(12);
        $splitSession->getRepeatSessionStart()->shouldReturn(1);
        $splitSession->getRepeatSessionEnd()->shouldReturn(2);
        $splitSession->getSplitRecovery()->shouldReturn(2);
        $splitSession->getSessionRecovery()->shouldReturn(3);
        $splitSession->getVo2m()->shouldReturn(16);
        $splitSession->getTrainingTypes()->shouldReturn(array(10, 21, 42));
    }

    function it_should_return_type_split()
    {
        $this->getType()->shouldReturn('split');
    }
}
