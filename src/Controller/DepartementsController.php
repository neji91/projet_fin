<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartementsController extends AbstractController
{
    /**
     * @Route("/departements", name="departements")
     */
    public function index(): Response
    {
        return $this->render('departements/index.html.twig', [
            'controller_name' => 'DepartementsController',
        ]);
    }
}
