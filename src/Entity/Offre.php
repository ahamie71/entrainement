<?php

namespace App\Entity;
use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
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

    #[ORM\ManyToOne(inversedBy: 'offre')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Companie $companie = null;

    #[ORM\OneToMany(mappedBy: 'offre', targetEntity: OffreCategorie::class)]
    private Collection $offreCategories;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $depart = null;

    #[ORM\Column(length: 255)]
    private ?string $destination = null;

    #[ORM\Column(length: 255)]
    private ?string $adressehotel = null;

    public function __construct()
    {
        $this->offreCategories = new ArrayCollection();
    }

    public function getId(): int
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

    public function getCompanie(): ?Companie
    {
        return $this->companie;
    }

    public function setCompanie(Companie $companie): self
    {
        $this->companie = $companie;

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
            $offreCategory->setOffre($this);
        }

        return $this;
    }

    public function removeOffreCategory(OffreCategorie $offreCategory): self
    {
        if ($this->offreCategories->removeElement($offreCategory)) {
            // set the owning side to null (unless already changed)
            if ($offreCategory->getOffre() === $this) {
                $offreCategory->setOffre(null);
            }
        }

        return $this;
    }

    public function getDepart(): ?\DateTimeInterface
    {
        return $this->depart;
    }

    public function setDepart(\DateTimeInterface $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getAdressehotel(): ?string
    {
        return $this->adressehotel;
    }

    public function setAdressehotel(string $adressehotel): self
    {
        $this->adressehotel = $adressehotel;

        return $this;
    }
}
