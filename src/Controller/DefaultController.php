<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // se crear este selector de dashboard para redireccionar a las rutas correspondiente
        if ($this->getUser()) {
            $nivel=$this->getUser()->getNivel();
            switch ($nivel){
                case 100:
                    return $this->redirectToRoute('app_admin_dashboard_index');
                    break;                    
                case 50:
                    return $this->redirectToRoute('app_empresa_index');
                    break;

            }

        }

        // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();

         // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'logo'=>'assets/images/logo_vdesk1.png',
            'last_username' => $lastUsername,
            'error'         => $error,              
        ]);
    }

    #[Route('/no_autorizado', name: 'app_no_autorizado')]
    public function noAutorizado(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('default/no_autorizado.html.twig', [
            'controller_name' => 'DefaultController',
            'logo'=>'assets/images/logo_vdesk1.png', 
            'last_username' => $lastUsername,
            'error'         => $error,                        
        ]);
    }    
}
