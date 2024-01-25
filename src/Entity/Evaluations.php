<?php

namespace App\Entity;

use App\Repository\EvaluationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: EvaluationsRepository::class)]
#[Broadcast]
class Evaluations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(nullable: true)]
    private ?float $note = null;

    #[ORM\ManyToOne(inversedBy: 'evaluations')]
    private ?User $evaluator = null;

    #[ORM\ManyToOne(inversedBy: 'evaluated_user')]
    private ?User $evaluated_user = null;

    #[ORM\ManyToOne(inversedBy: 'evaluations')]
    private ?Announcements $announcement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getEvaluator(): ?User
    {
        return $this->evaluator;
    }

    public function setEvaluator(?User $evaluator): static
    {
        $this->evaluator = $evaluator;

        return $this;
    }

    public function getEvaluatedUser(): ?User
    {
        return $this->evaluated_user;
    }

    public function setEvaluatedUser(?User $evaluated_user): static
    {
        $this->evaluated_user = $evaluated_user;

        return $this;
    }

    public function getAnnouncement(): ?Announcements
    {
        return $this->announcement;
    }

    public function setAnnouncement(?Announcements $announcement): static
    {
        $this->announcement = $announcement;

        return $this;
    }
}
