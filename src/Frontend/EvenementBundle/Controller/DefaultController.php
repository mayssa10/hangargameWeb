<?php

namespace Frontend\EvenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendEvenementBundle:Default:index.html.twig');
    }
}
