<?php

namespace App\Entity;

use App\Repository\StoreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoreRepository::class)]
#[ORM\Table(name: 'stores')]
class Store
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $address = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $foundedDate = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingTime = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\ManyToOne(inversedBy: 'stores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getFoundedDate(): ?\DateTimeInterface
    {
        return $this->foundedDate;
    }

    public function setFoundedDate(?\DateTimeInterface $foundedDate): static
    {
        $this->foundedDate = $foundedDate;

        return $this;
    }

    public function getOpeningTime(): ?\DateTimeInterface
    {
        return $this->openingTime;
    }

    public function setOpeningTime(?\DateTimeInterface $openingTime): static
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    public function getClosingTime(): ?\DateTimeInterface
    {
        return $this->closingTime;
    }

    public function setClosingTime(?\DateTimeInterface $closingTime): static
    {
        $this->closingTime = $closingTime;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): static
    {
        $this->city = $city;

        return $this;
    }
}
