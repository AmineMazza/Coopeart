<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontOfficeController extends AbstractController
{
    #[Route('/', name: 'app_front_office')]
    public function index(): Response
    {
        return $this->render('front_office/index.html.twig', [
            'controller_name' => 'FrontOfficeController',

        ]);
    }

    #[Route('/FrontProducts', name: 'app_front_office_products')]
    public function index3(): Response
    {
        return $this->render('front_office/products.html.twig', [
            'controller_name' => 'FrontOfficeController',

        ]);
    }
}
