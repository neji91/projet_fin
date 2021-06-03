<?php

namespace App\Controller;

use App\Entity\ObjetCul;
use App\Form\ObjetCulType;
use App\Repository\ObjetCulRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ObjetCulBackController extends AbstractController
{
    /**
     * @Route("/admin/objetCul/", name="objet_cul_back")
     */
    public function index(ObjetCulRepository $objetCulRepository): Response
    {
        return $this->render('back/objet_cul_back/index.html.twig', [
            'objetCuls' => $objetCulRepository->findAll() ,
        ]);
    }

    /**
     * @Route("/admin/objetCul/new", name="objetCul_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $objetCul = new ObjetCul();
        $form = $this->createForm(ObjetCulType::class, $objetCul);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objetCul);
            $entityManager->flush();

            return $this->redirectToRoute('objet_cul_back');
        }

        return $this->render('back/objet_cul_back/new.html.twig', [
            'objetCul' => $objetCul,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/objetCul/{id}", name="objetCul_show", methods={"GET"})
     */
    public function show(ObjetCul $objetCul): Response
    {
        return $this->render('back/objet_cul_back/show.html.twig', [
            'objetCul' => $objetCul,
        ]);
    }

    /**
     * @Route("/admin/objetCul/{id}/edit", name="objetCul_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjetCul $objetCul): Response
    {
        $form = $this->createForm(ObjetCulType::class, $objetCul);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objet_cul_back');
        }

        return $this->render('back/objet_cul_back/edit.html.twig', [
            'objetCul' => $objetCul,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/objetCul/{id}", name="objetCul_delete", methods={"POST"})
     */
    public function delete(Request $request, ObjetCul $objetCul): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objetCul->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objetCul);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objet_cul_back');
    }
}
