<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use Doctrine\ORM\Query;
use MyApp\Component\Product\Domain\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ListProductsController extends Controller
{

    public function execute()
    {

        $products = $this->getDoctrine()->getRepository('\MyApp\Component\Product\Domain\Product')->findAll(Query::HYDRATE_ARRAY);

        return $this->render("product/list.html.twig", ["products" => $products]);
    }
}