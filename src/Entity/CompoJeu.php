<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompoJeuRepository")
 */
class CompoJeu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\utilisateur", inversedBy="compoJeus")
     */
    private $id_utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\jeu", inversedBy="compoJeus")
     */
    private $id_jeu;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
        $this->id_jeu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|jeu[]
     */
    public function getIdJeu(): Collection
    {
        return $this->id_jeu;
    }

    public function addIdJeu(jeu $idJeu): self
    {
        if (!$this->id_jeu->contains($idJeu)) {
            $this->id_jeu[] = $idJeu;
        }

        return $this;
    }

    public function removeIdJeu(jeu $idJeu): self
    {
        if ($this->id_jeu->contains($idJeu)) {
            $this->id_jeu->removeElement($idJeu);
        }

        return $this;
    }
}
