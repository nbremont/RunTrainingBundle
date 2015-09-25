<?php

namespace spec\Nb\RunTrainingBundle\Picker;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Nb\RunTrainingBundle\Manager\SessionManager;
use Nb\RunTrainingBundle\Entity\EnduranceSession;

class SessionPickerSpec extends ObjectBehavior
{
    function let(SessionManager $sessionManager)
    {
        $this->beConstructedWith($sessionManager);
    }

    function it_should_get_endurance_session_for_half_m(
        SessionManager $sessionManager,
        EnduranceSession $enduranceSession1,
        EnduranceSession $enduranceSession2
    ) {
        $enduranceSession1->hasTrainingType(21)->willReturn(true);
        $enduranceSession2->hasTrainingType(21)->willReturn(false);

        $sessionManager->findByType('endurance')->willReturn(array(
            $enduranceSession1,
            $enduranceSession2
        ));

        $this->pickSession('endurance', 21)->shouldReturn(
            $enduranceSession1
        );
    }
}
