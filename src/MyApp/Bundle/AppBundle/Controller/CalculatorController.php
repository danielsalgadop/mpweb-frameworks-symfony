<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('calculator/index.html.twig');
    }

    public function addAction(Request $request)
    {
        $param1 = $request->request->get('param1', 0);
        $param2 = $request->request->get('param2', 0);
        $calculator = new Calculator();
        return new Response((int)$calculator->add($param1, (int)$param2));
    }

}