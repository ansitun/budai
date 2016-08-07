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
        // Get Products service
        $productService = $this->get('budai.product');
   
        // Add details into products array
        $products = array();
        $products["featured"] = $productService->customProducts('FEATURED');
        $products["latest"] = $productService->customProducts('LATEST');
                
        // Render html
        return $this->render('AppBundle::index.html.twig', array('products' => $products));
    }
    
    /**
     * @Route("productDetails", name="prodectDetails")
     */
    public function productDetailsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sku = $request->query->get('sku');
        
        // Show error when sku is not valied
        if(!$sku || !is_numeric($sku)) {
            return $this->render('AppBundle::error.html.twig', array('errorCode' => 404, 'errorMsg' => 'Product Not Found'));
        }
        
        // Get products details or return error
        $productDetails = $em->getRepository('AppBundle:Product')->getProductsBySku($sku);
        if(!$productDetails) {
            return $this->render('AppBundle::error.html.twig', array('errorCode' => 404, 'errorMsg' => 'Product Not Found'));
        }
        
        // Get Products service to show the latest products at bottom
        $productService = $this->get('budai.product');
        $products = array();
        $products['product'] = $productDetails[0];
        $products["latest"] = $productService->customProducts('LATEST');
                
        return $this->render('AppBundle::productDetail.html.twig', array('products' => $products));
    }
}
