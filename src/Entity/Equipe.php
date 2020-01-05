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
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Palmares", mappedBy="equipe")
     */
    private $palmares;

    public function __construct()
    {
        $this->palmares = new ArrayCollection();
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Palmares[]
     */
    public function getPalmares(): Collection
    {
        return $this->palmares;
    }

    public function addPalmare(Palmares $palmare): self
    {
        if (!$this->palmares->contains($palmare)) {
            $this->palmares[] = $palmare;
            $palmare->setEquipe($this);
        }

        return $this;
    }

    public function removePalmare(Palmares $palmare): self
    {
        if ($this->palmares->contains($palmare)) {
            $this->palmares->removeElement($palmare);
            // set the owning side to null (unless already changed)
            if ($palmare->getEquipe() === $this) {
                $palmare->setEquipe(null);
            }
        }

        return $this;
    }
}
