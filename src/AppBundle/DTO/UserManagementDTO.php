<?php

namespace AppBundle\DTO;

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


    
}
