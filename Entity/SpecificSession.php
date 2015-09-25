<?php

namespace Nb\RunTrainingBundle\Entity;

class SpecificSession extends AbstractSession
{
	/**
     * @var integer
     */
    private $distance;

	/**
     * @var integer
     */
    private $repeatSessionStart;

	/**
     * @var integer
     */
    private $repeatSessionEnd;

	/**
     * @var integer
     */
    private $sessionRecovery;

	/**
     * @var array
     */
    private $trainingTypes;

	/**
     * @return integer
     */
    public function getDistance()
	{
        return $this->distance;
	}

	/**
     * @param integer $distance
     *
     * @return SpecificSession
     */
    public function setDistance($distance)
	{
        $this->distance = $distance;

        return $this;
	}

	/**
     * @return integer
     */
    public function getRepeatSessionStart()
	{
        return $this->repeatSessionStart;
	}

	/**
     * @param integer $repeatSessionStart
     *
     * @return SpecificSession
     */
    public function setRepeatSessionStart($repeatSessionStart)
	{
        $this->repeatSessionStart = $repeatSessionStart;

        return $this;
	}

	/**
     * @return integer
     */
    public function getRepeatSessionEnd()
	{
        return $this->repeatSessionEnd;
	}

	/**
     * @param integer $repeatSessionEnd
     *
     * @return SpecificSession
     */
    public function setRepeatSessionEnd($repeatSessionEnd)
	{
        $this->repeatSessionEnd = $repeatSessionEnd;

        return $this;
	}

	/**
     * @return integer
     */
    public function getSessionRecovery()
	{
        return $this->sessionRecovery;
	}

	/**
     * @param integer $sessionRecovery
     *
     * @return SpecificSession
     */
    public function setSessionRecovery($sessionRecovery)
	{
        $this->sessionRecovery = $sessionRecovery;

        return $this;
	}

	/**
     * @return array
     */
    public function getTrainingTypes()
	{
        return $this->trainingTypes;
	}

	/**
     * @param array $trainingTypes
     *
     * @return SpecificSession
     */
    public function setTrainingTypes(array $trainingTypes)
	{
        $this->trainingTypes = $trainingTypes;

        return $this;
	}

    /**
     * @param string $trainingType
     *
     * @return boolean
     */
    public function hasTrainingType($trainingType)
    {
        if (in_array($trainingType, $this->trainingTypes)) {
            return true;
        }

        return false;
    }
}
