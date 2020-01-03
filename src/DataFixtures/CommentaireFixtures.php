<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Commentaire;
use App\Entity\Actualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentaireFixtures extends Fixture implements DependentFixtureInterface
{
    const NUMBER_OF_COMMENTS = 150;

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= self::NUMBER_OF_COMMENTS; $i++) {
            $commentaire = $this->createCommentaire(new \DateTime($faker->date()." ".$faker->time()), $faker->sentence(), $this->getReference(Utilisateur::class.rand(1, UserFixtures::NUMBER_OF_USERS)), $this->getReference(Actualite::class.rand(1, ActualiteFixtures::NUMBER_OF_ACTUS)));

            $manager->persist($commentaire);
        }

        $manager->flush();
    }

    private function createCommentaire($date, $contenu, $user, $actualite)
    {
        $commentaire = new Commentaire();

        $commentaire->setDate($date);
        $commentaire->setContenu($contenu);
        $commentaire->setUtilisateur($user);
        $commentaire->setActualite($actualite);

        $actualite->addCommentaire($commentaire);

        return $commentaire;
    }

    public function getDependencies()
    {
        return array(
            ActualiteFixtures::class,
        );
    }
}
