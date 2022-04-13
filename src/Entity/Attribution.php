<?php

namespace App\Entity;

use App\Repository\AttributionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributionRepository::class)]
class Attribution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateAttr;


    #[ORM\OneToMany(mappedBy: 'attribution', targetEntity: Compteur::class)]
    private $numeroCompteur;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $users;

    #[ORM\ManyToOne(targetEntity: Compteur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $numCompteur;

    #[ORM\ManyToOne(targetEntity: Client::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
        $this->numeroCompteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAttr(): ?\DateTimeInterface
    {
        return $this->dateAttr;
    }

    public function setDateAttr(\DateTimeInterface $dateAttr): self
    {
        $this->dateAttr = $dateAttr;

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }


    /**
     * @return Collection<int, Compteur>
     */
    public function getNumeroCompteur(): Collection
    {
        return $this->numeroCompteur;
    }

    public function addNumeroCompteur(Compteur $numeroCompteur): self
    {
        if (!$this->numeroCompteur->contains($numeroCompteur)) {
            $this->numeroCompteur[] = $numeroCompteur;
            $numeroCompteur->setAttribution($this);
        }

        return $this;
    }

    public function removeNumeroCompteur(Compteur $numeroCompteur): self
    {
        if ($this->numeroCompteur->removeElement($numeroCompteur)) {
            // set the owning side to null (unless already changed)
            if ($numeroCompteur->getAttribution() === $this) {
                $numeroCompteur->setAttribution(null);
            }
        }

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getNumCompteur(): ?Compteur
    {
        return $this->numCompteur;
    }

    public function setNumCompteur(?Compteur $numCompteur): self
    {
        $this->numCompteur = $numCompteur;

        return $this;
    }

    public function __toString()
    {
        return $this->numCompteur;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

}
