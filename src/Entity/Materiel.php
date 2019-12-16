<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MaterielRepository")
 */
class Materiel
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
    private $nom_materiel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_achat;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     */
    private $lieu_stockage;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     */
    private $specs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $infos;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dispo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modele;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMateriel(): ?string
    {
        return $this->nom_materiel;
    }

    public function setNomMateriel(string $nom_materiel): self
    {
        $this->nom_materiel = $nom_materiel;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getLieuStockage(): ?string
    {
        return $this->lieu_stockage;
    }

    public function setLieuStockage(string $lieu_stockage): self
    {
        $this->lieu_stockage = $lieu_stockage;

        return $this;
    }

    public function getSpecs(): ?string
    {
        return $this->specs;
    }

    public function setSpecs(string $specs): self
    {
        $this->specs = $specs;

        return $this;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getDispo(): ?string
    {
        return $this->dispo;
    }

    public function setDispo(?string $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }
}
