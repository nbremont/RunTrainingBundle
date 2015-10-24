<?php

namespace Nb\RunTrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Nb\RunTrainingBundle\Entity\Plan;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $plan = new Plan();
        $plan->setName('test');
        $plan->setTrainingType('10');
        $plan->setNbWeek(8);
        $plan->setWeekType('week_3');

        $builtPlan = $this
            ->get('nb_run_training.builder.plan')
            ->build($plan)
            ;

        return $this->render('NbRunTrainingBundle:Default:index.html.twig', array(
            'plan' => $builtPlan,
        ));
    }
}
