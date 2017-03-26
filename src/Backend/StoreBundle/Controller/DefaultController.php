<?php

namespace Backend\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendStoreBundle:Default:index.html.twig');
    }
}
