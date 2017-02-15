<?php



namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

/**
 * Description of LoginType
 *
 * @author Administrateur
 */
class LoginType extends AbstractType{
    
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->add('login')
                ->add('password1', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                ->add('submit', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }

}
