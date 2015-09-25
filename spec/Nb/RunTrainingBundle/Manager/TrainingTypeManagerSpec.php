<?php

namespace spec\Nb\RunTrainingBundle\Manager;

use PhpSpec\ObjectBehavior;

class TrainingTypeManagerSpec extends ObjectBehavior
{
    /**
     * @var string
     */
    private $filePath;

    function let()
    {
        $this->filePath = __DIR__ . '/../../../../Resources/config/types/training_type.json';

        $this->beConstructedWith($this->filePath);
    }

    function it_should_be_load_with_training_type_data()
    {
        $this->load($this->filePath);
    }

    function it_should_get_training_types()
    {
        $this->findAll()->shouldReturn(array(
            10, 21, 42
        ));
    }
}
