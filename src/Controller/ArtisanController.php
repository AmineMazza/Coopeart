<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Form\ArtisanType;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/artisan')]
class ArtisanController extends AbstractController
{
    #[Route('/', name: 'app_artisan_index', methods: ['GET'])]
    public function index(ArtisanRepository $artisanRepository): Response
    {
        return $this->render('artisan/index.html.twig', [
            'artisans' => $artisanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_artisan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArtisanRepository $artisanRepository): Response
    {
        $artisan = new Artisan();
        $form = $this->createForm(ArtisanType::class, $artisan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artisanRepository->save($artisan, true);

            return $this->redirectToRoute('app_artisan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('artisan/new.html.twig', [
            'artisan' => $artisan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_artisan_show', methods: ['GET'])]
    public function show(Artisan $artisan): Response
    {
        return $this->render('artisan/show.html.twig', [
            'artisan' => $artisan,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_artisan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Artisan $artisan, ArtisanRepository $artisanRepository): Response
    {
        $form = $this->createForm(ArtisanType::class, $artisan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artisanRepository->save($artisan, true);

            return $this->redirectToRoute('app_artisan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('artisan/edit.html.twig', [
            'artisan' => $artisan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_artisan_delete', methods: ['POST'])]
    public function delete(Request $request, Artisan $artisan, ArtisanRepository $artisanRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artisan->getId(), $request->request->get('_token'))) {
            $artisanRepository->remove($artisan, true);
        }

        return $this->redirectToRoute('app_artisan_index', [], Response::HTTP_SEE_OTHER);
    }
}
