<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class UserManagementController extends Controller
{
    /**
     * @Route("/registration")
     */
    public function registrationAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        
        $dto = new \AppBundle\DTO\UserManagementDTO();
        
        $form=$this->createForm(\AppBundle\Form\RegistrationType::class, $dto);
        $form->handleRequest($req);
        
        if( $form->isSubmitted() && $form->isValid() ){
            $user = new \AppBundle\Entity\User();
            // Délègue TAF au service
            $user->setLogin($dto->getLogin());
            $user->setPassword($dto->getPassword1());
            $user->setFirstName($dto->getFirstName());
            $user->setLastName($dto->getLastName());
            $user->setRole($dto->getRole());
            
            $this->get("registration_service")->inscrire($user);
            return new \Symfony\Component\HttpFoundation\Response("Inscription effectuée");
        }
        
        return $this->render('AppBundle:UserManagement:registration.html.twig', array("monFormulaire"=>$form->createView()));
    }

    /**
     * @Route("/login")
     */
    public function loginAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\UserManagementDTO();
        
        $form=$this->createForm(\AppBundle\Form\LoginType::class, $dto);
        $form->handleRequest($req);
        
        if( $form->isSubmitted() && $form->isValid() ){
            
            // Délègue TAF au service
            $login=$dto->getLogin();
            $password=$dto->getPassword1();
            
            $reponse=$this->get("registration_service")->login($login, $password);
            
            if($reponse=="wrongLogin"){
                return $this->render('AppBundle:UserManagement:login.html.twig', array("monFormulaire"=>$form->createView(), "message"=>"mauvais login"));
                
            }elseif ($reponse=="wrongPassword") {
                return $this->render('AppBundle:UserManagement:login.html.twig', array("monFormulaire"=>$form->createView(), "message"=>"mauvais mot de passe"));
            }
            return $this->redirectToRoute("homepage");
        }
        
        return $this->render('AppBundle:UserManagement:login.html.twig', array("monFormulaire"=>$form->createView()));
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
