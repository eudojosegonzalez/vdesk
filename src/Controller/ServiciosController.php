<?php

namespace App\Controller;

use App\Entity\Servicios;
use App\Form\ServiciosType;

use App\Entity\MetodoPago;
use App\Repository\ServiciosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use DateTimeInterface;
use DateTime;

#[IsGranted('ROLE_ADMIN')] 
#[Route('/servicios')]
final class ServiciosController extends AbstractController
{

    #[Route(name: 'app_servicios_index', methods: ['GET'])]
    public function index(ServiciosRepository $serviciosRepository): Response
    {
        return $this->render('servicios/index.html.twig', [
            'servicios' => $serviciosRepository->findAll(),
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/new', name: 'app_servicios_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        
        $metodosRepository = $entityManager->getRepository(MetodoPago::class);
        $metodosDisponibles = $metodosRepository->findAll();        
        
        $servicio = new Servicios();
        $form = $this->createForm(
            ServiciosType::class, 
            $servicio,[
                'metodos_disponibles' => $metodosDisponibles,
            ]);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            // tomamos del foprmulario lo que se selecciono como metodo de pago
            $selectedMetodoIds = $form->get('metodos_pago')->getData();
            dd ($selectedMetodoIds );

            $servicio->setMetodosPago($selectedMetodoIds);
            $entityManager->persist($servicio);
            $entityManager->flush();

            //return $this->redirectToRoute('app_servicios_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('servicios/new.html.twig', [
            'servicio' => $servicio,
            'form' => $form,
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/{id}', name: 'app_servicios_show', methods: ['GET'])]
    public function show(Servicios $servicio): Response
    {
        return $this->render('servicios/show.html.twig', [
            'servicio' => $servicio,
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_servicios_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Servicios $servicio, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServiciosType::class, $servicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_servicios_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('servicios/edit.html.twig', [
            'servicio' => $servicio,
            'form' => $form,
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/{id}', name: 'app_servicios_delete', methods: ['POST'])]
    public function delete(Request $request, Servicios $servicio, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicio->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($servicio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_servicios_index', [], Response::HTTP_SEE_OTHER);
    }
}
