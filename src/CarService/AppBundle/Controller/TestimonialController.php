<?php

namespace CarService\AppBundle\Controller;

use CarService\AppBundle\Entity\Testimonial;
use CarService\AppBundle\Form\TestimonialType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Testimonial controller.
 *
 * @author Adam Wójs <adam@wojs.pl>
 * 
 * @Route("/testimonial")
 */
class TestimonialController extends Controller {

    /**
     * Lists all Testimonial entities.
     *
     * @Route("/", name="testimonial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CarServiceAppBundle:Testimonial')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Testimonial entity.
     *
     * @Route("/", name="testimonial_create")
     * @Method("POST")
     * @Template("CarServiceAppBundle:Testimonial:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Testimonial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('testimonial'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Testimonial entity.
     *
     * @param Testimonial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Testimonial $entity) {
        $form = $this->createForm(new TestimonialType(), $entity, array(
            'action' => $this->generateUrl('testimonial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Testimonial entity.
     *
     * @Route("/new", name="testimonial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Testimonial();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }
}
