<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Pruduct::class, mappedBy="category")
     */
    private $pruducts;

    public function __construct()
    {
        $this->pruducts = new ArrayCollection();
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
     * @return Collection|Pruduct[]
     */
    public function getPruducts(): Collection
    {
        return $this->pruducts;
    }

    public function addPruduct(Pruduct $pruduct): self
    {
        if (!$this->pruducts->contains($pruduct)) {
            $this->pruducts[] = $pruduct;
            $pruduct->setCategory($this);
        }

        return $this;
    }

    public function removePruduct(Pruduct $pruduct): self
    {
        if ($this->pruducts->removeElement($pruduct)) {
            // set the owning side to null (unless already changed)
            if ($pruduct->getCategory() === $this) {
                $pruduct->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
