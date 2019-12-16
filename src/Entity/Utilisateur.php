<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @ApiResource
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudoJoueur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CompoJeu", mappedBy="id_utilisateur")
     */
    private $compoJeus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Palmares", inversedBy="id_utilisateur")
     */
    private $palmares;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CompoEquipe", mappedBy="id_utilisateur")
     */
    private $compoEquipes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Evenement", mappedBy="id_utilisateur")
     */
    private $evenements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompoEvenement", mappedBy="id_utilisateur")
     */
    private $compoEvenements;

    public function __construct()
    {
        $this->compoJeus = new ArrayCollection();
        $this->compoEquipes = new ArrayCollection();
        $this->evenements = new ArrayCollection();
        $this->compoEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->pseudo;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getPseudoJoueur(): ?string
    {
        return $this->pseudoJoueur;
    }

    public function setPseudoJoueur(?string $pseudoJoueur): self
    {
        $this->pseudoJoueur = $pseudoJoueur;

        return $this;
    }

    /**
     * @return Collection|CompoJeu[]
     */
    public function getCompoJeus(): Collection
    {
        return $this->compoJeus;
    }

    public function addCompoJeus(CompoJeu $compoJeus): self
    {
        if (!$this->compoJeus->contains($compoJeus)) {
            $this->compoJeus[] = $compoJeus;
            $compoJeus->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeCompoJeus(CompoJeu $compoJeus): self
    {
        if ($this->compoJeus->contains($compoJeus)) {
            $this->compoJeus->removeElement($compoJeus);
            $compoJeus->removeIdUtilisateur($this);
        }

        return $this;
    }

    public function getPalmares(): ?Palmares
    {
        return $this->palmares;
    }

    public function setPalmares(?Palmares $palmares): self
    {
        $this->palmares = $palmares;

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
            $compoEquipe->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeCompoEquipe(CompoEquipe $compoEquipe): self
    {
        if ($this->compoEquipes->contains($compoEquipe)) {
            $this->compoEquipes->removeElement($compoEquipe);
            $compoEquipe->removeIdUtilisateur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->contains($evenement)) {
            $this->evenements->removeElement($evenement);
            $evenement->removeIdUtilisateur($this);
        }

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
            $compoEvenement->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeCompoEvenement(CompoEvenement $compoEvenement): self
    {
        if ($this->compoEvenements->contains($compoEvenement)) {
            $this->compoEvenements->removeElement($compoEvenement);
            // set the owning side to null (unless already changed)
            if ($compoEvenement->getIdUtilisateur() === $this) {
                $compoEvenement->setIdUtilisateur(null);
            }
        }

        return $this;
    }
}
