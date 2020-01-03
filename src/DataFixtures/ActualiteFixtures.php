<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Actualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActualiteFixtures extends Fixture implements DependentFixtureInterface
{
    const NUMBER_OF_ACTUS = 20;

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= self::NUMBER_OF_ACTUS; $i++) {
            $actualite = $this->createActualite(new \DateTime($faker->date()." ".$faker->time()), $faker->sentence(), $faker->sentence(), $this->getReference(Utilisateur::class.rand(1, UserFixtures::NUMBER_OF_USERS)));

            $this->addReference(Actualite::class.$i, $actualite);

            $manager->persist($actualite);
        }

        $manager->flush();
    }

    private function createActualite($date, $titre, $description, $user)
    {
        $actualite = new Actualite();

        $actualite->setDate($date);
        $actualite->setTitre($titre);
        $actualite->setDescription($description);
        $actualite->setUtilisateur($user);
        
        $user->addActualite($actualite);

        return $actualite;
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
