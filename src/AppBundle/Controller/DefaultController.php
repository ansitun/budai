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

        // Get Categories using category service
        $categoryService = $this->get('budai.category');
        $category = $categoryService->getAllCategory();
        
        // Render html
        return $this->render('AppBundle::index.html.twig', array('products' => $products, 'category' => $category));
    }
    
    /**
     * @Route("productDetail", name="prodectDetail")
     */
    public function productDetailAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sku = $request->query->get('sku');
        
        // Show error when sku is not valied
        if(!$sku) {
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
        $products['product']['category'] = $productService->categoryByProduct($productDetails[0]['sku']);
        $products["latest"] = $productService->customProducts('LATEST');

        // Get Categories using category service
        $categoryService = $this->get('budai.category');
        $category = $categoryService->getAllCategory();
        
        return $this->render('AppBundle::productDetail.html.twig', array('products' => $products, 'category' => $category));
    }
    
    /**
     * @Route("product", name="prodect")
     */
    public function productAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $request->query->get('category');
        $productService = $this->get('budai.product');
        
        // Get products details or return error
        $productDetails = $productService->productsByCategory($category);
        if(!$productDetails) {
            return $this->render('AppBundle::error.html.twig', array('errorCode' => 404, 'errorMsg' => 'Category Not Found'));
        }
                
        // Get Products service to show the latest products at bottom
        $products = array();
        $products['products'] = $productDetails;
        $products["latest"] = $productService->customProducts('LATEST');
        
        // Get Categories using category service
        $categoryService = $this->get('budai.category');
        $category = $categoryService->getAllCategory();
        
                
        return $this->render('AppBundle::products.html.twig', array('products' => $products, 'category' => $category));
    }
}
