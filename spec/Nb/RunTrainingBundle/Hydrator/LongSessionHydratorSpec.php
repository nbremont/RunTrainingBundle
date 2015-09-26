<?php

namespace spec\Nb\RunTrainingBundle\Hydrator;

use PhpSpec\ObjectBehavior;

class LongSessionHydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nb\RunTrainingBundle\Hydrator\LongSessionHydrator');
    }

    function it_should_hydrate_long_object_with_json_object()
    {
        $jsonObject = new \stdClass();
        $jsonObject->duration = 80;
        $jsonObject->frequence = 70;
        $jsonObject->repeat_split = 1;
        $jsonObject->duration_split = 1;
        $jsonObject->frequence_split = 85;
        $jsonObject->recovery_split = 3;
        $jsonObject->training_type = array(10, 21, 42);

        $longSession = $this->hydrate($jsonObject);
        $longSession->getDuration()->shouldReturn(80);
        $longSession->getFrequence()->shouldReturn(70);
        $longSession->getRepeatSplit()->shouldReturn(1);
        $longSession->getDurationSplit()->shouldReturn(1);
        $longSession->getFrequenceSplit()->shouldReturn(85);
        $longSession->getRecoverySplit()->shouldReturn(3);
        $longSession->getTrainingTypes()->shouldReturn(array(10, 21, 42));
    }

    function it_should_return_type_long()
    {
        $this->getType()->shouldReturn('long_training');
    }
}
