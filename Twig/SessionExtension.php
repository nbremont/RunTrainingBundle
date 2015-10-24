<?php

namespace Nb\RunTrainingBundle\Twig;

use Nb\RunTrainingBundle\Entity\AbstractSession;

class SessionExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environement
     */
    private $twig;

    /**
     * {@inheritDoc}
     */
    public function initRuntime(\Twig_Environment $environment)
    {
        $this->twig = $environment;
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('nb_session_render', array($this, 'render')),
        );
    }

    public function render(AbstractSession $session)
    {
        switch (\get_class($session)) {
        case 'Nb\RunTrainingBundle\Entity\LongSession':
            $template = 'NbRunTrainingBundle:Session:long_session.html.twig';
            break;
        case 'Nb\RunTrainingBundle\Entity\SplitSession':
            $template = 'NbRunTrainingBundle:Session:split_session.html.twig';
            break;
        case 'Nb\RunTrainingBundle\Entity\EnduranceSession':
            $template = 'NbRunTrainingBundle:Session:endurance_session.html.twig';
            break;
        case 'Nb\RunTrainingBundle\Entity\SpecificSession':
            $template = 'NbRunTrainingBundle:Session:specific_session.html.twig';
            break;
        }

        return $this->twig->render($template, array('session' => $session));
    }

    public function getName()
    {
        return 'nb_session_extension';
    }
}
