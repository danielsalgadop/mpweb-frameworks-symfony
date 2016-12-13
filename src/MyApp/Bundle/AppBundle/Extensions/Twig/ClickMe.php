<?php

namespace MyApp\Bundle\AppBundle\Extensions\Twig;

class ClickMe extends \Twig_Extension
{

    public function getFunctions()
    {
        return array(
            'clickMe'  => new \Twig_SimpleFunction('clickMe', array ($this, 'clickMe'))
        );
    }

    public function clickMe()
    {
        return 'clickMe!';
    }

    public function getName()
    {
        return 'clickMe';
    }

}