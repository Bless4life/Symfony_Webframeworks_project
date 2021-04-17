<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
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
    private $ClubName;

    /**
     * @ORM\Column(type="integer")
     */
    private $member;

    /**
     * @ORM\OneToOne(targetEntity=Book::class, mappedBy="ClubName", cascade={"persist", "remove"})
     */
    private $u;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->ClubName;
    }

    public function setClubName(string $ClubName): self
    {
        $this->ClubName = $ClubName;

        return $this;
    }

    public function getMember(): ?int
    {
        return $this->member;
    }

    public function setMember(int $member): self
    {
        $this->member = $member;

        return $this;
    }

    public function getU(): ?Book
    {
        return $this->u;
    }

    public function setU(?Book $u): self
    {
        // unset the owning side of the relation if necessary
        if ($u === null && $this->u !== null) {
            $this->u->setClubName(null);
        }

        // set the owning side of the relation if necessary
        if ($u !== null && $u->getClubName() !== $this) {
            $u->setClubName($this);
        }

        $this->u = $u;

        return $this;
    }




}
