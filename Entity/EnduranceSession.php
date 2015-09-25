<?php

namespace Nb\RunTrainingBundle\Entity;

class EnduranceSession extends AbstractSession
{
	/**
     * @var integer
     */
    private $duration;

	/**
     * @var integer
     */
    private $frequence;

	/**
     * @var array
     */
    private $trainingTypes;

	/**
     * return integer
     */
    public function getDuration()
	{
        return $this->duration;
	}

	/**
     * @param integer $duration
     *
     * @return EnduranceSession
     */
    public function setDuration($duration)
	{
        $this->duration = $duration;

        return $this;
	}

	/**
     * @return integer
     */
    public function getFrequence()
	{
        return $this->frequence;
	}

	/**
     * @param integer $frequence
     *
     * @return EnduranceSession
     */
    public function setFrequence($frequence)
	{
        $this->frequence = $frequence;

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
     * @return Endurance
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
