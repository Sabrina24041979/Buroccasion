<?php

namespace App\Entity;

use App\Repository\TransactionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: TransactionsRepository::class)]
#[Broadcast]
class Transactions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_transaction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'transaction', targetEntity: TransactionDetails::class)]
    private Collection $transactionDetails;

    public function __construct()
    {
        $this->transactionDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->date_transaction;
    }

    public function setDateTransaction(?\DateTimeInterface $date_transaction): static
    {
        $this->date_transaction = $date_transaction;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, TransactionDetails>
     */
    public function getTransactionDetails(): Collection
    {
        return $this->transactionDetails;
    }

    public function addTransactionDetail(TransactionDetails $transactionDetail): static
    {
        if (!$this->transactionDetails->contains($transactionDetail)) {
            $this->transactionDetails->add($transactionDetail);
            $transactionDetail->setTransaction($this);
        }

        return $this;
    }

    public function removeTransactionDetail(TransactionDetails $transactionDetail): static
    {
        if ($this->transactionDetails->removeElement($transactionDetail)) {
            // set the owning side to null (unless already changed)
            if ($transactionDetail->getTransaction() === $this) {
                $transactionDetail->setTransaction(null);
            }
        }

        return $this;
    }
}
