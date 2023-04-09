<?php

namespace App\Controller;
use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
     #[Route('/products', name: 'app_products')]

    public function index(ProductsRepository $productsRepository)
    {
        return $this->render('produits/index.html.twig', [
            'products' => $productsRepository->findAll()
        ]);
    }
}
