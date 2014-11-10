<?php

namespace CarService\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formularz tworzenia/edycji grupy usług.
 * 
 * @author Adam Wójs <adam@wojs.pl>
 */
class ServiceGroupType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name')
            ->add('description')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CarService\AppBundle\Entity\ServiceGroup'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'carservice_appbundle_servicegroup';
    }

}
