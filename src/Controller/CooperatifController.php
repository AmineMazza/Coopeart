<?php

namespace App\Controller;

use App\Entity\Cooperatif;
use App\Form\CooperatifType;
use App\Repository\CooperatifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cooperatif')]
class CooperatifController extends AbstractController
{
    #[Route('/', name: 'app_cooperatif_index', methods: ['GET'])]
    public function index(CooperatifRepository $cooperatifRepository): Response
    {
        return $this->render('cooperatif/index.html.twig', [
            'cooperatifs' => $cooperatifRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cooperatif_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CooperatifRepository $cooperatifRepository): Response
    {
        $cooperatif = new Cooperatif();
        $form = $this->createForm(CooperatifType::class, $cooperatif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cooperatifRepository->save($cooperatif, true);

            return $this->redirectToRoute('app_cooperatif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cooperatif/new.html.twig', [
            'cooperatif' => $cooperatif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cooperatif_show', methods: ['GET'])]
    public function show(Cooperatif $cooperatif): Response
    {
        return $this->render('cooperatif/show.html.twig', [
            'cooperatif' => $cooperatif,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cooperatif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cooperatif $cooperatif, CooperatifRepository $cooperatifRepository): Response
    {
        $form = $this->createForm(CooperatifType::class, $cooperatif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cooperatifRepository->save($cooperatif, true);

            return $this->redirectToRoute('app_cooperatif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cooperatif/edit.html.twig', [
            'cooperatif' => $cooperatif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cooperatif_delete', methods: ['POST'])]
    public function delete(Request $request, Cooperatif $cooperatif, CooperatifRepository $cooperatifRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cooperatif->getId(), $request->request->get('_token'))) {
            $cooperatifRepository->remove($cooperatif, true);
        }

        return $this->redirectToRoute('app_cooperatif_index', [], Response::HTTP_SEE_OTHER);
    }
}
