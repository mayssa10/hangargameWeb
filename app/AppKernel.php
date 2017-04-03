<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new EntityBundle\EntityBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Frontend\StoreBundle\FrontendStoreBundle(),
            new Backend\StoreBundle\BackendStoreBundle(),
            new Backend\ActualiteBundle\BackendActualiteBundle(),
            new Frontend\ProduitBundle\FrontendProduitBundle(),
            new Frontend\EvenementBundle\FrontendEvenementBundle(),
            new Backend\EvenementBundle\BackendEvenementBundle(),
            new Nomaya\SocialBundle\NomayaSocialBundle(),
<<<<<<< HEAD
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Backend\ConsoleBundle\BackendConsoleBundle(),
=======
            new Vich\UploaderBundle\VichUploaderBundle(),
            new Frontend\TournoiBundle\FrontendTournoiBundle(),
>>>>>>> f8ec01f785fc4ab66ec77d7cea01be1696731d83
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }

}
