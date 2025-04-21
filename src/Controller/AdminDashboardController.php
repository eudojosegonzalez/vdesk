<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use DateTimeInterface;
use DateTime;

#[IsGranted('ROLE_ADMIN')] 
#[Route('/Admin_Dashboard')]
final class AdminDashboardController extends AbstractController
{
    #[Route('/', name: 'app_admin_dashboard_index', methods: ['GET'])]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $nivel=$this->getUser()->getNivel();
            if ($nivel != 100){
                return $this->redirectToRoute('app_no_autorizado');
            }

        }   
     
        
        $year = date("Y");
        $mes= date("m");
        switch ($mes){
            case "01":
                $mest="Enero";
                break;
            case "02":
                $mest="Febrero";
                break;   
            case "03":
                $mest="Marzo";
                break;
            case "04":
                $mest="Abril";
                break;  
            case "05":
                $mest="Mayo";
                break;
            case "06":
                $mest="Junio";
                break;   
            case "07":
                $mest="Julio";
                break;
            case "08":
                $mest="Agosto";
                break;    
            case "09":
                $mest="Septiembre";
                break;
            case "10":
                $mest="Octubre";
                break;   
            case "11":
                $mest="Noviembre";
                break;
            case "12":
                $mest="Diciembre";
                break;                                                            
        }

        return $this->render('admin_dashboard/index.html.twig', [
            'controller_name' => 'AdminDashboardController',
            'logo'=>'assets/images/logo_vdesk1.png',
            'mes'=>$mest." - ".$year,
        ]);
    }
}
