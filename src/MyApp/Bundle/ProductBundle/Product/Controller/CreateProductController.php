<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Domain\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController extends Controller
{

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];
        $ownerId = $json['ownerId'];

        $newProductUseCase = $this->get('app.product.usecase.newproduct');

        $newProductUseCase->execute($name, $price, $description, $ownerId);

        return new Response('', 201);

    }

}