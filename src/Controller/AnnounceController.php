<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Repository\AnnounceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnounceController extends AbstractController
{
    #[Route('/announces', name: 'announces_index')]
    public function index(AnnounceRepository $repo): Response
    {
        return $this->render('announce/index.html.twig', [
            'announces' => $repo->findAll()
        ]);
    }

    #[Route('/announces/{slug}', name: 'announces_show')]
    public function show(Announce $announce): Response
    {
        return $this->render('announce/show.html.twig', [
            'announce' => $announce
        ]);
    }
}
