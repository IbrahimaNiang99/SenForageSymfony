<?php

namespace App\Entity;

use App\Repository\AbonnementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateAbon;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'abonnements')]
    #[ORM\JoinColumn(nullable: false)]
    private $users;

    #[ORM\ManyToOne(targetEntity: Client::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $clients;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAbon(): ?\DateTimeInterface
    {
        return $this->dateAbon;
    }

    public function setDateAbon(\DateTimeInterface $dateAbon): self
    {
        $this->dateAbon = $dateAbon;

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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getClients(): ?Client
    {
        return $this->clients;
    }

    public function setClients(?Client $clients): self
    {
        $this->clients = $clients;

        return $this;
    }
    
}
