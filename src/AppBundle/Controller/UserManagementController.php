<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserManagementController extends Controller
{
    /**
     * @Route("/registration")
     */
    public function registrationAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $user = new \AppBundle\Entity\User();
        $dto = new \AppBundle\DTO\UserManagementDTO();
        $form=$this->createForm(\AppBundle\Form\RegistrationType::class, $dto);
        $form->handleRequest($req);
        
        if( $form->isSubmitted() && $form->isValid() ){
            // Délègue TAF au service
            
            $this->get("client_service")->inscrire( $client );
            return new \Symfony\Component\HttpFoundation\Response("Inscription effectuée");
        }
        
        return $this->render('AppBundle:UserManagement:registration.html.twig', array("monFormulaire"=>$form->createView()));
    }

    /**
     * @Route("/login")
     */
    public function loginAction()
    {
        return $this->render('AppBundle:UserManagement:login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction()
    {
        return $this->render('AppBundle:UserManagement:logout.html.twig', array(
            // ...
        ));
    }

}
