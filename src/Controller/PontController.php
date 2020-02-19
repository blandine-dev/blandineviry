<?php

namespace App\Controller;

use App\Entity\Pont;
use App\Form\PontType;
use App\Repository\PontRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class PontController extends AbstractController
{
    /**
     * @Route("/", name="pont_index", methods={"GET"})
     */
    public function index(PontRepository $pontRepository): Response
    {
        return $this->render('pont/index.html.twig', [
            'ponts' => $pontRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pont_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pont = new Pont();
        $form = $this->createForm(PontType::class, $pont);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pont);
            $entityManager->flush();

            return $this->redirectToRoute('pont_index');
        }

        return $this->render('pont/new.html.twig', [
            'pont' => $pont,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pont_show", methods={"GET"})
     */
    public function show(Pont $pont): Response
    {
        return $this->render('pont/show.html.twig', [
            'pont' => $pont,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pont_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pont $pont): Response
    {
        $form = $this->createForm(PontType::class, $pont);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pont_index');
        }

        return $this->render('pont/edit.html.twig', [
            'pont' => $pont,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pont_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pont $pont): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pont->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pont);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pont_index');
    }
}
