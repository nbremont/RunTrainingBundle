<?php

namespace Nb\RunTrainingBundle\Entity;

class Plan
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $nbWeek;

    /**
     * @var string
     */
    private $weekType;

    /**
     * @var Week[]
     */
    private $weeks;

    /**
     * @var string
     */
    private $trainingType;

    /**
     * @return Week[]
     */
    public function getWeeks()
    {
	return $this->weeks;
    }

    /**
     * @param Week
     *
     * @return Plan
     */
    public function addWeek(Week $week)
    {
	$this->weeks[] = $week;

	return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
	return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Plan
     */
    public function setName($name)
    {
	$this->name = $name;

	return $this;
    }

    /**
     * @return integer
     */
    public function getNbWeek()
    {
	return $this->nbWeek;
    }

    /**
     * @param integer $nbWeek
     *
     * @return Plan
     */
    public function setNbWeek($nbWeek)
    {
	$this->nbWeek = $nbWeek;

	return $this;
    }

    /**
     * @return string
     */
    public function getWeekType()
    {
	return $this->weekType;
    }

    /**
     * @param string $weekType
     *
     * @return Plan
     */
    public function setWeekType($weekType)
    {
	$this->weekType = $weekType;

	return $this;
    }

    /**
     * @return string
     */
    public function getTrainingType()
    {
	return $this->trainingType;
    }

    /**
     * @param string $trainingType
     *
     * @return Plan
     */
    public function setTrainingType($trainingType)
    {
	$this->trainingType = $trainingType;

	return $this;
    }
}
