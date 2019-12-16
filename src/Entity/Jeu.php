<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\JeuRepository")
 */
class Jeu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deiteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modeJeu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CompoJeu", mappedBy="id_jeu")
     */
    private $compoJeus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Palmares", inversedBy="id_jeu")
     */
    private $palmares;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Evenement", mappedBy="id_jeu")
     */
    private $evenements;

    public function __construct()
    {
        $this->compoJeus = new ArrayCollection();
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getDeiteur(): ?string
    {
        return $this->deiteur;
    }

    public function setDeiteur(?string $deiteur): self
    {
        $this->deiteur = $deiteur;

        return $this;
    }

    public function getModeJeu(): ?string
    {
        return $this->modeJeu;
    }

    public function setModeJeu(string $modeJeu): self
    {
        $this->modeJeu = $modeJeu;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|CompoJeu[]
     */
    public function getCompoJeus(): Collection
    {
        return $this->compoJeus;
    }

    public function addCompoJeus(CompoJeu $compoJeus): self
    {
        if (!$this->compoJeus->contains($compoJeus)) {
            $this->compoJeus[] = $compoJeus;
            $compoJeus->addIdJeu($this);
        }

        return $this;
    }

    public function removeCompoJeus(CompoJeu $compoJeus): self
    {
        if ($this->compoJeus->contains($compoJeus)) {
            $this->compoJeus->removeElement($compoJeus);
            $compoJeus->removeIdJeu($this);
        }

        return $this;
    }

    public function getPalmares(): ?Palmares
    {
        return $this->palmares;
    }

    public function setPalmares(?Palmares $palmares): self
    {
        $this->palmares = $palmares;

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->addIdJeu($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->contains($evenement)) {
            $this->evenements->removeElement($evenement);
            $evenement->removeIdJeu($this);
        }

        return $this;
    }
}
