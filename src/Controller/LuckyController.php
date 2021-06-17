<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/chance", name="app_lucky_number")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky_number.html.twig', [
            'number' => $number,
            'prenom' => 'Ousmane',
            'nom' => 'Diallo',
        ]);
    }

    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return new Response(
            '<html><body>Hello from LuckyController and index method</body></html>'
        );
    }
    /**
     * @Route("/contact", name="app_contact")
     */
    public function contact(): Response
    {
        return new Response(
            '<html><body>Hello from Ousmane Diallo | Mariste </body></html>'
        );
    }

    /**
     * Saluer une personne 
     * @Route("/salut/{nom}", name="app_salut")
     */
    public function salut($nom = "Inconn")
    {
        return $this->render('salut.html.twig', [
            'nom' => $nom
        ]);
    }
}
