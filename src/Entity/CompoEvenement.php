<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompoEvenementRepository")
 */
class CompoEvenement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\evenement", inversedBy="compoEvenements")
     */
    private $id_evenement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\utilisateur", inversedBy="compoEvenements")
     */
    private $id_utilisateur;

    public function __construct()
    {
        $this->id_evenement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|evenement[]
     */
    public function getIdEvenement(): Collection
    {
        return $this->id_evenement;
    }

    public function addIdEvenement(evenement $idEvenement): self
    {
        if (!$this->id_evenement->contains($idEvenement)) {
            $this->id_evenement[] = $idEvenement;
        }

        return $this;
    }

    public function removeIdEvenement(evenement $idEvenement): self
    {
        if ($this->id_evenement->contains($idEvenement)) {
            $this->id_evenement->removeElement($idEvenement);
        }

        return $this;
    }

    public function getIdUtilisateur(): ?utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?utilisateur $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }
}
