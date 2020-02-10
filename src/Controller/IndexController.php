<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    /* public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    } */

    /**
     * @Route("/team", name="team")
     */
    public function team(UtilisateurRepository $utilisateurRepository)
    {
        $joueurs = $utilisateurRepository->findByRole('["ROLE_JOUEUR"]');
        return $this->json($joueurs);
    }
}
