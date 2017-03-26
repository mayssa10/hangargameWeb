<?php

// LogoutListener.php - Change the namespace according to the location of this class in your bundle
namespace EntityBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutListener implements LogoutSuccessHandlerInterface {


    /**
     * Creates a Response object to send upon a successful logout.
     *
     * @param Request $request
     *
     * @return Response never null
     */
    public function onLogoutSuccess(Request $request)
    {
        $referer_url = $request->headers->get('referer');

        $response = new RedirectResponse($referer_url);
        return $response;
    }
}