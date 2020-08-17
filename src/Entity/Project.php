<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 * @ApiResource(
 *     attributes={
 *        "order"={"creationDate":"DESC"}
 *     },
 *     normalizationContext={"groups"={"read:project"}},
 *     denormalizationContext={"groups"={"post:project"}},
 *     itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class,
 *     properties={"user": "exact", "user": "exact", "name"="partial"})
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read:project","customer:project"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:project","customer:project","post:project"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:project","customer:project"})
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:project","customer:project","post:project"})
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="projects", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:project","post:project","user:read"})
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="projects")
     * @Groups({"read:project","post:project"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Payment", cascade={"persist", "remove"})
     * @Groups({"read:project"})
     */
    private $payment;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Plan", cascade={"persist", "remove"})
     * @Groups({"read:project","post:project"})
     */
    private $plan;

    public function __construct()
    {
        $this->setCreationDate(new \DateTime());
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

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getPlan(): ?Plan
    {
        return $this->plan;
    }

    public function setPlan(?Plan $plan): self
    {
        $this->plan = $plan;

        return $this;
    }




    public function __toString()
    {
        return $this->getName();
    }

}
