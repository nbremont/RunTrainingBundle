<?php

namespace Nb\RunTrainingBundle\Entity;

class Week
{
    /**
     * @var AbstractSession[]
     */
    private $sessions;

    /**
     * Constructor init session array
     */
    public function __construct()
    {
        $this->sessions = array();
    }

    /**
     * @param AbstractSession $session
     */
    public function addSession(AbstractSession $session)
    {
        $this->sessions[] = $session;
    }

    /**
     * @return AbstractSession[]
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}
