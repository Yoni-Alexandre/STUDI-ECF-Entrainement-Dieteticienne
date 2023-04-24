<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Avis::class, orphanRemoval: true)]
    private Collection $avis;

    #[ORM\OneToMany(mappedBy: 'allergene', targetEntity: Allergene::class)]
    private Collection $allergene;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Regime::class)]
    private Collection $regime;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->allergene = new ArrayCollection();
        $this->regime = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->getPrenom() . ' ' . $this->getNom();
    }

//    #[ORM\Column(type: Types::DATE_MUTABLE)]
//    private ?\DateTimeInterface $dateDeNaissance = null;

//    #[ORM\Column(type: Types::TEXT)]
//    private ?string $adresse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

//    public function getDateDeNaissance(): ?\DateTimeInterface
//    {
//        return $this->dateDeNaissance;
//    }

//    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
//    {
//        $this->dateDeNaissance = $dateDeNaissance;
//
//        return $this;
//    }

//    public function getAdresse(): ?string
//    {
//        return $this->adresse;
//    }
//
//    public function setAdresse(string $adresse): self
//    {
//        $this->adresse = $adresse;
//
//        return $this;
//    }

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
        $avi->setUser($this);
    }

    return $this;
}

public function removeAvi(Avis $avi): self
{
    if ($this->avis->removeElement($avi)) {
        // set the owning side to null (unless already changed)
        if ($avi->getUser() === $this) {
            $avi->setUser(null);
        }
    }

    return $this;
}

/**
 * @return Collection<int, Allergene>
 */
public function getAllergene(): Collection
{
    return $this->allergene;
}

public function addAllergene(Allergene $allergene): self
{
    if (!$this->allergene->contains($allergene)) {
        $this->allergene->add($allergene);
        $allergene->setAllergene($this);
    }

    return $this;
}

public function removeAllergene(Allergene $allergene): self
{
    if ($this->allergene->removeElement($allergene)) {
        // set the owning side to null (unless already changed)
        if ($allergene->getAllergene() === $this) {
            $allergene->setAllergene(null);
        }
    }

    return $this;
}

/**
 * @return Collection<int, Regime>
 */
public function getRegime(): Collection
{
    return $this->regime;
}

public function addRegime(Regime $regime): self
{
    if (!$this->regime->contains($regime)) {
        $this->regime->add($regime);
        $regime->setUser($this);
    }

    return $this;
}

public function removeRegime(Regime $regime): self
{
    if ($this->regime->removeElement($regime)) {
        // set the owning side to null (unless already changed)
        if ($regime->getUser() === $this) {
            $regime->setUser(null);
        }
    }

    return $this;
}

}
