<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Doctrine\ORM\Query;
use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CreateProductController extends Controller
{
    public function executeAction()
    {
        $request = Request::createFromGlobals();
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $description = $request->request->get('description');

        $entity_manager  = $this->getDoctrine()->getManager();
        $product = new Product();

        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);

        try {

            $entity_manager->persist($product);
            $entity_manager->flush();
        } catch (Exception $e) {
            return new JsonResponse(['status','error','message','Algo ha ido mal en persist']);

        }

        return new JsonResponse(['en','createProduct']);

    }

}