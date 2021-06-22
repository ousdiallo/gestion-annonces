<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnounceController extends AbstractController
{
    #[Route('/announce', name: 'announce')]
    public function index(): Response
    {
        return $this->render('announce/index.html.twig', []);
    }
}