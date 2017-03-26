<?php

namespace EntityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
{
    return $this->render('EntityBundle::index2.html.twig');
}
    public function indexBackAction()
    {
        return $this->render('EntityBundle::indexBack.html.twig');
    }
}
