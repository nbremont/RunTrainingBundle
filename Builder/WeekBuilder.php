<?php

namespace Nb\RunTrainingBundle\Builder;

use Nb\RunTrainingBundle\Entity\Week;
use Nb\RunTrainingBundle\Provider\WeekProvider;
use Nb\RunTrainingBundle\Entity\AbstractSession;

class WeekBuilder
{
    /**
     * @var WeekProvider
     */
    private $weekProvider;

    /**
     * @param WeekProvider $weekProvider
     */
    public function __construct(WeekProvider $weekProvider)
    {
        $this->weekProvider = $weekProvider;
    }

    /**
     * @param string $type
     * @param string $trainingType
     *
     * @return Week
     */
    public function build($type, $trainingType)
    {
        $week = new Week();
        $sessions = $this
            ->weekProvider
            ->getSessionByWeekType($type, $trainingType)
            ;

        foreach ($sessions as $session) {
            if ($session instanceof AbstractSession) {
                $week->addSession($session);
            }
        }

        return $week;
    }
}
