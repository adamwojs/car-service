<?php

namespace CarService\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formularz dodawania referencji.
 * 
 * @author Adam Wójs <adam@wojs.pl>
 */
class TestimonialType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('testimonial')
            ->add('customerName')
            ->add('customerEmail', 'email')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CarService\AppBundle\Entity\Testimonial'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'carservice_appbundle_testimonial';
    }

}
