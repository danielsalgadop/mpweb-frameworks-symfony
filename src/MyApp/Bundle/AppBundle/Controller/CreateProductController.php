<?php

namespace MyApp\Bundle\AppBundle\Controller;


use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController extends Controller
{

    public function executeAction(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];
        $ownerId = $json['ownerId'];

        $owner = $this->getDoctrine()->getRepository('\MyApp\Bundle\AppBundle\Entity\Owner')->findOneBy(['id' => $ownerId]);

        $product = new Product((string)$name, (float)$price, (string)$description, $owner);

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();

        return new Response('', 201);

    }

}