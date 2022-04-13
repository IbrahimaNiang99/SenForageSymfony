<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $numero;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $montant;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'boolean')]
    private $etat;

    #[ORM\ManyToOne(targetEntity: Reglement::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $reglement;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $users;

    #[ORM\ManyToOne(targetEntity: Consommation::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $consommation;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getReglement(): ?Reglement
    {
        return $this->reglement;
    }

    public function setReglement(?Reglement $reglement): self
    {
        $this->reglement = $reglement;

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

    public function getConsommation(): ?Consommation
    {
        return $this->consommation;
    }

    public function setConsommation(?Consommation $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }
}
