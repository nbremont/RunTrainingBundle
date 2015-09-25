<?php

namespace Nb\RunTrainingBundle\Hydrator;

use Nb\RunTrainingBundle\Entity\EnduranceSession;

class EnduranceSessionHydrator implements HydratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(\stdClass $jsonObject)
    {
        $enduranceSession = new EnduranceSession();
        $enduranceSession->setDuration($jsonObject->duration);
        $enduranceSession->setFrequence($jsonObject->frequence);
        $enduranceSession->setTrainingTypes($jsonObject->training_type);

        return $enduranceSession;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'endurance';
    }
}
