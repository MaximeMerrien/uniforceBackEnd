<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PalmaresRepository")
 */
class Palmares
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\utilisateur", mappedBy="palmares")
     */
    private $id_utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\jeu", mappedBy="palmares")
     */
    private $id_jeu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gain;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipe", mappedBy="id_palmares")
     */
    private $equipes;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
        $this->id_jeu = new ArrayCollection();
        $this->equipes = new ArrayCollection();
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
            $idUtilisateur->setPalmares($this);
        }

        return $this;
    }

    public function removeIdUtilisateur(utilisateur $idUtilisateur): self
    {
        if ($this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur->removeElement($idUtilisateur);
            // set the owning side to null (unless already changed)
            if ($idUtilisateur->getPalmares() === $this) {
                $idUtilisateur->setPalmares(null);
            }
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
            $idJeu->setPalmares($this);
        }

        return $this;
    }

    public function removeIdJeu(jeu $idJeu): self
    {
        if ($this->id_jeu->contains($idJeu)) {
            $this->id_jeu->removeElement($idJeu);
            // set the owning side to null (unless already changed)
            if ($idJeu->getPalmares() === $this) {
                $idJeu->setPalmares(null);
            }
        }

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getClassement(): ?string
    {
        return $this->classement;
    }

    public function setClassement(?string $classement): self
    {
        $this->classement = $classement;

        return $this;
    }

    public function getGain(): ?string
    {
        return $this->gain;
    }

    public function setGain(string $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getCompetition(): ?string
    {
        return $this->competition;
    }

    public function setCompetition(?string $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection|Equipe[]
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes[] = $equipe;
            $equipe->addIdPalmare($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->equipes->contains($equipe)) {
            $this->equipes->removeElement($equipe);
            $equipe->removeIdPalmare($this);
        }

        return $this;
    }
}
