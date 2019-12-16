<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompoEquipeRepository")
 */
class CompoEquipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\equipe", inversedBy="compoEquipes")
     */
    private $id_equipe;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\utilisateur", inversedBy="compoEquipes")
     */
    private $id_utilisateur;

    public function __construct()
    {
        $this->id_equipe = new ArrayCollection();
        $this->id_utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|equipe[]
     */
    public function getIdEquipe(): Collection
    {
        return $this->id_equipe;
    }

    public function addIdEquipe(equipe $idEquipe): self
    {
        if (!$this->id_equipe->contains($idEquipe)) {
            $this->id_equipe[] = $idEquipe;
        }

        return $this;
    }

    public function removeIdEquipe(equipe $idEquipe): self
    {
        if ($this->id_equipe->contains($idEquipe)) {
            $this->id_equipe->removeElement($idEquipe);
        }

        return $this;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->id_utilisateur;
    }

    public function addIdUtilisateur(utilisateur $idUtilisateur): self
    {
        if (!$this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur[] = $idUtilisateur;
        }

        return $this;
    }

    public function removeIdUtilisateur(utilisateur $idUtilisateur): self
    {
        if ($this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur->removeElement($idUtilisateur);
        }

        return $this;
    }
}
