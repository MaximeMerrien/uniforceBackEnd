<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ActualiteRepository")
 */
class Actualite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="id_actu")
     */
    private $id_utilisateur;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->id_utilisateur;
    }

    public function addIdUtilisateur(Commentaire $idUtilisateur): self
    {
        if (!$this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur[] = $idUtilisateur;
            $idUtilisateur->setIdActu($this);
        }

        return $this;
    }

    public function removeIdUtilisateur(Commentaire $idUtilisateur): self
    {
        if ($this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur->removeElement($idUtilisateur);
            // set the owning side to null (unless already changed)
            if ($idUtilisateur->getIdActu() === $this) {
                $idUtilisateur->setIdActu(null);
            }
        }

        return $this;
    }
}
