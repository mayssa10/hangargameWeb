<?php

namespace Frontend\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendStoreBundle:Default:index.html.twig');
    }

}
