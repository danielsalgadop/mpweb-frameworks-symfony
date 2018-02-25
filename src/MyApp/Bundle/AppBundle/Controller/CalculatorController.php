<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use MyApp\Component\Validator\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;


use Symfony\Component\HttpFoundation\Response;

class CalculatorController
{
    var $calc = null;
    var $validator = null;
    # public function __construct($param1=0,$param2=0)  # asi no llegan los parametros. Debe ser que symfony instancia esto sin los valores que llegan en la request
    public function __construct()
    {
        $this->calc = new Calculator();
        $this->validator = new Validator();
    }

    public function addAction($param1,$param2)
    {
        if($this->validator->areNumbers(func_get_args())){
            return new Response((int)$this->calc->add($param1,$param2));
        }
        return new Response(new HttpException(406,"parametros no validos"));
    }
}