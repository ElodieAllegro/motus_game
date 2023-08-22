<?php

namespace App\Entity;

use App\Repository\WallOfFAmeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WallOfFAmeRepository::class)]
class WallOfFAme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'player')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $player = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?Users
    {
        return $this->player;
    }

    public function setPlayer(?Users $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
