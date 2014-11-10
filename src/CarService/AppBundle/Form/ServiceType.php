<?php

namespace CarService\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formularz tworzenia/edycji usługi.
 * 
 * @author Adam Wójs <adam@wojs.pl>
 */
class ServiceType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('group', 'entity', array(
                'class' => 'CarServiceAppBundle:ServiceGroup'
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CarService\AppBundle\Entity\Service'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'carservice_appbundle_service';
    }

}
