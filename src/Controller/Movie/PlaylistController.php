<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class PlaylistController extends AbstractController
{
    #[Route('/playlists', name: 'app_playlists')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        $user = $this->getUser();
        //$playlists = $user->getPlaylists();

        return $this->render('playlist/index.html.twig', [
           // 'playlists' => $playlists
        ]);
    }
}