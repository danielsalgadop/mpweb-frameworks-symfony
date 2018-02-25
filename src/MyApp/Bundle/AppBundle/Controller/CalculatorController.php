<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use MyApp\Component\Validator\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CalculatorController
{
    var $calc = null;
    var $validator = null;
    var $request = null;
    # public function __construct($param1=0,$param2=0)  # asi no llegan los parametros. Debe ser que symfony instancia esto sin los valores que llegan en la request
    public function __construct()
    {
        $this->calc = new Calculator;
        $this->validator = new Validator;
        // $this->request = new Request;
        $this->request = Request::createFromGlobals();
    }

    public function addAction($param1,$param2)
    {
        if($this->validator->areNumbers(func_get_args())){
            return new Response((int)$this->calc->add($param1,$param2));
        }
        return new Response(new HttpException(406,"parametros no validos"));
    }

    public function substractAction()
    {
        $param1 = $this->request->get('param1');
        $param2 = $this->request->get('param2');
        if($this->validator->areNumbers([$param1,$param2])){
            return new Response((int)$this->calc->substract($param1,$param2));
        }
        return new Response(new HttpException(406,"parametros no validos"));
    }

    public function timesAction($param1,$param2)
    {
        $param2 = $param2 = $this->request->query->get('param2');
        if($this->validator->areNumbers([$param1,$param2])){
            return new Response((int)$this->calc->times($param1,$param2));
        }
        return new Response(new HttpException(406,"parametros no validos"));
    }
}