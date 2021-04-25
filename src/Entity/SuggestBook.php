<?php

namespace App\Entity;

use App\Repository\SuggestBookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuggestBookRepository::class)
 */
class SuggestBook
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $book_name;

    /**
     * @ORM\Column(type="text")
     */
    private $context;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="suggestBooks")
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookName(): ?string
    {
        return $this->book_name;
    }

    public function setBookName(string $book_name): self
    {
        $this->book_name = $book_name;

        return $this;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

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
}
