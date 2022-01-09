<?php

namespace App\Entity;

use App\Repository\DashBoardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DashBoardRepository::class)
 */
class DashBoard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="dashBoards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=operation::class, inversedBy="dashBoards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $operations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOperations(): ?operation
    {
        return $this->operations;
    }

    public function setOperations(?operation $operations): self
    {
        $this->operations = $operations;

        return $this;
    }
}
