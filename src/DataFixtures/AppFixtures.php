<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
	private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Création d'utilisateurs différents
        foreach ($this->getUserData() as [$pseudo, $roles, $password, $nom, $prenom, $dateNaissance, $mail, $adresse, $statut,
        	$niveau, $pseudoJoueur]) {

            $user = $this->createUser($pseudo, $roles, $password, $nom, $prenom, $dateNaissance, $mail, $adresse, $statut,
            	$niveau, $pseudoJoueur);

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            ['Legna', ['ROLE_ADMIN'], 'groot', 'Merrien', 'Maxime', new \DateTime('1997-09-20'), 'maxime.merrien@imie.fr', '1 Rue Olivier de Serres', 'En Ligne', 'Meilleur joueur du monde', '[ZS]-[Legna]'],
            ['MlleClairounette', ['ROLE_USER'], 'motdepasse', 'Lejeune', 'Claire', new \DateTime('1992-05-24'), 'claire.lejeune@imie.fr', 'Acigné', 'Hors Ligne', 'Meilleure cuisine de l\'univers', 'MmeClaire'],
        ];
    }

    private function createUser($pseudo, $roles, $password, $nom, $prenom, $dateNaissance, $mail, $adresse, $statut, $niveau,
    	$pseudoJoueur)
    {
        $user = new Utilisateur();

        $user->setPseudo($pseudo);
        $user->setRoles($roles);
        $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setDateNaissance($dateNaissance);
        $user->setMail($mail);
        $user->setAdresse($adresse);
        $user->setStatut($statut);
        $user->setNiveau($niveau);
        $user->setPseudoJoueur($pseudoJoueur);

        return $user;
    }
}
