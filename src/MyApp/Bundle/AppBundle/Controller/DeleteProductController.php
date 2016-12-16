<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductController extends Controller
{

    public function executeAction($id)
    {
        $em = $this->getDoctrine()->getManager();

       $product = $em->getReference('\MyApp\Bundle\AppBundle\Entity\Product', $id);

       $em->remove($product);
       $em->flush();

       return new Response('', 200);
    }

}