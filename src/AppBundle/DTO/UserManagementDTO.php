<?php

namespace AppBundle\DTO;

use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Expression;
use Symfony\Component\Validator\Constraints\Length;
/**
 * Description of UserManagementType
 *
 * @author Administrateur
 */
class UserManagementDTO {
    private $login;
    private $firstName;
    private $lastName;
    private $role;
    /**
     * @Length(min=8, max=32, charset="utf-8", minMessage="Le mot de passe doit contenir 8 caractères minimum", maxMessage="Le mot de passe doit contenir 32 caractères au maximum", exactMessage="Mot de passe valide")
     */
    private $password1;
    private $password2;
    
    function getLogin() {
        return $this->login;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getRole() {
        return $this->role;
    }

    function getPassword1() {
        return $this->password1;
    }

    function getPassword2() {
        return $this->password2;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setPassword1($password1) {
        $this->password1 = $password1;
    }

    function setPassword2($password2) {
        $this->password2 = $password2;
    }

    /**
     * @Callback
     * @param \Symfony\Component\Validator\Context\ExecutionContextInterface $context
     * @param type $payload
     */
    public function maCallback(\Symfony\Component\Validator\Context\ExecutionContextInterface $context, $payload){
        if($this->password2){
            if($this->password1!=$this->password2){
                $context->buildViolation("Les mots de passes doivent être identiques")->addViolation();
            }
        }
    }
    
}
