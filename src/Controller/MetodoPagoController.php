<?php

namespace App\Controller;

use App\Entity\MetodoPago;
use App\Form\MetodoPagoType;
use App\Repository\MetodoPagoRepository;
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
#[Route('/metodo_pago')]
final class MetodoPagoController extends AbstractController
{
    #[Route(name: 'app_metodo_pago_index', methods: ['GET'])]
    public function index(MetodoPagoRepository $metodoPagoRepository): Response
    {
        return $this->render('metodo_pago/index.html.twig', [
            'metodo_pagos' => $metodoPagoRepository->findAll(),
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/new', name: 'app_metodo_pago_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $metodoPago = new MetodoPago();
        $form = $this->createForm(MetodoPagoType::class, $metodoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($metodoPago);
            $entityManager->flush();

            return $this->redirectToRoute('app_metodo_pago_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('metodo_pago/new.html.twig', [
            'metodo_pago' => $metodoPago,
            'logo'=>'assets/images/logo_vdesk1.png',
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metodo_pago_show', methods: ['GET'])]
    public function show(MetodoPago $metodoPago): Response
    {
        return $this->render('metodo_pago/show.html.twig', [
            'metodo_pago' => $metodoPago,
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_metodo_pago_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MetodoPago $metodoPago, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MetodoPagoType::class, $metodoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_metodo_pago_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('metodo_pago/edit.html.twig', [
            'metodo_pago' => $metodoPago,
            'form' => $form,
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[Route('/{id}', name: 'app_metodo_pago_delete', methods: ['POST'])]
    public function delete(Request $request, MetodoPago $metodoPago, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$metodoPago->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($metodoPago);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_metodo_pago_index', [], Response::HTTP_SEE_OTHER);
    }
}
