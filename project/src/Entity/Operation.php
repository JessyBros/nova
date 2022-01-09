<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=DashBoard::class, mappedBy="operations", orphanRemoval=true)
     */
    private $dashBoards;

    public function __construct()
    {
        $this->dashBoards = new ArrayCollection();
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

    /**
     * @return Collection|DashBoard[]
     */
    public function getDashBoards(): Collection
    {
        return $this->dashBoards;
    }

    public function addDashBoard(DashBoard $dashBoard): self
    {
        if (!$this->dashBoards->contains($dashBoard)) {
            $this->dashBoards[] = $dashBoard;
            $dashBoard->setOperations($this);
        }

        return $this;
    }

    public function removeDashBoard(DashBoard $dashBoard): self
    {
        if ($this->dashBoards->removeElement($dashBoard)) {
            // set the owning side to null (unless already changed)
            if ($dashBoard->getOperations() === $this) {
                $dashBoard->setOperations(null);
            }
        }

        return $this;
    }
}
