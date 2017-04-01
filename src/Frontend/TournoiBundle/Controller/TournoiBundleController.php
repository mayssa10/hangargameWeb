<?php

namespace Frontend\TournoiBundle\Controller;

use EntityBundle\Entity\Tournoi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tournoi controller.
 *
 */
class TournoiController extends Controller
{
    /**
     * Lists all tournoi entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tournois = $em->getRepository('EntityBundle:Tournoi')->findAll();

        return $this->render('tournoi/index.html.twig', array(
            'tournois' => $tournois,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     */
    public function newAction(Request $request)
    {
        $tournoi = new Tournoi();
        $form = $this->createForm('Frontend\TournoiBundle\Form\TournoiType', $tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tournoi);
            $em->flush();

            return $this->redirectToRoute('tournoi_show', array('id' => $tournoi->getId()));
        }

        return $this->render('tournoi/new.html.twig', array(
            'tournoi' => $tournoi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tournoi entity.
     *
     */
    public function showAction(Tournoi $tournoi)
    {
        $deleteForm = $this->createDeleteForm($tournoi);

        return $this->render('tournoi/show.html.twig', array(
            'tournoi' => $tournoi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     */
    public function editAction(Request $request, Tournoi $tournoi)
    {
        $deleteForm = $this->createDeleteForm($tournoi);
        $editForm = $this->createForm('Frontend\TournoiBundle\Form\TournoiType', $tournoi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tournoi_edit', array('id' => $tournoi->getId()));
        }

        return $this->render('tournoi/edit.html.twig', array(
            'tournoi' => $tournoi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tournoi entity.
     *
     */
    public function deleteAction(Request $request, Tournoi $tournoi)
    {
        $form = $this->createDeleteForm($tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tournoi);
            $em->flush();
        }

        return $this->redirectToRoute('evenement_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Tournoi $tournoi The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tournoi $tournoi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tournoi_delete', array('id' => $tournoi->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}