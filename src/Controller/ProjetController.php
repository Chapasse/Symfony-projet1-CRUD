<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    #[Route('/',name: 'home')]
    public function home(): Response
    {
        return $this->render('projet/index.html.twig');
    }

    #[Route('/projet', name: 'employe_liste')]
    #[Route("/projet/edit/{id}", name: "employe_edit")]
    public function form(EmployesRepository $repo, Request $globals, EntityManagerInterface $manager, Employes $employe = null)
    {
        $employes = $repo->findAll();
        
        if($employe == null)
        {
            $employe = new Employes;
        }
        $form = $this->createForm(EmployesType::class, $employe);

        $form->handleRequest($globals);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($employe);
            $manager->flush();

            return $this->redirectToRoute("employe_liste",[
                'id' => $employe->getId()
            ]);
        }
        return $this->renderForm("projet/index.html.twig",[
            'employes' => $employes,
            'form' => $form,
            'editMode' => $employe->getId() !== null
        ]);
    }

    #[Route("/projet/delete/{id}", name:"employe_delete")]
    public function delete(EntityManagerInterface $manager, Employes $employe)
    {
        $manager->remove($employe);
        $manager->flush();

        return $this->redirectToRoute('employe_liste');
    }

}
