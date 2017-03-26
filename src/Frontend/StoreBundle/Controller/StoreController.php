<?php

namespace Frontend\StoreBundle\Controller;

use EntityBundle\Entity\Store;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Store controller.
 *
 */
class StoreController extends Controller
{
    /**
     * Lists all store entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stores = $em->getRepository('EntityBundle:Store')->findAll();

        return $this->render('store/index.html.twig', array(
            'stores' => $stores,
        ));
    }

    /**
     * Creates a new store entity.
     *
     */
    public function newAction(Request $request)
    {
        $store = new Store();
        $form = $this->createForm('Frontend\StoreBundle\Form\StoreType', $store);
        $form->handleRequest($request);
        $store->setUser($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $stores = $em->getRepository('EntityBundle:Store')->findBy(array('user'=>$this->getUser()));
        $nb = count($stores);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $store->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('bugs_directory'), $fileName
            );
            $store->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($store);
            $em->flush();

            return $this->redirectToRoute('store_new');
        }

        return $this->render('store/new.html.twig', array(
            'store' => $store,
            'form' => $form->createView(),'stores' => $stores,
            'nbElements'=>$nb,
        ));
    }

    /**
     * Finds and displays a store entity.
     *
     */
    public function showAction(Store $store)
    {
        $deleteForm = $this->createDeleteForm($store);

        return $this->render('store/show.html.twig', array(
            'store' => $store,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing store entity.
     *
     */
    public function editAction(Request $request, Store $store)
    {
        $deleteForm = $this->createDeleteForm($store);
        $editForm = $this->createForm('Frontend\StoreBundle\Form\StoreType', $store);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('store_edit', array('id' => $store->getId()));
        }

        return $this->render('store/edit.html.twig', array(
            'store' => $store,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a store entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $store = $em->getRepository('EntityBundle:Store')->find($id);
            $em = $this->getDoctrine()->getManager();
            $em->remove($store);
            $em->flush();
        return $this->redirectToRoute('store_new');
    }

    /**
     * Creates a form to delete a store entity.
     *
     * @param Store $store The store entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Store $store)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('store_delete', array('id' => $store->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
