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

    #[ORM\Column]
    private ?int $RegimeId = null;

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

    public function getRegimeId(): ?int
    {
        return $this->RegimeId;
    }

    public function setRegimeId(int $RegimeId): self
    {
        $this->RegimeId = $RegimeId;

        return $this;
    }
}
