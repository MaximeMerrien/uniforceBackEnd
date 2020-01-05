<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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
     * @ORM\Column(type="string", length=255)
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classement;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $gain;

    /**
     * @ORM\Column(type="text")
     */
    private $competition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="palmares")
     */
    private $equipe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="palmares")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getClassement(): ?string
    {
        return $this->classement;
    }

    public function setClassement(string $classement): self
    {
        $this->classement = $classement;

        return $this;
    }

    public function getGain(): ?string
    {
        return $this->gain;
    }

    public function setGain(?string $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getCompetition(): ?string
    {
        return $this->competition;
    }

    public function setCompetition(string $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getJeu(): ?Jeu
    {
        return $this->jeu;
    }

    public function setJeu(?Jeu $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }
}
