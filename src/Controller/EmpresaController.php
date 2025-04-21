<?php

namespace App\Controller;

use App\Entity\User;

use App\Entity\Empresa;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use DateTimeInterface;
use DateTime;


#[Route('/Empresa')]
final class EmpresaController extends AbstractController
{
    #[IsGranted('ROLE_USER')] 
    #[Route("/",name: 'app_empresa_index', methods: ['GET'])]
    public function index(EmpresaRepository $empresaRepository,AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $nivel=$this->getUser()->getNivel();
            if ($nivel != 50){
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

        return $this->render('empresa/index.html.twig', [
            'empresas' => $empresaRepository->findAll(),
            'logo'=>'assets/images/logo_vdesk1.png',
            'mes'=>$mest." - ".$year,
        ]);

    }

    #[IsGranted('ROLE_ADMIN')] 
    #[Route("/list",name: 'app_empresa_list', methods: ['GET'])]
    public function list(EmpresaRepository $empresaRepository,AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $nivel=$this->getUser()->getNivel();
            if ($nivel != 100){
                return $this->redirectToRoute('app_no_autorizado');
            }

        }        
        $empresas=$empresaRepository->findAll();

        return $this->render('empresa/list.html.twig', [
            'empresas' => $empresaRepository->findAll(),
            'logo'=>'assets/images/logo_vdesk1.png',
            'empresas'=>$empresas
        ]);
    }

    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/new', name: 'app_empresa_new', methods: ['GET', 'POST'])]
    // #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()) {
            $nivel=$this->getUser()->getNivel();
            if ($nivel != 100){
                return $this->redirectToRoute('app_no_autorizado');
            }

        }              
        $empresa = new Empresa();
        $form = $this->createForm(EmpresaType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($empresa);
            $entityManager->flush();

            return $this->redirectToRoute('app_empresa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('empresa/new.html.twig', [
            'empresa' => $empresa,
            'form' => $form,
            'logo'=>'assets/images/logo_vdesk1.png'
        ]);
    }

    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/{id}', name: 'app_empresa_show', methods: ['GET'])]
    // #[IsGranted('ROLE_ADMIN')]
    public function show(Empresa $empresa): Response
    {
        return $this->render('empresa/show.html.twig', [
            'empresa' => $empresa,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/{id}/edit', name: 'app_empresa_edit', methods: ['GET', 'POST'])]
    // #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Empresa $empresa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmpresaType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_empresa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('empresa/edit.html.twig', [
            'empresa' => $empresa,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/{id}', name: 'app_empresa_delete', methods: ['POST'])]
    // #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Empresa $empresa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$empresa->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($empresa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_empresa_index', [], Response::HTTP_SEE_OTHER);
    }
}
