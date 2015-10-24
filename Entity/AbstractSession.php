<?php

namespace Nb\RunTrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class AbstractSession
{
    /**
     * @param string $trainingType
     *
     * @return boolean
     */
    protected function hasTrainingType($trainingType) {}
}
