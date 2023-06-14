<?php

namespace App\Entity;

use App\Repository\Author2Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Author2Repository::class)]
class Author2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $surname = null;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Book2::class)]
    private Collection $book2s;

    public function __construct()
    {
        $this->book2s = new ArrayCollection();
    }

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return Collection<int, Book2>
     */
    public function getBook2s(): Collection
    {
        return $this->book2s;
    }

    public function addBook2(Book2 $book2): self
    {
        if (!$this->book2s->contains($book2)) {
            $this->book2s->add($book2);
            $book2->setAuthor($this);
        }

        return $this;
    }

    public function removeBook2(Book2 $book2): self
    {
        if ($this->book2s->removeElement($book2)) {
            // set the owning side to null (unless already changed)
            if ($book2->getAuthor() === $this) {
                $book2->setAuthor(null);
            }
        }

        return $this;
    }
}
