<?php

namespace Nb\RunTrainingBundle\Entity;

class LongSession extends AbstractSession
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
     * @var integer
     */
    private $repeatSplit;

    /**
     * @var integer
     */
    private $durationSplit;

    /**
     * @var integer
     */
    private $frequenceSplit;

    /**
     * @var integer
     */
    private $recoverySplit;

    /**
     * @var array
     */
    private $trainingTypes;

    /**
     * @return integer
     */
    public function getDuration()
    {
	return $this->duration;
    }

    /**
     * @param integer $duration
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
     * @return LongSession
     */
    public function setFrequence($frequence)
    {
	$this->frequence = $frequence;

	return $this;
    }

    /**
     * @reutrn integer
     */
    public function getRepeatSplit()
    {
	return $this->repeatSplit;
    }

    /**
     * @param integer $repeatSplit
     *
     * @return LongSession
     */
    public function setRepeatSplit($repeatSplit)
    {
	$this->repeatSplit = $repeatSplit;

	return $this;
    }

    /**
     * @return integer
     */
    public function getDurationSplit()
    {
	return $this->durationSplit;
    }

    /**
     * @param integer $durationSplit
     *
     * @return LongSession
     */
    public function setDurationSplit($durationSplit)
    {
	$this->durationSplit = $durationSplit;

	return $this;
    }

    /**
     * @return intger
     */
    public function getFrequenceSplit()
    {
	return $this->frequenceSplit;
    }

    /**
     * @param integer $frequenceSplit
     *
     * @return LongSession
     */
    public function setFrequenceSplit($frequenceSplit)
    {
	$this->frequenceSplit = $frequenceSplit;

	return $this;
    }

    /**
     * @return intger
     */
    public function getRecoverySplit()
    {
	return $this->recoverySplit;
    }

    /**
     * @param integer $recoverySplit
     *
     * @return LongSession
     */
    public function setRecoverySplit($recoverySplit)
    {
	$this->recoverySplit = $recoverySplit;

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
     * @return LongSession
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
