<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $tempsPreparation = null;

    #[ORM\Column]
    private ?int $tempsRepos = null;

    #[ORM\Column]
    private ?int $tempsCuisson = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ingredients = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etapes = null;

    #[ORM\Column]
    private ?bool $estPrivee = null;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: Avis::class, orphanRemoval: true)]
    private Collection $avis;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: RecetteRegime::class)]
    private Collection $recetteRegime;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: RecetteAllergene::class)]
    private Collection $recetteAllergene;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'recette')]
    private ?Allergene $allergene = null;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->recetteRegime = new ArrayCollection();
        $this->recetteAllergene = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTempsPreparation(): ?int
    {
        return $this->tempsPreparation;
    }

    public function setTempsPreparation(int $tempsPreparation): self
    {
        $this->tempsPreparation = $tempsPreparation;

        return $this;
    }

    public function getTempsRepos(): ?int
    {
        return $this->tempsRepos;
    }

    public function setTempsRepos(int $tempsRepos): self
    {
        $this->tempsRepos = $tempsRepos;

        return $this;
    }

    public function getTempsCuisson(): ?int
    {
        return $this->tempsCuisson;
    }

    public function setTempsCuisson(int $tempsCuisson): self
    {
        $this->tempsCuisson = $tempsCuisson;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getEtapes(): ?string
    {
        return $this->etapes;
    }

    public function setEtapes(string $etapes): self
    {
        $this->etapes = $etapes;

        return $this;
    }

    public function isEstPrivee(): ?bool
    {
        return $this->estPrivee;
    }

    public function setEstPrivee(bool $estPrivee): self
    {
        $this->estPrivee = $estPrivee;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setRecette($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getRecette() === $this) {
                $avi->setRecette(null);
            }
        }

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
            $recetteRegime->setRecette($this);
        }

        return $this;
    }

    public function removeRecetteRegime(RecetteRegime $recetteRegime): self
    {
        if ($this->recetteRegime->removeElement($recetteRegime)) {
            // set the owning side to null (unless already changed)
            if ($recetteRegime->getRecette() === $this) {
                $recetteRegime->setRecette(null);
            }
        }

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
            $recetteAllergene->setRecette($this);
        }

        return $this;
    }

    public function removeRecetteAllergene(RecetteAllergene $recetteAllergene): self
    {
        if ($this->recetteAllergene->removeElement($recetteAllergene)) {
            // set the owning side to null (unless already changed)
            if ($recetteAllergene->getRecette() === $this) {
                $recetteAllergene->setRecette(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
}
