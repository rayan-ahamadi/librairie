<?php

namespace App\Controller;

use App\Form\LivreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Component\HttpFoundation\Request;

class LivresController extends AbstractController
{


    #[Route('/', name: 'app_livre')]
    public function index(): Response
    {
        return $this->render('livres/index.html.twig');
    }



    #[Route('/livres', name: 'app_livres')]
    public function read(LivreRepository $livresRepository): Response
    {
        return $this->render('livres/livres.html.twig', ['livres' => $livresRepository->findAll()]);
    }

    #[Route('/livres/new', name:'new_livre')]
    public function create(Request $request,EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LivreType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // Enregistrer l'article dans la base de données
           $livre = $form->getData();
           $entityManager->persist($livre);
           $entityManager->flush(); 
           return $this->redirectToRoute('app_livres');
        }
        return $this->render('livres/create.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/livre/{id}/delete', name:'delete_livre')]
    public function delete(Request $request,LivreRepository $livreRepository, EntityManagerInterface $entityManager): Response
    {
        $livre = $livreRepository->find($request->get('id'));
        $entityManager->remove($livre);
        $entityManager->flush();
        return $this->redirectToRoute('app_livres');
    }

    #[Route('/livre/{id}/edit', name:'edit_livre',methods: ['GET', 'POST'])]
    public function edit(Request $request,LivreRepository $livreRepository,EntityManagerInterface $entityManager): Response
    {
        $livre = $livreRepository->find($request->get('id'));
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('app_livres');
        }
        return $this->render('livres/edit.html.twig', ['form' => $form->createView()]);
    }   

}
 