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

    #[ORM\Column]
    private ?int $allergeneId = null;

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

    public function getAllergeneId(): ?int
    {
        return $this->allergeneId;
    }

    public function setAllergeneId(int $allergeneId): self
    {
        $this->allergeneId = $allergeneId;

        return $this;
    }
}
