<?php

namespace spec\Nb\RunTrainingBundle\Manager;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Nb\RunTrainingBundle\Hydrator\HydratorFactory;
use Nb\RunTrainingBundle\Hydrator\SpecificSessionHydrator;
use Nb\RunTrainingBundle\Hydrator\EnduranceSessionHydrator;
use Nb\RunTrainingBundle\Entity\SpecificSession;
use Nb\RunTrainingBundle\Entity\EnduranceSession;
use Nb\RunTrainingBundle\Manager\SessionManager;

class SessionManagerSpec extends ObjectBehavior
{
    /**
     * @var string
     */
    private $filePath;

    function let(HydratorFactory $hydratorFactory)
    {
        $this->filePath = __DIR__ . '/../../../../Resources/config/types/session.json';
        $this->beConstructedWith($this->filePath, $hydratorFactory);
    }

    function it_should_have_session_loaded()
    {
        $this->load($this->filePath);
    }

    function it_should_have_session_when_find_by_endurance_type(
        HydratorFactory $hydratorFactory,
        EnduranceSessionHydrator $enduranceSessionHydrator,
        EnduranceSession $enduranceSession1,
        EnduranceSession $enduranceSession2
    ) {
        $hydratorFactory->getHydrator('endurance')->willReturn($enduranceSessionHydrator);
        $this->setHydratorFactory($hydratorFactory);

        $enduranceSession1->getDuration()->willReturn(45);
        $enduranceSession1->getFrequence()->willReturn(65);
        $enduranceSession1->getTrainingTypes()->willReturn(array(10, 21, 42));

        $stdSession1 = new \stdClass();
        $stdSession1->duration = 45;
        $stdSession1->frequence = 65;
        $stdSession1->training_type = array(10, 21, 42);

        $enduranceSession2->getDuration()->willReturn(60);
        $enduranceSession2->getFrequence()->willReturn(65);
        $enduranceSession2->getTrainingTypes()->willReturn(array(10, 21, 42));

        $stdSession2 = new \stdClass();
        $stdSession2->duration = 60;
        $stdSession2->frequence = 65;
        $stdSession2->training_type = array(10, 21, 42);

        $enduranceSessionHydrator->hydrate($stdSession1)->willReturn($enduranceSession1);
        $enduranceSessionHydrator->hydrate($stdSession2)->willReturn($enduranceSession2);

        $this->findByType('endurance')->shouldReturn(array(
            $enduranceSession1,
            $enduranceSession2,
        ));
    }

    function it_should_return_available_type()
    {
        $this->getAvailableTypes()->shouldReturn(array(
            'split',
            'specific',
            'long_training',
            'endurance'
        ));
    }
}
