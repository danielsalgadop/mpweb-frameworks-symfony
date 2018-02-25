<?php
namespace MyApp\Component\Validator;

class Validator
{

    public function areNumbers(array $arr_param){
        foreach ($arr_param as $value) {
        if (! filter_var($value, FILTER_VALIDATE_INT)) {
                return false;
            }
        }
        return true;
    }
}