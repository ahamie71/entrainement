<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffresRepository::class)]
class Offres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedepublication = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datededebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedefin = null;

    #[ORM\Column]
    private ?float $tarif = null;

    #[ORM\ManyToOne(inversedBy: 'offres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Companie $companies = null;

    #[ORM\OneToMany(mappedBy: 'offres', targetEntity: OffreCategorie::class)]
    private Collection $offreCategories;

    #[ORM\OneToMany(mappedBy: 'offres', targetEntity: Achats::class)]
    private Collection $achats;

    public function __construct()
    {
        $this->offreCategories = new ArrayCollection();
        $this->achats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatedepublication(): ?\DateTimeInterface
    {
        return $this->datedepublication;
    }

    public function setDatedepublication(\DateTimeInterface $datedepublication): self
    {
        $this->datedepublication = $datedepublication;

        return $this;
    }

    public function getDatededebut(): ?\DateTimeInterface
    {
        return $this->datededebut;
    }

    public function setDatededebut(\DateTimeInterface $datededebut): self
    {
        $this->datededebut = $datededebut;

        return $this;
    }

    public function getDatedefin(): ?\DateTimeInterface
    {
        return $this->datedefin;
    }

    public function setDatedefin(\DateTimeInterface $datedefin): self
    {
        $this->datedefin = $datedefin;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getCompanies(): ?Companie
    {
        return $this->companies;
    }

    public function setCompanies(?Companie $companies): self
    {
        $this->companies = $companies;

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
            $offreCategory->setOffres($this);
        }

        return $this;
    }

    public function removeOffreCategory(OffreCategorie $offreCategory): self
    {
        if ($this->offreCategories->removeElement($offreCategory)) {
            // set the owning side to null (unless already changed)
            if ($offreCategory->getOffres() === $this) {
                $offreCategory->setOffres(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Achats>
     */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Achats $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats->add($achat);
            $achat->setOffres($this);
        }

        return $this;
    }

    public function removeAchat(Achats $achat): self
    {
        if ($this->achats->removeElement($achat)) {
            // set the owning side to null (unless already changed)
            if ($achat->getOffres() === $this) {
                $achat->setOffres(null);
            }
        }

        return $this;
    }
}
