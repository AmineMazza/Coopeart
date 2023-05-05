<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductsRepository;
use App\Repository\UserRepository;



class FrontOfficeController extends AbstractController
{
    #[Route('/', name: 'app_front_office')]
    public function index(CategorieRepository $categorieRepository,ProductsRepository $productsRepository): Response
    {
        return $this->render('front_office/index.html.twig', [
            'controller_name' => 'FrontOfficeController',
            // 'categorie' => $categorie,
            'categories' => $categorieRepository->findAll(),
            'products' => $productsRepository->findAll(),

        ]);
    }

    #[Route('/FrontProducts', name: 'app_front_office_products')]
    public function index2(ProductsRepository $productsRepository, CategorieRepository $categorieRepository): Response
    {
        return $this->render('front_office/products.html.twig', [
            
            'categories' => $categorieRepository->findAll(),
            'products' => $productsRepository->findAll(),
        ]);
    }

    
    #[Route('FrontProducts/products/{id}', name: 'app_product_detail', methods: ['GET'])]
    public function sendCommand(Products $product): Response
    {
        return $this->render('front_office/product_detail.html.twig', [
            'product' => $product,
            // 'products' => $productsRepository->findAll(),
        ]);
    }       

    #[Route('/FrontProducts/Allcategories', name: 'app_front_office_categories')]
    public function frontcategorie(CategorieRepository $categorieRepository): Response
    {
        return $this->render('front_office/categories.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/FrontProducts/categorie/{categorie}', name: 'app_front_office_categorie_products')]
    public function index22(Categorie $categorie,CategorieRepository $categorieRepository,ProductsRepository $productsRepository): Response
    {
        
        $categories = $categorieRepository->findAll();
        return $this->render('front_office/products.html.twig', [
            'products' => $categorie->getIdProduct(),
            'categories' => $categories,
            'products' => $productsRepository->findBycategorie($categorie),
        ]);
    }
    
    #[Route('/client', name: 'app_front_office_client')]
    public function client(UserRepository $userRepository,CategorieRepository $categorieRepository): Response
    {
        return $this->render('front_office/client.html.twig', [
            'controller_name' => 'FrontOfficeController',
            'categories' => $categorieRepository->findAll(),
            // 'user' => $userRepository->findbyId(),
        ]);
    }

}
