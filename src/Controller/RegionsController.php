<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Region;
use App\Entity\SuperRegion;

class RegionsController extends AbstractController
{
    /**
     * @Route("/regions/{id}", name="regions")
     */
    public function index($id): Response
    {

        $superRegion = $this->getDoctrine()->getRepository(SuperRegion::class)->findOneBy(["nomBdd"=>$id]);
        return $this->render('regions/index.html.twig', [
            'superRegion' => $superRegion
        ]);

    
    }
    /**
     * @Route("/region/{nom}", name="region")
     */
    public function region($nom): Response
    {

        $region = $this->getDoctrine()->getRepository(Region::class)->findOneBy(["nom_bdd"=>$nom]);
        // dd($region);
        return $this->render('regions/region.html.twig', [
            'region' => $region
        ]);

       
    }

}


