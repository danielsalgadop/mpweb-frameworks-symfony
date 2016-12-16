<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Bundle\AppBundle\Entity\Owner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOwnerController extends Controller
{

    public function executeAction(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $em = $this->getDoctrine()->getManager();

        $owner = new Owner((string)$json['name']);
        $em->persist($owner);
        $em->flush();

        return new Response('', 201);

    }

}