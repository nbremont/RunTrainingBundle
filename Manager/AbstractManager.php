<?php

namespace Nb\RunTrainingBundle\Manager;

abstract class AbstractManager
{
    /**
     * @var array
     */
    protected $nodes;

    /**
     * @param string $pathFile
     */
    public function __construct($pathFile)
    {
        $this->load($pathFile);
    }

    /**
     * @param string $pathFile
     */
    public function load($pathFile)
    {
        $this->nodes = json_decode(file_get_contents($pathFile));
    }

    /**
     * @param string $type
     */
    public function findByType($type)
    {
        if (!\property_exists($this->nodes, $type)) {
            throw new \Exception(sprintf(
                'Type: %s is not available, choosing which %s',
                $type,
                implode(', ', $this->getAvailableTypes())
            ));
        }

        return $this->nodes->$type;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->nodes;
    }

    /**
     * @return array
     */
    public function getAvailableTypes()
    {
        $types = array();
        foreach ($this->nodes as $attribute => $value) {
            $types[] = $attribute;
        }

        return $types;
    }
}
