<?php

namespace App\Entity;

use App\Repository\RecetteAllergeneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteAllergeneRepository::class)]
class RecetteAllergene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $recetteId = null;


    #[ORM\ManyToOne(inversedBy: 'recetteAllergene')]
    private ?Recette $recette = null;

    #[ORM\ManyToOne(inversedBy: 'recetteAllergene')]
    private ?Allergene $allergene = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

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

    public function getAllergene(): ?Allergene
    {
        return $this->allergene;
    }

    public function setAllergene(?Allergene $allergene): self
    {
        $this->allergene = $allergene;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
