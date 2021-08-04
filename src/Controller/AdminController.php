<?php

namespace App\Controller;

use App\Repository\AnnounceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/stat', name: 'admin_stat')]
    public function stat(AnnounceRepository $repo): Response
    {
        $announces = $repo->groupAnnounceByDate();

        $announcesMonth = [];
        $announcesCount = [];

        foreach ($announces as $announce) {
            $announcesMonth[] = $announce['announceMonth'];
            $announcesCount[] = $announce['count'];
        }
        return $this->render('admin/stat.html.twig', [
            'announcesMonth' => json_encode($announcesMonth),
            'announcesCount' => json_encode($announcesCount)
        ]);
    }
}
