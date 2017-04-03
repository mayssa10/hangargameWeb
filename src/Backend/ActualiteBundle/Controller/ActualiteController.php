<?php

namespace Backend\ActualiteBundle\Controller;

use EntityBundle\Entity\Actualite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Actualite controller.
 *
 */
class ActualiteController extends Controller
{
    /**
     * Lists all actualite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actualites = $em->getRepository('EntityBundle:Actualite')->findAll();

        return $this->render('actualite/index.html.twig', array(
            'actualites' => $actualites,
        ));
    }

    /**
     * Creates a new actualite entity.
     *
     */
    public function newAction(Request $request)
    {
        $actualite = new Actualite();
        $form = $this->createForm('Backend\ActualiteBundle\Form\ActualiteType', $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $actualite->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('actualite_directory'), $fileName
            );
            $actualite->setImage($fileName);




            $em = $this->getDoctrine()->getManager();
            $em->persist($actualite);
            $em->flush();

            return $this->redirectToRoute('actualite_index', array('id' => $actualite->getId()));
        }

        return $this->render('actualite/new.html.twig', array(
            'actualite' => $actualite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actualite entity.
     *
     */
    public function showAction(Request $request )
    {

        $em  = $this->getDoctrine()->getManager();
        $dql   = "SELECT a FROM EntityBundle:Actualite a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('actualite/index.html.twig', array(
            'pagination' => $pagination,

        ));
    }

    /**
     * Displays a form to edit an existing actualite entity.
     *
     */
    public function editAction(Actualite $actualite ,Request $request )
    {
        $deleteForm = $this->createDeleteForm($actualite);
        $editForm = $this->createForm('Backend\ActualiteBundle\Form\ActualiteType', $actualite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $actualite->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('actualite_directory'), $fileName
            );
            $actualite->setImage($fileName);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actualite_index', array());
        }

        return $this->render('actualite/edit.html.twig', array(
            'actualite' => $actualite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actualite entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $actualite = $em->getRepository('EntityBundle:Actualite')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($actualite);
        $em->flush();
        return $this->redirectToRoute('actualite_index');
    }



    /**
     * Creates a form to delete a actualite entity.
     *
     * @param Actualite $actualite The actualite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Actualite $actualite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actualite_delete', array('id' => $actualite->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
