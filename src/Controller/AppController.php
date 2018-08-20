<?php

namespace App\Controller;

use App\Entity\Projets;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {

        $repo = $this->getDoctrine()
        ->getRepository(Projets::class);
        $projets = $repo->findAll();

        return $this->render('app/index.html.twig',[
            
            "projets" => $projets

        ]);
    }
}
