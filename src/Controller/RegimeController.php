<?php

namespace App\Controller;

use App\Entity\Regime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegimeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/regime', name: 'app_regime')]
    public function index(): Response
    {
        $regimes = $this->entityManager->getRepository(Regime::class)->findAll();
        return $this->render('regime/index.html.twig', [
            'regimes' => $regimes,
        ]);
    }
}
