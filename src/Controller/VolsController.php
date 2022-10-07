<?php


namespace App\Controller;
use App\Entity\Companie;
use App\Entity\Offre;
use App\Form\VolsType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VolsController extends AbstractController
{
    #[Route('/vols', name: 'vols')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {

           $offre= new Offre();
        
        
            $form=$this->createForm(VolsType::class,$offre);          

            
           $form->handleRequest($request);

           if ($form->isSubmitted() && $form->isValid()){   
             
             
        
               $entityManager->persist($offre);
               $entityManager->flush();
           }

           return $this->render('vols/index.html.twig', [
            'form' => $form->createView()
        ]);


        
    }
}
