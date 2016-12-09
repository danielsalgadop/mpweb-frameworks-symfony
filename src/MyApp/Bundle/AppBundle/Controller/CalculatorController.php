<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController
{

    public function addAction($param1, $param2)
    {
        $calculator = new Calculator();
        return new Response((int)$calculator->add($param1, (int)$param2));
    }

}