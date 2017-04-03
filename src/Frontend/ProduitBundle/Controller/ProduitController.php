<?php

namespace Frontend\ProduitBundle\Controller;

use EntityBundle\Entity\Produit;
use EntityBundle\Entity\CommentaireProduit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DateTime;

/**
 * Produit controller.
 *
 */
class ProduitController extends Controller
{
    /**
     * Lists all produit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('EntityBundle:Produit')->findAll();

        return $this->render('produit/index.html.twig', array(
            'produits' => $produits,
        ));
    }

    /**
     * Creates a new produit entity.
     *
     */
    public function newAction(Request $request)
    {
        $produit = new Produit();
        $form = $this->createForm('Frontend\ProduitBundle\Form\ProduitType', $produit);
        $form->handleRequest($request);

        $id= $request->get('id');
        $produit->setStore($id);
        $produit->setLikes(0);

        $now=new DateTime();
        $now->format('d-m-y');
        $produit->setDate($now);


        if ($form->isSubmitted() && $form->isValid()) {

            $produit->setUpdatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produit_show', array('id' => $produit->getStore()));
        }



        return $this->render('produit/new.html.twig', array(
            'produit' => $produit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a produit entity.
     *
     */
    public function showAction(Request $request)
    {
        $id=$request->get('id');

        $em = $this->getDoctrine()->getManager();


        $queryForListProduit = $em->createQuery("select p from EntityBundle\Entity\Produit p where p.store = $id");
        $produit = $queryForListProduit->getResult();

        $repository = $this->getDoctrine()->getRepository('EntityBundle:Produit');

        $repository2 = $this->getDoctrine()->getRepository('EntityBundle:Store');

        $storeRec=$repository2->findOneBy(array('id'=>$id));
        $UserRec=$storeRec->getUser();


        // query for a single product matching the given name and price

        if(isset($_GET['like']))
        { $idp= $_GET['idp'];
            $m = $repository->findOneBy(array('id'=>$idp));

            $em = $this->getDoctrine()->getManager();
            $prod = $em->getRepository('EntityBundle:Produit')->find($m);

            $prod->setLikes($_GET['like']+1);
            $em->persist($prod);
            $em->flush();}


        //commentaire section //////////////////////////////////////////////////
        $com = new CommentaireProduit();
        $now=new DateTime();
        $now->format('d-m-y');
        $com->setDate($now);
        $com->setProduit($request->get('id'));
        if($request->isMethod("POST"))
        {
            $commentaire= $request->get('contenuh');
            $com->setCommentaire($commentaire);
            $em = $this->getDoctrine()->getManager();
            $em->persist($com);
            $em->flush();

            return $this->redirectToRoute('produit_show', array('id' => $request->get('id')));
        }
        return $this->render('produit/show.html.twig', array(
            'produit' => $produit,
            'UserRec'=> $UserRec,
        ));

    }

    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function editAction(Request $request, Produit $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);
        $editForm = $this->createForm('Frontend\ProduitBundle\Form\ProduitType', $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produit_show', array('id' => $produit->getStore()));
        }

        return $this->render('produit/edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EntityBundle:Produit')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($produit);
        $em->flush();
        return $this->redirectToRoute('produit_show', array('id' => $produit->getStore()));

    }

    /**
     * Creates a form to delete a produit entity.
     *
     * @param Produit $produit The produit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produit $produit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produit_delete', array('id' => $produit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
