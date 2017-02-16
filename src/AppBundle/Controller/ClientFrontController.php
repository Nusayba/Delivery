<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClientFrontController extends Controller {

    /**
     * @Route("/ajouterCommande", name="ajouterCommande")
     */
    public function ajouterCommandeAction(\Symfony\Component\HttpFoundation\Request $req) {
        $delivery = new \AppBundle\Entity\Delivery();
        $form = $this->createForm(\AppBundle\Form\DeliveryType::class, $delivery);
        $form->remove("nbKm");
        $form->remove("dateHoursDelivery");
        $form->remove("dateHoursOrder");
        $form->remove("deliveryMan");
        $form->remove("customer");
        $form->handleRequest($req);
        
        if ($form->isValid() && $form->isSubmitted()) {
            
            $delivery->setDateHoursOrder(new \DateTime());
            
            $userId = $req->getSession()->get("userId");
            
            
            $user = $this->getDoctrine()->getRepository("AppBundle:User")->find($userId);
            $user->addOrder($delivery);
            $delivery->setCustomer($user);
            
            $this->getDoctrine()->getManager()->persist($delivery);
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirect("listerCommandes");
        }

        return $this->render('AppBundle:ClientFront:ajouter_commande.html.twig', array(
                    "monFormulaire" => $form->createView()
        ));
    }

    /**
     * @Route("/listerCommandes", name="listerCommandes")
     */
    public function listerCommandesAction() {
        return $this->render('AppBundle:ClientFront:lister_commandes.html.twig', array(
                        // ...
        ));
    }

}
