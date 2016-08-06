<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $productService = $this->get('budai.product');
        
        $products = $productService->homeProducts();
        
        //ladybug_dump_die($products['featured']);
        
        return $this->render('AppBundle::index.html.twig', array('products' => $products));
    }
}
