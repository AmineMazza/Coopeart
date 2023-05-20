<?php

namespace App\Controller;

use App\Entity\Checkout;
use App\Form\CheckoutType;
use App\Repository\CheckoutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;


#[Route('/checkout')]
class CheckoutController extends AbstractController
{
    #[Route('/', name: 'app_checkout_index', methods: ['GET'])]
    public function index(CheckoutRepository $checkoutRepository): Response
    {
        return $this->render('checkout/index.html.twig', [
            'checkouts' => $checkoutRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_checkout_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CheckoutRepository $checkoutRepository, CategorieRepository $categorieRepository): Response
    {
        $checkout = new Checkout();
        $form = $this->createForm(CheckoutType::class, $checkout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $checkoutRepository->save($checkout, true);

            return $this->redirectToRoute('app_checkout_thanks', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('checkout/new.html.twig', [
            'checkout' => $checkout,
            'form' => $form,
            'categories' => $categorieRepository->findAll(),
            
        ]);
    }
    #[Route('/thanks', name: 'app_checkout_thanks', methods: ['GET'])]
    public function thanks(CheckoutRepository $checkoutRepository,CategorieRepository $categorieRepository): Response
    {
        return $this->render('checkout/thanks.html.twig', [
            'checkouts' => $checkoutRepository->findAll(),
            'categories' => $categorieRepository->findAll(),
        ]);
    }
   

    #[Route('/{id}', name: 'app_checkout_show', methods: ['GET'])]
    public function show(Checkout $checkout): Response
    {
        return $this->render('checkout/show.html.twig', [
            'checkout' => $checkout,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_checkout_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Checkout $checkout, CheckoutRepository $checkoutRepository): Response
    {
        $form = $this->createForm(CheckoutType::class, $checkout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $checkoutRepository->save($checkout, true);

            return $this->redirectToRoute('app_checkout_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('checkout/edit.html.twig', [
            'checkout' => $checkout,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_checkout_delete', methods: ['POST'])]
    public function delete(Request $request, Checkout $checkout, CheckoutRepository $checkoutRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$checkout->getId(), $request->request->get('_token'))) {
            $checkoutRepository->remove($checkout, true);
        }

        return $this->redirectToRoute('app_checkout_index', [], Response::HTTP_SEE_OTHER);
    }
}
