<?php

namespace App\Entity;

use App\Repository\Book2Repository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Book2Repository::class)]
class Book2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $year = null;

    #[ORM\ManyToOne(inversedBy: 'book2s')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Author2 $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getAuthor(): ?Author2
    {
        return $this->author;
    }

    public function setAuthor(?Author2 $author): self
    {
        $this->author = $author;

        return $this;
    }
}
