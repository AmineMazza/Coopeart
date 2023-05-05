<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $id_product = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Products::class)]
    private Collection $Id_product;

    public function __construct()
    {
        $this->Id_product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    public function setIdProduct(int $id_product): self
    {
        $this->id_product = $id_product;

        return $this;
    }

    public function addIdProduct(Products $idProduct): self
    {
        if (!$this->Id_product->contains($idProduct)) {
            $this->Id_product->add($idProduct);
            $idProduct->setCategorie($this);
        }

        return $this;
    }

    public function removeIdProduct(Products $idProduct): self
    {
        if ($this->Id_product->removeElement($idProduct)) {
            // set the owning side to null (unless already changed)
            if ($idProduct->getCategorie() === $this) {
                $idProduct->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
