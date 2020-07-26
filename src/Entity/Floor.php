<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FloorRepository")
 * @ApiResource(normalizationContext={"floor:read"})
 */
class Floor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"floor:read",  "plan:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"floor:read",  "plan:read"})
     */
    private $label;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Module", mappedBy="floor")
     */
    private $modules;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Module[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->setFloor($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            // set the owning side to null (unless already changed)
            if ($module->getFloor() === $this) {
                $module->setFloor(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getLabel();
    }

}
