<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EquipeRepository")
 */
class Equipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\palmares", inversedBy="equipes")
     */
    private $id_palmares;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeEquipe;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CompoEquipe", mappedBy="id_equipe")
     */
    private $compoEquipes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenement", inversedBy="id_equipe")
     */
    private $evenement;

    public function __construct()
    {
        $this->id_palmares = new ArrayCollection();
        $this->compoEquipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|palmares[]
     */
    public function getIdPalmares(): Collection
    {
        return $this->id_palmares;
    }

    public function addIdPalmare(palmares $idPalmare): self
    {
        if (!$this->id_palmares->contains($idPalmare)) {
            $this->id_palmares[] = $idPalmare;
        }

        return $this;
    }

    public function removeIdPalmare(palmares $idPalmare): self
    {
        if ($this->id_palmares->contains($idPalmare)) {
            $this->id_palmares->removeElement($idPalmare);
        }

        return $this;
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

    public function getDateCreation(): ?string
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?string $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getTypeEquipe(): ?string
    {
        return $this->typeEquipe;
    }

    public function setTypeEquipe(?string $typeEquipe): self
    {
        $this->typeEquipe = $typeEquipe;

        return $this;
    }

    /**
     * @return Collection|CompoEquipe[]
     */
    public function getCompoEquipes(): Collection
    {
        return $this->compoEquipes;
    }

    public function addCompoEquipe(CompoEquipe $compoEquipe): self
    {
        if (!$this->compoEquipes->contains($compoEquipe)) {
            $this->compoEquipes[] = $compoEquipe;
            $compoEquipe->addIdEquipe($this);
        }

        return $this;
    }

    public function removeCompoEquipe(CompoEquipe $compoEquipe): self
    {
        if ($this->compoEquipes->contains($compoEquipe)) {
            $this->compoEquipes->removeElement($compoEquipe);
            $compoEquipe->removeIdEquipe($this);
        }

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }
}
