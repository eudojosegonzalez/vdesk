<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
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

         $error = $authenticationUtils->getLastAuthenticationError();

         // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
             'last_username' => $lastUsername,
             'error'         => $error,        
        ]);
    }
}
