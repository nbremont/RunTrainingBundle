<?php

namespace Nb\RunTrainingBundle\Provider;

use Nb\RunTrainingBundle\Entity\AbstractSession;
use Nb\RunTrainingBundle\Manager\WeekTypeManager;
use Nb\RunTrainingBundle\Picker\SessionPicker;

class WeekProvider
{
    /**
     * @var WeekTypeManager
     */
    private $weekTypeManager;

    /**
     * @var SessionPicker
     */
    private $sessionPicker;

    /**
     * @param WeekTypeManager $weekTypeManager
     * @param SessionPicker   $sessionPicker
     */
    public function __construct(WeekTypeManager $weekTypeManager, SessionPicker $sessionPicker)
    {
        $this->sessionPicker = $sessionPicker;
        $this->weekTypeManager = $weekTypeManager;
    }

    /**
     * @param string $weekType
     * @param string $trainingType
     *
     * @return array
     */
    public function getSessionByWeekType($weekType, $trainingType)
    {
        $sessionCollection = array();
        $weekTypeArray = $this->weekTypeManager->findByType($weekType);
        foreach ($weekTypeArray as $type) {
            $session = $this->sessionPicker->pickSession($this->getValue($type), $trainingType);
            if ($session instanceof AbstractSession) {
                $this->addSession($session, $sessionCollection);
            }
        }

        return $sessionCollection;
    }

    /**
     * @param AbstractSession $session
     * @param array           $sessionCollection
     *
     * @return WeekProvider
     */
    public function addSession(AbstractSession $session, array &$sessionCollection)
    {
        $sessionCollection[] = $session;

        return $this;
    }

    /**
     * @param string|array $mixed
     *
     * @return string
     */
    private function getValue($mixed)
    {
        if (is_array($mixed)) {
            return $mixed[round(0,1)];
        } else {
            return $mixed;
        }
    }
}
