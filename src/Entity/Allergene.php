<?php

namespace App\Entity;

use App\Repository\AllergeneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllergeneRepository::class)]
class Allergene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'allergene', targetEntity: RecetteAllergene::class)]
    private Collection $recetteAllergene;

    #[ORM\ManyToOne(inversedBy: 'allergene')]
    private ?User $allergene = null;

    #[ORM\OneToMany(mappedBy: 'allergene', targetEntity: Recette::class)]
    private Collection $recette;

    public function __construct()
    {
        $this->recetteAllergene = new ArrayCollection();
        $this->recette = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, RecetteAllergene>
     */
    public function getRecetteAllergene(): Collection
    {
        return $this->recetteAllergene;
    }

    public function addRecetteAllergene(RecetteAllergene $recetteAllergene): self
    {
        if (!$this->recetteAllergene->contains($recetteAllergene)) {
            $this->recetteAllergene->add($recetteAllergene);
            $recetteAllergene->setAllergene($this);
        }

        return $this;
    }

    public function removeRecetteAllergene(RecetteAllergene $recetteAllergene): self
    {
        if ($this->recetteAllergene->removeElement($recetteAllergene)) {
            // set the owning side to null (unless already changed)
            if ($recetteAllergene->getAllergene() === $this) {
                $recetteAllergene->setAllergene(null);
            }
        }

        return $this;
    }

    public function getAllergene(): ?User
    {
        return $this->allergene;
    }

    public function setAllergene(?User $allergene): self
    {
        $this->allergene = $allergene;

        return $this;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecette(): Collection
    {
        return $this->recette;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recette->contains($recette)) {
            $this->recette->add($recette);
            $recette->setAllergene($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recette->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getAllergene() === $this) {
                $recette->setAllergene(null);
            }
        }

        return $this;
    }
}
