<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $dailyPrice = null;

    #[ORM\Column]
    private ?float $monthlyPrice = null;

    #[ORM\Column(type: Types::SMALLINT, options: ['unsigned => true'])]
    private ?int $seats = null;

    #[ORM\Column]
    private ?bool $manual = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->dailyPrice;
    }

    public function setDailyPrice(float $dailyPrice): static
    {
        $this->dailyPrice = $dailyPrice;

        return $this;
    }

    public function getMonthlyPrice(): ?float
    {
        return $this->monthlyPrice;
    }

    public function setMonthlyPrice(float $monthlyPrice): static
    {
        $this->monthlyPrice = $monthlyPrice;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): static
    {
        $this->seats = $seats;

        return $this;
    }

    public function isManual(): ?bool
    {
        return $this->manual;
    }

    public function setManual(bool $manual): static
    {
        $this->manual = $manual;

        return $this;
    }
}
