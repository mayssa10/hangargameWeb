<?php

namespace Backend\EvenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendEvenementBundle:Default:index.html.twig');
    }
}
