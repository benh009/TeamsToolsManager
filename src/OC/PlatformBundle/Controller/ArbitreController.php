<?php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Arbitre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Arbitre controller.
 *
 * @Route("arbitre")
 */
class ArbitreController extends Controller
{
    /**
     * Lists all arbitre entities.
     *
     * @Route("/", name="arbitre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $arbitres = $em->getRepository('OCPlatformBundle:Arbitre')->findAll();

        return $this->render('arbitre/index.html.twig', array(
            'arbitres' => $arbitres,
        ));
    }

    /**
     * Creates a new arbitre entity.
     *
     * @Route("/new", name="arbitre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $arbitre = new Arbitre();
        $form = $this->createForm('OC\PlatformBundle\Form\ArbitreType', $arbitre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($arbitre);
            $em->flush();

            return $this->redirectToRoute('arbitre_show', array('id' => $arbitre->getId()));
        }

        return $this->render('arbitre/new.html.twig', array(
            'arbitre' => $arbitre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a arbitre entity.
     *
     * @Route("/{id}", name="arbitre_show")
     * @Method("GET")
     */
    public function showAction(Arbitre $arbitre)
    {
        $deleteForm = $this->createDeleteForm($arbitre);

        return $this->render('arbitre/show.html.twig', array(
            'arbitre' => $arbitre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing arbitre entity.
     *
     * @Route("/{id}/edit", name="arbitre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Arbitre $arbitre)
    {
        $deleteForm = $this->createDeleteForm($arbitre);
        $editForm = $this->createForm('OC\PlatformBundle\Form\ArbitreType', $arbitre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('arbitre_edit', array('id' => $arbitre->getId()));
        }

        return $this->render('arbitre/edit.html.twig', array(
            'arbitre' => $arbitre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a arbitre entity.
     *
     * @Route("/{id}", name="arbitre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Arbitre $arbitre)
    {
        $form = $this->createDeleteForm($arbitre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($arbitre);
            $em->flush();
        }

        return $this->redirectToRoute('arbitre_index');
    }

    /**
     * Creates a form to delete a arbitre entity.
     *
     * @param Arbitre $arbitre The arbitre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Arbitre $arbitre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arbitre_delete', array('id' => $arbitre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
