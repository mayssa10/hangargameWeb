<?php

namespace Backend\ActualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendActualiteBundle:Default:index.html.twig');
    }
}
