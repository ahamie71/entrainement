<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\HomeType;
use App\Entity\Welcome;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name:'home')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {

           $offre= new Offre();
        
        
            $form=$this->createForm(HomeType::class,$offre);          

            
           $form->handleRequest($request);

           if ($form->isSubmitted() && $form->isValid()){   
             
             
        
               $entityManager->persist($offre);
               $entityManager->flush();
           }

           return $this->render('home/index.html.twig', [
            'form' => $form->createView()
        ]);


        
    }
}
