<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\Avis;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/recette/{id}/avis', name: 'avis_nouveau')]
    public function nouveau(Request $request, Recette $recette): Response
    {
        $avis = new Avis();
        $avis->setRecette($recette);
        $avis->setUser($this->getUser());

        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($avis);
            $this->entityManager->flush();

        return $this->redirectToRoute('app_account', ['id' => $recette->getId()]);
        }

        return $this->render('avis/evaluerRecette.html.twig', [
        'recette' => $recette,
        'form' => $form->createView(),
        ]);
    }
}
