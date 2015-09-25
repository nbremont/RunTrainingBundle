<?php

namespace Nb\RunTrainingBundle\Hydrator;

class HydratorFactory
{
    /**
     * @var HydratorInterface[]
     */
    private $hydratorCollection;


    public function __construct()
    {
        $this->hydratorCollection = array();
    }

    /**
     * @param HydratorInterface $hydrator
     */
    public function addHydrator(HydratorInterface $hydrator, $alias)
    {
        $this->hydratorCollection[$alias] = $hydrator;
    }

    /**
     * @param string $alias
     */
    public function getHydrator($alias)
    {
        if (array_key_exists($alias, $this->hydratorCollection)) {
            return $this->hydratorCollection[$alias];
        }
    }
}