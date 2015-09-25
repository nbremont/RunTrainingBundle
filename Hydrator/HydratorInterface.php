<?php

namespace Nb\RunTrainingBundle\Hydrator;

use Nb\RunTrainingBundle\Entity\AbstractSession;

interface HydratorInterface
{
    /**
     * @param \stdClass $jsonObject
     *
     * @return AbstractSession
     */
    public function hydrate(\stdClass $jsonObject);

    /**
     * @return string
     */
    public function getType();
}