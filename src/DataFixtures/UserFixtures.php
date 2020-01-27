<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Acutalite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    const NUMBER_OF_USERS = 100;

	private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $status = array('En Ligne', 'Hors Ligne', 'Absent', 'Occupé');
        $roles = array('ROLE_ADMIN', 'ROLE_UTILISATEUR', 'ROLE_JOUEUR', 'ROLE_MODO');

        for ($i = 1; $i <= self::NUMBER_OF_USERS; $i++) {
            $user = $this->createUser($faker->unique()->firstName(), [$faker->randomElement($roles)], 'root', $faker->lastName(), $faker->firstName(), new \DateTime($faker->date()), $faker->safeEmail(), $faker->address(), $faker->randomElement($status), $faker->sentence(), $faker->firstName());

            $this->addReference(Utilisateur::class.$i, $user);

            $manager->persist($user);
        }

        $manager->flush();
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
