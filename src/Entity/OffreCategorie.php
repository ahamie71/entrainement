<?php

namespace App\Entity;

use App\Repository\OffreCategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreCategorieRepository::class)]
class OffreCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'offreCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offres $offres = null;

    #[ORM\ManyToOne(inversedBy: 'offreCategories')]
    private ?Catégorie $categories = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffres(): ?Offres
    {
        return $this->offres;
    }

    public function setOffres(?Offres $offres): self
    {
        $this->offres = $offres;

        return $this;
    }

    public function getCategories(): ?Catégorie
    {
        return $this->categories;
    }

    public function setCategories(?Catégorie $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
