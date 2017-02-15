<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Description of Registration
 *
 * @author Administrateur
 */
class RegistrationType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('login')
                ->add('firstName')
                ->add('lastName')
                ->add('role', ChoiceType::class, array('choices' => array(
                        'Role' => array(
                            'client' => 'ROLE_CUSTOMER',
                            'livreur' => 'ROLE_DELIVERYMAN',
                        ))))
                ->add('password1', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                ->add('password2', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                ->add('submit', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }

}
