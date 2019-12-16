<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\equipe", mappedBy="evenement")
     */
    private $id_equipe;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\jeu", inversedBy="evenements")
     */
    private $id_jeu;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\utilisateur", inversedBy="evenements")
     */
    private $id_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeEvenement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tarif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $organisateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plateforme;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CompoEvenement", mappedBy="id_evenement")
     */
    private $compoEvenements;

    public function __construct()
    {
        $this->id_equipe = new ArrayCollection();
        $this->id_jeu = new ArrayCollection();
        $this->id_utilisateur = new ArrayCollection();
        $this->compoEvenements = new ArrayCollection();
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
            $idEquipe->setEvenement($this);
        }

        return $this;
    }

    public function removeIdEquipe(equipe $idEquipe): self
    {
        if ($this->id_equipe->contains($idEquipe)) {
            $this->id_equipe->removeElement($idEquipe);
            // set the owning side to null (unless already changed)
            if ($idEquipe->getEvenement() === $this) {
                $idEquipe->setEvenement(null);
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getTypeEvenement(): ?string
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(?string $typeEvenement): self
    {
        $this->typeEvenement = $typeEvenement;

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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(?float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getOrganisateur(): ?string
    {
        return $this->organisateur;
    }

    public function setOrganisateur(string $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    public function getPlateforme(): ?string
    {
        return $this->plateforme;
    }

    public function setPlateforme(?string $plateforme): self
    {
        $this->plateforme = $plateforme;

        return $this;
    }

    /**
     * @return Collection|CompoEvenement[]
     */
    public function getCompoEvenements(): Collection
    {
        return $this->compoEvenements;
    }

    public function addCompoEvenement(CompoEvenement $compoEvenement): self
    {
        if (!$this->compoEvenements->contains($compoEvenement)) {
            $this->compoEvenements[] = $compoEvenement;
            $compoEvenement->addIdEvenement($this);
        }

        return $this;
    }

    public function removeCompoEvenement(CompoEvenement $compoEvenement): self
    {
        if ($this->compoEvenements->contains($compoEvenement)) {
            $this->compoEvenements->removeElement($compoEvenement);
            $compoEvenement->removeIdEvenement($this);
        }

        return $this;
    }
}
