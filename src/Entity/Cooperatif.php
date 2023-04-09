<?php

namespace App\Entity;

use App\Repository\CooperatifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CooperatifRepository::class)]
class Cooperatif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Cooperatif = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Gerant = null;


    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_profil = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCooperatif(): ?string
    {
        return $this->Nom_Cooperatif;
    }

    public function setNomCooperatif(string $Nom_Cooperatif): self
    {
        $this->Nom_Cooperatif = $Nom_Cooperatif;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getImageProfil(): ?string
    {
        return $this->image_profil;
    }

    public function setImageProfil(?string $image_profil): self
    {
        $this->image_profil = $image_profil;

        return $this;
    }

    public function getNomGerant(): ?string
    {
        return $this->Nom_Gerant;
    }

    public function setNomGerant(string $Nom_Gerant): self
    {
        $this->Nom_Gerant = $Nom_Gerant;

        return $this;
    }
}
