<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Form\DepartementType;
use App\Repository\DepartementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DepartementBackController extends AbstractController
{
    /**
     * @Route("/admin/departement/", name="departement_back")
     */
    public function index(DepartementRepository $departementRepository): Response
    {
        
        return $this->render('back/departement_back/index.html.twig', [
            'departements' => $departementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/departement/new", name="departement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $departement = new Departement();
        $form = $this->createForm(DepartementType::class, $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($departement);
            $entityManager->flush();

            return $this->redirectToRoute('departement_back');
        }

        return $this->render('back/departement_back/new.html.twig', [
            'departement' => $departement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/departement/{id}", name="departement_show", methods={"GET"})
     */
    public function show(Departement $departement): Response
    {
        return $this->render('back/departement_back/show.html.twig', [
            'departement' => $departement,
        ]);
    }

    /**
     * @Route("/admin/departement/{id}/edit", name="departement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Departement $departement): Response
    {
        $form = $this->createForm(departementType::class, $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('departement_back');
        }

        return $this->render('back/departement_back/edit.html.twig', [
            'departement' => $departement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/departement/{id}", name="departement_delete", methods={"POST"})
     */
    public function delete(Request $request, Departement $departement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$departement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($departement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('departement_back');
    }
}
