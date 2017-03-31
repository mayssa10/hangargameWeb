<?php

namespace Frontend\ProduitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendProduitBundle:Default:index.html.twig');
    }
}
