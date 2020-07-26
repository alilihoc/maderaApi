<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"customer:project"}},
 *     collectionOperations={"get","post"},
 *     itemOperations={"get"},
 *     paginationClientEnabled=false
 * )
 *
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read:project","customer:project", "user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:project","post:project"})
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:project", "post:project"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:project", "post:project"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"customer:project", "post:project"})
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:project","customer:project", "post:project", "user:read"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:project","customer:project", "post:project", "user:read"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups({"customer:project", "post:project"})
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="customer")
     * @Groups({"customer:project"})
     */
    private $projects;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customer:project", "post:project", "user:read"})
     */
    private $email;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setCustomer($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getCustomer() === $this) {
                $project->setCustomer(null);
            }
        }

        return $this;
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


    public function __toString()
    {
        return $this->getEmail();
    }
}
