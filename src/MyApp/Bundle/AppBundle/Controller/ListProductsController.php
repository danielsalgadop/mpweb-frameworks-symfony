<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Doctrine\ORM\Query;
use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListProductsController extends Controller
{

    public function executeAction()
    {
        $products = $this->getDoctrine()->getRepository('\MyApp\Bundle\AppBundle\Entity\Product')->findAll(Query::HYDRATE_ARRAY);

        $productsAsArray = array_map(function (Product $p) {
            return $this->productToArray($p);
        }, $products);

        return new JsonResponse($productsAsArray);
    }

    private function productToArray(Product $product)
    {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];
    }

}