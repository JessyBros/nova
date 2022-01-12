<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
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
     * @ORM\Column(type="string", length=80)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=DashBoard::class, mappedBy="user", orphanRemoval=true)
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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
            $dashBoard->setUser($this);
        }

        return $this;
    }

    public function removeDashBoard(DashBoard $dashBoard): self
    {
        if ($this->dashBoards->removeElement($dashBoard)) {
            // set the owning side to null (unless already changed)
            if ($dashBoard->getUser() === $this) {
                $dashBoard->setUser(null);
            }
        }

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }
}
