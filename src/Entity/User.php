<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;



    /**
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="user")
     */
    private $books;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="users")
     */
    private $club;

    /**
     * @ORM\OneToMany(targetEntity=SuggestBook::class, mappedBy="users")
     */
    private $suggestBooks;

    public function __construct()
    {
        $this->clubs = new ArrayCollection();
        $this->books = new ArrayCollection();
        $this->suggestBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        return [$this->role];
    }


    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }



    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setUser($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getUser() === $this) {
                $book->setUser(null);
            }
        }

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }
    public function __toString(): string
    {
        return (string) $this->email;
    }

    /**
     * @return Collection|SuggestBook[]
     */
    public function getSuggestBooks(): Collection
    {
        return $this->suggestBooks;
    }

    public function addSuggestBook(SuggestBook $suggestBook): self
    {
        if (!$this->suggestBooks->contains($suggestBook)) {
            $this->suggestBooks[] = $suggestBook;
            $suggestBook->setUsers($this);
        }

        return $this;
    }

    public function removeSuggestBook(SuggestBook $suggestBook): self
    {
        if ($this->suggestBooks->removeElement($suggestBook)) {
            // set the owning side to null (unless already changed)
            if ($suggestBook->getUsers() === $this) {
                $suggestBook->setUsers(null);
            }
        }

        return $this;
    }
}
