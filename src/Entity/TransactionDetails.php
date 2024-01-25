<?php

namespace App\Entity;

use App\Repository\TransactionDetailsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: TransactionDetailsRepository::class)]
#[Broadcast]
class TransactionDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'transactionDetails')]
    private ?Transactions $transaction = null;

    #[ORM\ManyToOne(inversedBy: 'transactionDetails')]
    private ?Announcements $announcement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransaction(): ?Transactions
    {
        return $this->transaction;
    }

    public function setTransaction(?Transactions $transaction): static
    {
        $this->transaction = $transaction;

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
