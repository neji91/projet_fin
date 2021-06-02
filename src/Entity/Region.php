<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $carte_svg;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_bdd;

    /**
     * @ORM\OneToMany(targetEntity=Departement::class, mappedBy="region")
     */
    private $departements;

    /**
     * @ORM\ManyToOne(targetEntity=SuperRegion::class, inversedBy="regions")
     */
    private $superRegion;

    public function __construct()
    {
        $this->departements = new ArrayCollection();
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

    public function getDescritpion(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCarteSvg(): ?string
    {
        return $this->carte_svg;
    }

    public function setCarteSvg(string $carte_svg): self
    {
        $this->carte_svg = $carte_svg;

        return $this;
    }

    public function getNomBdd(): ?string
    {
        return $this->nom_bdd;
    }

    public function setNomBdd(string $nom_bdd): self
    {
        $this->nom_bdd = $nom_bdd;

        return $this;
    }

    /**
     * @return Collection|Departement[]
     */
    public function getDepartements(): Collection
    {
        return $this->departements;
    }

    public function addDepartement(Departement $departement): self
    {
        if (!$this->departements->contains($departement)) {
            $this->departements[] = $departement;
            $departement->setRegion($this);
        }

        return $this;
    }

    public function removeDepartement(Departement $departement): self
    {
        if ($this->departements->removeElement($departement)) {
            // set the owning side to null (unless already changed)
            if ($departement->getRegion() === $this) {
                $departement->setRegion(null);
            }
        }

        return $this;
    }

    public function getSuperRegion(): ?SuperRegion
    {
        return $this->superRegion;
    }

    public function setSuperRegion(?SuperRegion $superRegion): self
    {
        $this->superRegion = $superRegion;

        return $this;
    }
}
