<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Doctrine\ORM\Query;
use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
// use Doctrine\ORM\EntityManagerInterface;


class UpdateProductController extends Controller
{
    public function executeAction($id)
    {
        // return new JsonResponse(['a','en update '.$id]);
             $product = $this->getDoctrine()
                  ->getRepository(Product::class)
                  ->findOneById($id);



        if (!$product) {
             return new JsonResponse(['status','error','message','product not found']);
         }
             $entity_manager  = $this->getDoctrine()->getManager();

             //

          $request = Request::createFromGlobals();
          $name = $request->request->get('name');
          $price = $request->request->get('price');
          $description = $request->request->get('description');


          $product->setDescription($description);
             // $entity_manager->remove($product);
             $entity_manager->flush();
             return new JsonResponse(['dani','updated']);
    }

}