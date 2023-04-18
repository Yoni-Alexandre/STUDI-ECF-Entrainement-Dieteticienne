<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $recetteId = null;

    #[ORM\Column]
    private ?int $patientId = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $commentaire = null;

    #[ORM\Column]
    private ?int $note = null;

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

    public function getPatientId(): ?int
    {
        return $this->patientId;
    }

    public function setPatientId(int $patientId): self
    {
        $this->patientId = $patientId;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }
}
