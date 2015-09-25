<?php

namespace Nb\RunTrainingBundle\Hydrator;

use Nb\RunTrainingBundle\Entity\SplitSession;

Class SplitSessionHydrator implements HydratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(\stdClass $jsonObject)
    {
        $splitSession = new SplitSession();
        $splitSession->setDistance($jsonObject->distance);
        $splitSession->setRepeatSplitBracketStart($jsonObject->repeat_split_bracket_start);
        $splitSession->setRepeatSplitBracketEnd($jsonObject->repeat_split_bracket_end);
        $splitSession->setRepeatSessionStart($jsonObject->repeat_session_start);
        $splitSession->setRepeatSessionEnd($jsonObject->repeat_session_end);
        $splitSession->setSplitRecovery($jsonObject->split_recovery);
        $splitSession->setSessionRecovery($jsonObject->session_recovery);
        $splitSession->setVo2m($jsonObject->vo2m);
        $splitSession->setTrainingTypes($jsonObject->training_type);

        return $splitSession;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'split';
    }
}
