<?php

namespace App\Entity;

use App\Repository\RecetteRegimeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRegimeRepository::class)]
class RecetteRegime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $recetteId = null;


    #[ORM\ManyToOne(inversedBy: 'recetteRegime')]
    private ?Recette $recette = null;

    #[ORM\ManyToOne(inversedBy: 'recetteRegime')]
    private ?Regime $regime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecetteId(): ?int
    {
        return $this->recetteId;
    }

    public function setRecetteId(int $recetteId): self
    {
        $this->recetteId = $recetteId;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getRegime(): ?Regime
    {
        return $this->regime;
    }

    public function setRegime(?Regime $regime): self
    {
        $this->regime = $regime;

        return $this;
    }
}
