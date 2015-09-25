<?php

namespace Nb\RunTrainingBundle\Hydrator;

use Nb\RunTrainingBundle\Entity\SpecificSession;

class SpecificSessionHydrator implements HydratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(\stdClass $jsonObject)
    {
        $specificSession = new SpecificSession();
        $specificSession->setDistance($jsonObject->distance);
        $specificSession->setRepeatSessionStart($jsonObject->repeat_session_start);
        $specificSession->setRepeatSessionEnd($jsonObject->repeat_session_end);
        $specificSession->setSessionRecovery($jsonObject->session_recovery);
        $specificSession->setTrainingTypes($jsonObject->training_type);

        return $specificSession;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'specific';
    }
}
