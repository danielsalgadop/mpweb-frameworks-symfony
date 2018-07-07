<?php

namespace MyApp\Bundle\ProductBundle\Controller;

use MyApp\Domain\Product;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Application\Command\Product\CreateProductCommand;
use MyApp\Application\Command\Product\UpdateProductCommand;

use \Exception;

class ProductController extends Controller
{

    public function showAction()
    {
        $showProductsCommandHandler = $this->get('myapp.command.handler.show.products');
        $products = $showProductsCommandHandler->handle();

        $productsAsArray = array_map(function (Product $p) {
            return $this->productToArray($p);
        }, $products);

        return new JsonResponse($productsAsArray);
    }

    public function createAction(Request $request): JsonResponse
    {

        $json = json_decode($request->getContent(), true);

        $createProductCommand = new CreateProductCommand((string)$json['name'],(float)$json['price'],(string)$json['description'],(int)$json['ownerId'] );

        $createProductCommandHandler = $this->get('myapp.command.handler.create.product');

        try {
            $createProductCommandHandler->handle($createProductCommand);
            $this->get('doctrine.orm.default_entity_manager')->flush();
        } catch (Exception $e) {
            return new JsonResponse(
                ['error' => $e->getMessage()],
                400
            );
        }
        return new JsonResponse(
            ['success' => 'Product Created Correctly'],
            200
        );
    }

    public function updateAction(Request $request, $id)
    {

        $json = json_decode($request->getContent(), true);

        $updateProductCommand = new UpdateProductCommand((string)$json['name'],(float)$json['price'],(string)$json['description'] );
        $updateProductCommandHandler = $this->get('myapp.command.handler.update.product');

        try{
            $updateProductCommandHandler->handle($updateProductCommand, $id);
            $this->get('doctrine.orm.default_entity_manager')->flush();
        } catch (Exception $e) {
            return new JsonResponse(
                ['error' => $e->getMessage()],
                400
            );
        }

        // $product = $this->getDoctrine()->getRepository('\MyApp\Domain\Product')->findOneBy(['id' => $id]);

        // $product->setName($json['name']);
        // $product->setPrice($json['price']);
        // $product->setDescription($json['description']);

        // $em = $this->getDoctrine()->getManager();
        // $em->flush();

        return new JsonResponse(
            ['success' => 'Product Updated Correctly'],
            200
        );
    }

    private function productToArray(Product $product)
    {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription(),
            'ownerId' => $product->getOwner()->getId()
        ];
    }

}