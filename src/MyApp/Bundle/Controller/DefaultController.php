<?php

namespace MyApp\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => 'MyApp '. realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/{param}/", name="param_homepage")
     */
    public function paramAction(string $param, Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => 'MyApp '. $param,
        ]);
    }

    /**
     * @Route("/{param}/", name="constraint", requirements={"param": "\d+"})
     */
    public function paramConstraintAction(string $param, Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => 'MyApp '. "constraint, value: $param",
        ]);
    }

    public function requestQuerystringAction(Request $request) {
        return new Response($request->query->get('id'));
    }

    public function requestPostAction(Request $request) {
        return new Response($request->request->get('id'));
    }

}
