<?php

namespace App\Controller;

use App\Entity\Region;
use App\Form\RegionType;
use App\Repository\RegionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegionBackController extends AbstractController
{
    /**
     * @Route("/admin/region", name="region_back")
     */
    public function index(RegionRepository $RegionRepository): Response
    {
        return $this->render('back/region_back/index.html.twig', [
            'regions' => $RegionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/region/new", name="region_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $region = new Region();
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($region);
            $entityManager->flush();

            return $this->redirectToRoute('region_back');
        }

        return $this->render('back/region_back/new.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/region/{id}", name="region_show", methods={"GET"})
     */
    public function show(Region $region): Response
    {
        return $this->render('back/region_back/show.html.twig', [
            'region' => $region,
        ]);
    }

    /**
     * @Route("/admin/region/{id}/edit", name="region_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Region $region): Response
    {
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('region_back');
        }

        return $this->render('back/region_back/edit.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/region/{id}", name="region_delete", methods={"POST"})
     */
    public function delete(Request $request, Region $region): Response
    {
        if ($this->isCsrfTokenValid('delete'.$region->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($region);
            $entityManager->flush();
        }

        return $this->redirectToRoute('region_back');
    }
}
