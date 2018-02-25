<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController
{
    var $calc = null;
    # public function __construct($param1=0,$param2=0)  # asi no llegan los parametros. Debe ser que symfony instancia esto sin los valores que llegan en la request
    public function __construct()
    {
        $this->calc = new Calculator();
    }

    public function addAction($param1,$param2)
    {
        #$calculator = new Calculator($param1, $param2);
        return new Response((int)$this->calc->add($param1,$param2));
    }

}