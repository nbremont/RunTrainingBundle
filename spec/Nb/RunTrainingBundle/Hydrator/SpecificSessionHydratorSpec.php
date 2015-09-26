<?php

namespace spec\Nb\RunTrainingBundle\Hydrator;

use PhpSpec\ObjectBehavior;

class SpecificSessionHydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nb\RunTrainingBundle\Hydrator\SpecificSessionHydrator');
    }

    function it_should_hydrate_long_object_with_json_object()
    {
        $jsonObject = new \stdClass();
        $jsonObject->distance = 300;
        $jsonObject->repeat_session_start = 8;
        $jsonObject->repeat_session_end = 12;
        $jsonObject->session_recovery = 2;
        $jsonObject->training_type = array(10, 21, 42);

        $specificSession = $this->hydrate($jsonObject);
        $specificSession->getDistance()->shouldReturn(300);
        $specificSession->getRepeatSessionStart()->shouldReturn(8);
        $specificSession->getRepeatSessionEnd()->shouldReturn(12);
        $specificSession->getSessionRecovery()->shouldReturn(2);
        $specificSession->getTrainingTypes()->shouldReturn(array(10, 21, 42));
    }

    function it_should_return_type_specific()
    {
        $this->getType()->shouldReturn('specific');
    }
}
