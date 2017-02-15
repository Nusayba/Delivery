<?php

namespace AppBundle\Service;

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
}
