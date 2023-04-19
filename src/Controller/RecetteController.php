<?php

namespace App\Controller;

use App\Entity\Recette;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/recette', name: 'app_recette')]
    public function index(): Response
    {
        $recette = $this->entityManager->getRepository(Recette::class)->findAll();

        return $this->render('recette/index.html.twig', [
            'recette' => $recette,
        ]);
    }
}
