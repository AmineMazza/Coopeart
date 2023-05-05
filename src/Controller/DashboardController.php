<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
   
    public function index()
    {
        $user = $this->getUser();
        if ($this->isGranted('ROLE_ADMIN', $user)) {
            return $this->render('Dashboard/index.html.twig', [
                        'controller_name' => 'AdminController',
                    ]);
        } 
        
        else if ($this->isGranted('ROLE_ARTISAN', $user)) {
             return $this->render('Dashboard/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
        }
        
        else if ($this->isGranted('ROLE_COOP', $user)) {
             return $this->render('Dashboard/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
        }

        else if ($this->isGranted('ROLE_CLIENT', $user)) {
            return new RedirectResponse($this->generateUrl('app_front_office_client'));
        }

        else {
            return new Response('Page Not Found (No Role)', 403);
        }
    }
}
