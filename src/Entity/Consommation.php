<?php

namespace App\Entity;

use App\Repository\ConsommationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsommationRepository::class)]
class Consommation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $periode;

    #[ORM\Column(type: 'integer')]
    private $cumul;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $users;

    #[ORM\ManyToOne(targetEntity: Compteur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $numeroCompteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriode(): ?int
    {
        return $this->periode;
    }

    public function setPeriode(int $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getCumul(): ?int
    {
        return $this->cumul;
    }

    public function setCumul(int $cumul): self
    {
        $this->cumul = $cumul;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

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

    public function getNumeroCompteur(): ?Compteur
    {
        return $this->numeroCompteur;
    }

    public function setNumeroCompteur(?Compteur $numeroCompteur): self
    {
        $this->numeroCompteur = $numeroCompteur;

        return $this;
    }
}
