<?php

namespace Frontend\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendStoreBundle:Default:index.html.twig');
    }
    public function AjouterStoreAction()
    {
        return $this->render('FrontendStoreBundle::ajouterStore.html.twig');
    }
}
