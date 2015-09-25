<?php

namespace Nb\RunTrainingBundle\Picker;

use Nb\RunTrainingBundle\Manager\SessionManager;

class SessionPicker
{
    /**
     * @var SessionManager
     */
    private $sessionManager;

    /**
     * @param SessionManager $manager
     */
    public function __construct(SessionManager $manager)
    {
        $this->sessionManager = $manager;
    }

    /**
     * @param string $type
     * @param string $trainingType
     *
     * @return array
     */
    public function pickSession($type, $trainingType)
    {
        $sessions = $this->sessionManager->findByType($type);
        $sessionsByTrainingType = array();
        foreach ($sessions as $session) {
            if ($session->hasTrainingType($trainingType)) {
                $sessionsByTrainingType[] = $session;
            }
        }

        $rand = rand(0, count($sessionsByTrainingType) - 1);
        if (array_key_exists($rand, $sessionsByTrainingType)) {
            return $sessionsByTrainingType[$rand];
        }

        return array();
    }
}
