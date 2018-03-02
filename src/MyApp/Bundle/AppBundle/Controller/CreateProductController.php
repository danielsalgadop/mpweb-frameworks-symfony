<?php

namespace MyApp\Bundle\AppBundle\Controller;


use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class CreateProductController extends Controller
{

    public function executeAction(Request $request)
    {

        var_dump($request->getContent());


        $json = json_decode($request->getContent(), true);
        var_dump($json);

        /*$name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];
*/
        $name = 'name';
        $price = 99;
        $description = 'description';


        $product = new Product("name", 4334, "descripition en controller");
        // $product = new Product((string)$name, (float)$price, (string)$description);

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();

        return new Response('', 201);

    }

}