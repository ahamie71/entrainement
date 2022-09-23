<?php

namespace App\Entity;

use App\Repository\CatégorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatégorieRepository::class)]
class Catégorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $vols = null;

    #[ORM\Column(length: 255)]
    private ?string $trips = null;

    #[ORM\Column(length: 255)]
    private ?string $hotels = null;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: OffreCategorie::class)]
    private Collection $offreCategories;

    public function __construct()
    {
        $this->offreCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVols(): ?string
    {
        return $this->vols;
    }

    public function setVols(string $vols): self
    {
        $this->vols = $vols;

        return $this;
    }

    public function getTrips(): ?string
    {
        return $this->trips;
    }

    public function setTrips(string $trips): self
    {
        $this->trips = $trips;

        return $this;
    }

    public function getHotels(): ?string
    {
        return $this->hotels;
    }

    public function setHotels(string $hotels): self
    {
        $this->hotels = $hotels;

        return $this;
    }

    /**
     * @return Collection<int, OffreCategorie>
     */
    public function getOffreCategories(): Collection
    {
        return $this->offreCategories;
    }

    public function addOffreCategory(OffreCategorie $offreCategory): self
    {
        if (!$this->offreCategories->contains($offreCategory)) {
            $this->offreCategories->add($offreCategory);
            $offreCategory->setCategories($this);
        }

        return $this;
    }

    public function removeOffreCategory(OffreCategorie $offreCategory): self
    {
        if ($this->offreCategories->removeElement($offreCategory)) {
            // set the owning side to null (unless already changed)
            if ($offreCategory->getCategories() === $this) {
                $offreCategory->setCategories(null);
            }
        }

        return $this;
    }
}
