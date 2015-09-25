<?php

namespace Nb\RunTrainingBundle\Entity;

class SplitSession extends AbstractSession
{
    /**
     * @var integer
     */
    private $distance;

    /**
     * @var integer
     */
    private $repeatSplitBracketStart;

    /**
     * @var integer
     */
    private $repeatSplitBracketEnd;

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
    private $splitRecovery;

    /**
     * @var integer
     */
    private $sessionRecovery;

    /**
     * @var integer
     */
    private $vo2m;

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
     * @return SplitSession
     */
    public function setDistance($distance)
    {
	$this->distance = $distance;

	return $this;
    }

    /**
     * @return integer
     */
    public function getRepeatSplitBracketStart()
    {
	return $this->repeatSplitBracketStart;
    }

    /**
     * @param integer $repeatSplitBracketStart
     *
     * @return SplitSession
     */
    public function setRepeatSplitBracketStart($repeatSplitBracketStart)
    {
	$this->repeatSplitBracketStart = $repeatSplitBracketStart;

	return $this;
    }

    /**
     * @return integer
     */
    public function getRepeatSplitBracketEnd()
    {
	return $this->repeatSplitBracketEnd;
    }

    /**
     * @param integer $repeatSplitBracketEnd
     *
     * @return SplitSession
     */
    public function setRepeatSplitBracketEnd($repeatSplitBracketEnd)
    {
	$this->repeatSplitBracketEnd = $repeatSplitBracketEnd;

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
     * @return SplitSession
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
     * @return SplitSession
     */
    public function setRepeatSessionEnd($repeatSessionEnd)
    {
	$this->repeatSessionEnd = $repeatSessionEnd;

	return $this;
    }

    /**
     * @return integer
     */
    public function getSplitRecovery()
    {
	return $this->splitRecovery;
    }

    /**
     * @param integer $splitRecovery
     *
     * @return SplitSession
     */
    public function setSplitRecovery($splitRecovery)
    {
	$this->splitRecovery = $splitRecovery;

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
     * @return SplitSession
     */
    public function setSessionRecovery($sessionRecovery)
    {
	$this->sessionRecovery = $sessionRecovery;

	return $this;
    }

    /**
     * @return integer
     */
    public function getVo2m()
    {
	return $this->vo2m;
    }

    /**
     * @param integer $vo2m
     *
     * @return SplitSession
     */
    public function setVo2m($vo2m)
    {
	$this->vo2m = $vo2m;

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
     * @return SplitSession
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
	if (in_array($trainingType, $this->trainingTypes))
	{
	    return true;
	}

	return false;
    }
}
