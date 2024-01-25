<?php

namespace App\Controller;

use App\Entity\Announcements;
use App\Form\AnnouncementsType;
use App\Repository\AnnouncementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/announcements')]
class AnnouncementsController extends AbstractController
{
    #[Route('/', name: 'app_announcements_index', methods: ['GET'])]
    public function index(AnnouncementsRepository $announcementsRepository): Response
    {
        return $this->render('announcements/index.html.twig', [
            'announcements' => $announcementsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_announcements_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $announcement = new Announcements();
        $form = $this->createForm(AnnouncementsType::class, $announcement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($announcement);
            $entityManager->flush();

            return $this->redirectToRoute('app_announcements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('announcements/new.html.twig', [
            'announcement' => $announcement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_announcements_show', methods: ['GET'])]
    public function show(Announcements $announcement): Response
    {
        return $this->render('announcements/show.html.twig', [
            'announcement' => $announcement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_announcements_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Announcements $announcement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnnouncementsType::class, $announcement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_announcements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('announcements/edit.html.twig', [
            'announcement' => $announcement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_announcements_delete', methods: ['POST'])]
    public function delete(Request $request, Announcements $announcement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$announcement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($announcement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_announcements_index', [], Response::HTTP_SEE_OTHER);
    }
}
