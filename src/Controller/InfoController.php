<?php

namespace App\Controller;

use App\Service\Mail;
use App\Form\InfoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfoController extends AbstractController
{
    #[Route('/info', name: 'app_info')]
    public function index(Mail $mail, Request $request): Response
    { 
        $formulaire = $this->createForm(InfoType::class);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {

            $task = $formulaire->getData();   
            
            $mail->envoie($task['email'], $task['numberGuests'], $task['message']);
    

            return $this->render('info/info_envoye.html.twig', 
            [ 'data' => $task ]);


}

        return $this->renderForm('info/index.html.twig', [
            'controller_name' => 'InfoController',
            'Formulaire' => $formulaire
        ]);
    
}
} 
