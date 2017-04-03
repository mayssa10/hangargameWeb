<?php

namespace Backend\ConsoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendConsoleBundle:Default:index.html.twig');
    }
}
