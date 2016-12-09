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
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/{param}/", name="param_homepage")
     */
    public function paramAction(string $param, Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => $param,
        ]);
    }

    /**
     * @Route("/{param}/", name="constraint", requirements={"param": "\d+"})
     */
    public function paramConstraintAction(string $param, Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => "constraint, value: $param",
        ]);
    }

}
