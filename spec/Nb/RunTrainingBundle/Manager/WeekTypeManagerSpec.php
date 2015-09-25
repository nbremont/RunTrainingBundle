<?php

namespace spec\Nb\RunTrainingBundle\Manager;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WeekTypeManagerSpec extends ObjectBehavior
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var array
     */
    private $availableType;

    function let()
    {
        $this->filePath = __DIR__ . '/../../../../Resources/config/types/week_type.json';
        $this->availableType = array(
            'week_2',
            'week_3',
            'week_4',
            'week_5',
            'week_6',
            'week_7',
            'week_recovery',
            'week_last',
        );

        $this->beConstructedWith($this->filePath);
    }

    function it_should_return_exception_when_find_by_wrong_type()
    {
        $this->shouldThrow(new \Exception(sprintf(
                'Type: %s is not available, choosing which %s',
                'week_11',
                implode(', ', $this->availableType)
        )))->during('findByType', array('week_11'));
    }

    function it_should_have_week_when_find_by_weekz3_type()
    {
        $this->findByType('week_3')->shouldReturn(array(
            'endurance',
            'endurance',
            'long_training'
        ));
    }

    function it_should_get_available_type()
    {
        $this->getAvailableTypes()->shouldReturn($this->availableType);
    }
}
