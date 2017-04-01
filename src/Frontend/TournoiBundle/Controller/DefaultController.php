<?php

namespace Frontend\TournoiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendTournoiBundle:Default:index.html.twig');
    }
}
