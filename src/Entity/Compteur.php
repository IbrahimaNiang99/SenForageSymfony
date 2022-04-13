<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteurRepository::class)]
class Compteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $numero;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $cumul;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $users;

    #[ORM\ManyToOne(targetEntity: Attribution::class, inversedBy: 'numeroCompteur')]
    private $attribution;


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

    public function getCumul(): ?string
    {
        return $this->cumul;
    }

    public function setCumul(string $cumul): self
    {
        $this->cumul = $cumul;

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

    public function getAttribution(): ?Attribution
    {
        return $this->attribution;
    }

    public function setAttribution(?Attribution $attribution): self
    {
        $this->attribution = $attribution;

        return $this;
    }

    public function __toString()
    {
        return $this->numero;
    }

}
