<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GammeRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"read:gamme"}},
 *     denormalizationContext={"groups"={"post:gamme"}},
 *     itemOperations={"get"}
 * )
 */
class Gamme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @Groups("read:gamme")
     * @ORM\Column(type="integer")
     * @Groups({"plan:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:project","read:project","read:gamme","plan:read"})
     */
    private $label;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:project","read:project","read:gamme"})
     */
    private $coefficient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plan", mappedBy="gamme")
     */
    private $plans;

    public function __construct()
    {
        $this->plans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Plan[]
     */
    public function getPlans(): Collection
    {
        return $this->plans;
    }

    public function addPlan(Plan $plan): self
    {
        if (!$this->plans->contains($plan)) {
            $this->plans[] = $plan;
            $plan->setGamme($this);
        }

        return $this;
    }

    public function removePlan(Plan $plan): self
    {
        if ($this->plans->contains($plan)) {
            $this->plans->removeElement($plan);
            // set the owning side to null (unless already changed)
            if ($plan->getGamme() === $this) {
                $plan->setGamme(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getLabel();
    }

    /**
     * @return mixed
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * @param mixed $coefficient
     */
    public function setCoefficient($coefficient): void
    {
        $this->coefficient = $coefficient;
    }
}
