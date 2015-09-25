<?php

namespace Nb\RunTrainingBundle\Hydrator;

use Nb\RunTrainingBundle\Entity\LongSession;

Class LongSessionHydrator implements HydratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(\stdClass $jsonObject)
    {
        $longSession = new LongSession();
        $longSession->setDuration($jsonObject->duration);
        $longSession->setFrequence($jsonObject->frequence);
        $longSession->setRepeatSplit($jsonObject->repeat_split);
        $longSession->setDurationSplit($jsonObject->duration_split);
        $longSession->setFrequenceSplit($jsonObject->frequence_split);
        $longSession->setRecoverySplit($jsonObject->recovery_split);
        $longSession->setTrainingTypes($jsonObject->training_type);

        return $longSession;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'long_training';
    }
}
