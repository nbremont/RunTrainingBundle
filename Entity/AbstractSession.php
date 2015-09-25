<?php

namespace Nb\RunTrainingBundle\Entity;

abstract class AbstractSession
{
    /**
     * @param string $trainingType
     *
     * @return boolean
     */
    public function hasTrainingType($trainingType) {}
}
