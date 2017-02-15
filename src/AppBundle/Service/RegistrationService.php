<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Description of RegistrationService
 *
 * @author Administrateur
 */
class RegistrationService {
    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    function __construct(\Doctrine\ORM\EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function inscrire(\AppBundle\Entity\User $user){
        
        // Persiste client en DB
        
        $this->em->persist( $user );
        $this->em->flush();
        
        // Aujoute ds le journal des logs qu'un nouveau cli s'est inscrit
    }
    
    public function login($login, $password) {
        
        //$user=$this->em->getRepository('AppBundle:User')->findAll();
        
        $qb=$this->em->createQueryBuilder();
        //$qb=new \Doctrine\ORM\QueryBuilder;
        $qb->select("u");
        $qb->from("AppBundle:User", "u");
        $qb->where("u.login =:login");
        $query = $qb->getQuery();
        
        $query->setParameter("login",$login);
        
        $user = $query->getResult();
        
        if($user== NULL){
            return "wrongLogin";
        }else{
            $qb2=$this->em->createQueryBuilder();
            $qb2->select("us.role");
            $qb2->from("AppBundle:User", "us");
            $qb2->where("us.login =:login"); 
            $qb2->andWhere("us.password =:mdp");
            $query2 = $qb2->getQuery();

            $query2->setParameter("mdp",$password);
            $query2->setParameter("login",$login);
            $reponse = $query2->getResult();
            
            if($reponse){
                    $session=new Session();
                    $session->set("role", $reponse[0]['role']);
                    return "true";
                    
                }else{
                    //mauvais mot de passe
                    return "wrongPassword";
                }
        }
    }
}
