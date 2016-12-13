<?php

namespace MyApp\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class XmlController extends Controller
{

    public function indexAction()
    {

        $response = $this->render('xml/xml.twig', [
            'message' => "Hi!"
        ]);
        $response->headers->set('Content-type', 'application/xml; charset=utf-8');
        return $response;
    }

}