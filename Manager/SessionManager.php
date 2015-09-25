<?php

namespace Nb\RunTrainingBundle\Manager;

use Nb\RunTrainingBundle\Hydrator\HydratorFactory;

class SessionManager extends AbstractManager
{
    /**
     * @var HydratorFactory
     */
    private $hydratorFactory;

    /**
     * @param HydratorFactory $hydratorFactory
     */
    public function setHydratorFactory(HydratorFactory $hydratorFactory)
    {
        $this->hydratorFactory = $hydratorFactory;
    }

    /**
     * @param string $type
     *
     * @return mixed
     */
    public function findByType($type)
    {
        if (!in_array($type, $this->getAvailableTypes())) {
            throw new \Exception(sprintf(
                'Type: %s is not available, choosing which %s',
                $type,
                implode(', ', $this->getAvailableTypes())
            ));
        }

        return $this->hydrateCollection($type, $this->nodes->{$type});
    }

    /**
     * @param string   $type
     * @param stdClass $session
     *
     * @return SessionInterface
     */
    public function hydrate($type, \stdClass $session)
    {
        return $this->hydratorFactory->getHydrator($type)->hydrate($session);
    }

    /**
     * @param string $type
     * @param array  $sessions
     *
     * @return array
     */
    public function hydrateCollection($type, array $sessions)
    {
        $hydratedSessions = array();
        foreach ($sessions as $elem) {
            $hydratedSessions[] = $this->hydrate($type, $elem);
        }

        return $hydratedSessions;
    }
}
