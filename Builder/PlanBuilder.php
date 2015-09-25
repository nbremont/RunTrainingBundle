<?php

namespace Nb\RunTrainingBundle\Builder;

use Nb\RunTrainingBundle\Entity\Plan;
use Nb\RunTrainingBundle\Builder\WeekBuilder;
use Nb\RunTrainingBundle\Manager\TrainingTypeManager;

class PlanBuilder
{
    /**
     * @var WeekBuilder
     */
    private $weekBuilder;

    /**
     * @var TrainingTypeManager
     */
    private $trainingTypeManager;

    /**
     * @param WeekBuilder         $weekBuilder
     * @param TrainingTypeManager $trainingTypeManager
     */
    public function __construct(WeekBuilder $weekBuilder, TrainingTypeManager $trainingTypeManager)
    {
        $this->weekBuilder = $weekBuilder;
        $this->trainingTypeManager = $trainingTypeManager;
    }

    /**
     * @param Plan $plan
     *
     * @return Plan
     */
    public function build(Plan $plan)
    {
        $this->checkTrainingType($plan);

        for ($i = 0; $i < $plan->getNbWeek(); $i++) {
            if (0 == ($i + 1) % 4 && 0 != $i && ($plan->getNbWeek() - 1) != $i) {
                $week = $this->weekBuilder->build('week_recovery', $plan->getTrainingType());
            } else if ($plan->getNbWeek() - 1 == $i && $i != 0) {
                $week = $this->weekBuilder->build('week_last', $plan->getTrainingType());
            } else {
                $week = $this->weekBuilder->build($plan->getWeekType(), $plan->getTrainingType());
            }
            $plan->addWeek($week);
        }

        return $plan;
    }

    /**
     * @param Plan $plan
     */
    private function checkTrainingType(Plan $plan)
    {
        $trainingTypes = $this->trainingTypeManager->findAll();
        if (!in_array($plan->getTrainingType(), $trainingTypes)) {
            throw new \Exception(sprintf(
                '%s is not a valide training type, choosing which %s',
                $plan->getTrainingType(),
                implode(', ', $trainingTypes)
            ));
        }
    }
}
