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
            'stores' => $stores,'user'=>$this->getUser(),
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
        $store->setEtat(0);
        if ($form->isSubmitted() && $form->isValid()) {

            $store->setUpdatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($store);
            $em->flush();

            return $this->redirectToRoute('store_new');
        }

        return $this->render('store/new.html.twig', array(
            'store' => $store,
            'form' => $form->createView(),
            'stores' => $stores,
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

        $editForm = $this->createForm('Frontend\StoreBundle\Form\StoreType', $store);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $store->setUpdatedAt(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('store_new', array('id' => $store->getId()));
        }

        return $this->render('store/edit.html.twig', array(
            'store' => $store,
            'edit_form' => $editForm->createView(),

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
