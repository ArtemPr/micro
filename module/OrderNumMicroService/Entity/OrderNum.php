<?php

namespace Module\OrderNumMicroService\Entity;

use Module\OrderNumMicroService\Repository\NumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NumRepository::class)]
class OrderNum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'num', initialValue: 1014567)]
    #[ORM\Column(type: 'integer', nullable: true)]
    private int $num;

    #[ORM\Column(type: 'string', nullable: true)]
    private $training_centre;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private \DateTimeInterface $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNum(): int
    {
        return $this->num;
    }

    public function getTrainingCentre(): ?string
    {
        return $this->training_centre;
    }

    public function setTrainingCentre(?string $training_centre): void
    {
        $this->training_centre = $training_centre;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

}
