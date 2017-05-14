<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ProductType;

class ProductsController extends Controller
{
    public function indexAction()
    {
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAll()
        ;

        return $this->render('AppBundle:Admin/Products:index.html.twig', [
            'products' => $products,
        ]);
    }

    public function editAction(Request $request, $id)
    {
        $product = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id)
        ;

        if (false === $this->isGranted('EDIT', $product)) {
            $this->addFlash('danger', 'Pas de droits, pas de chocolats.');

            return $this->redirectToRoute('admin_products_index');
        }

        $form = $this->createForm(ProductType::class, $product);

        return $this->render('AppBundle:Admin/Products:edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
}
