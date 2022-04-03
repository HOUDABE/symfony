<?php

namespace App\Controller;

use App\Form\TvaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TvaController extends AbstractController
{
    #[Route('/tva', name: 'app_tva')]
   
     public function index(Request $request): Response
        {
             // on créé un formulaire de type contact Form/ContactType
            $formulaire=$this->createForm(TvaType::class);
            $formulaire->handleRequest($request);
    
            if ($formulaire->isSubmitted()){
                $data=$formulaire->getData();
              $tva=$data["prix"]*1.2;
    
            return $this->renderForm('tva/tva.html.twig', [
                
                "data" =>$data,
                "tva" =>$tva
        
            ]);
            }
         else{
           
            return $this->renderForm('tva/index.html.twig', [
                
                "form" =>$formulaire
                
    
            ]);
        }
    }
    }
    