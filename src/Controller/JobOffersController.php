<?php

namespace App\Controller;

use App\Entity\JobOffers;
use App\Entity\Empresa;
use App\Form\JobOffersType;
use App\Repository\JobOffersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use DateTimeInterface;
use DateTime;



#[Route('/job_offers')]
final class JobOffersController extends AbstractController
{
    #[IsGranted('ROLE_USER')] 
    #[Route(name: 'app_job_offers_index', methods: ['GET'])]
    public function index(JobOffersRepository $jobOffersRepository): Response
    {
        return $this->render('job_offers/index.html.twig', [
            'job_offers' => $jobOffersRepository->findAll(),
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/admin_list',name: 'app_job_offers_list_admin', methods: ['GET'])]
    public function listAdmin(JobOffersRepository $jobOffersRepository): Response
    {
        return $this->render('job_offers/list.html.twig', [
            'job_offers' => $jobOffersRepository->findAll(),
            'logo'=>'assets/images/logo_vdesk1.png',
        ]);
    }

    #[IsGranted('ROLE_USER')] 
    #[Route('/new', name: 'app_job_offers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jobOffer = new JobOffers();
        $form = $this->createForm(JobOffersType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jobOffer);
            $entityManager->flush();

            return $this->redirectToRoute('app_job_offers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('job_offers/new.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_USER')] 
    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/{id}', name: 'app_job_offers_show', methods: ['GET'])]
    public function show(JobOffers $jobOffer): Response
    {
        return $this->render('job_offers/show.html.twig', [
            'job_offer' => $jobOffer,
        ]);
    }

    #[IsGranted('ROLE_USER')] 
    #[Route('/{id}/edit', name: 'app_job_offers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JobOffers $jobOffer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JobOffersType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_job_offers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('job_offers/edit.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_USER')] 
    #[IsGranted('ROLE_ADMIN')] 
    #[Route('/{id}', name: 'app_job_offers_delete', methods: ['POST'])]
    public function delete(Request $request, JobOffers $jobOffer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobOffer->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($jobOffer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_job_offers_index', [], Response::HTTP_SEE_OTHER);
    }
}
