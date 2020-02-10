<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $client->request(
                'POST',
                '/login',
                ['pseudo' => 'putPseudo'],
                ['password' => 'putPassword']);
    }

    public function testGetTeam()
    {
        $client = static::createClient();
        $client->request('GET', '/team');

        // Réponse sans erreur
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Renvoie un JSON
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'Le "Content-Type" doit être "application/json".'
        );

        // Renvoie uniquement les joueurs
        foreach (json_decode($client->getResponse()->getContent()) as $joueur)
        {
            $this->assertContains("ROLE_JOUEUR", $joueur->roles, 'L\'utilisateur n\'a pas le "ROLE_JOUEUR".');
        }
    }
}