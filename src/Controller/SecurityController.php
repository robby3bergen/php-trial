<?php
/**
 * Created by PhpStorm.
 * User: robby
 * Date: 11-2-2019
 * Time: 16:28
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inloggen", name="login")
     */

    public function login(Request $request, AuthenticationUtils $authenticationUtils) {
        // if user is already logged in, there is no need to show the login form
        if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $url = $request->headers->get('referer');
            if ($url !== null) {
                return $this->redirect($request->headers->get('referer'));
            }
            return $this->redirectToRoute('homepage');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // get last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['error' => $error, 'last_username' => $lastUsername]);
    }

    /**
     * @Route("/uitloggen", name="logout")
     */

    public function logout() {
        // no controller needed for this route
        # return $this->render('home.html.twig');
    }
}