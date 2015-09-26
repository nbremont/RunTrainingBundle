<?php

namespace spec\Nb\RunTrainingBundle\Hydrator;

use PhpSpec\ObjectBehavior;

class EnduranceSessionHydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nb\RunTrainingBundle\Hydrator\EnduranceSessionHydrator');
    }

    function it_should_hydrate_endurance_object_with_json_object()
    {
        $jsonObject = new \stdClass();
        $jsonObject->duration = 45;
        $jsonObject->frequence = 65;
        $jsonObject->training_type = array(10, 21, 42);

        $enduranceSession = $this->hydrate($jsonObject);
        $enduranceSession->getDuration()->shouldReturn(45);
        $enduranceSession->getFrequence()->shouldReturn(65);
        $enduranceSession->getTrainingTypes()->shouldReturn(array(10, 21, 42));
    }

    function it_should_return_type_endurance()
    {
        $this->getType()->shouldReturn('endurance');
    }
}
