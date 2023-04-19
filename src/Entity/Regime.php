<?php

namespace App\Entity;

use App\Repository\RegimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegimeRepository::class)]
class Regime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'regime', targetEntity: RecetteRegime::class)]
    private Collection $recetteRegime;

    public function __construct()
    {
        $this->recetteRegime = new ArrayCollection();
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
     * @return Collection<int, RecetteRegime>
     */
    public function getRecetteRegime(): Collection
    {
        return $this->recetteRegime;
    }

    public function addRecetteRegime(RecetteRegime $recetteRegime): self
    {
        if (!$this->recetteRegime->contains($recetteRegime)) {
            $this->recetteRegime->add($recetteRegime);
            $recetteRegime->setRegime($this);
        }

        return $this;
    }

    public function removeRecetteRegime(RecetteRegime $recetteRegime): self
    {
        if ($this->recetteRegime->removeElement($recetteRegime)) {
            // set the owning side to null (unless already changed)
            if ($recetteRegime->getRegime() === $this) {
                $recetteRegime->setRegime(null);
            }
        }

        return $this;
    }
}
