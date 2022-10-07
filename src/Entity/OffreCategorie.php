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
    private ?Offre $offre = null;

    #[ORM\ManyToOne(inversedBy: 'offreCategories')]
    private ?Catégorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

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
