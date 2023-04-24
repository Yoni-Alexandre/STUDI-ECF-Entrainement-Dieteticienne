<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesServicesController extends AbstractController
{
    #[Route('/mes-services', name: 'app_mes_services')]
    public function index(): Response
    {
        return $this->render('mes_services/index.html.twig');
    }
}
