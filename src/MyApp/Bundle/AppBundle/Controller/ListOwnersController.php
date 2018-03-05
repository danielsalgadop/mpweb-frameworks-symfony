<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Doctrine\ORM\Query;
use MyApp\Bundle\AppBundle\Entity\Owner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListOwnersController extends Controller
{

    public function executeAction()
    {
        $owner = $this->getDoctrine()->getRepository('\MyApp\Bundle\AppBundle\Entity\Owner')->findAll(Query::HYDRATE_ARRAY);

        $ownerAsArray = array_map(function (Owner $o) {
            return $this->productToArray($o);
        }, $owner);

        return new JsonResponse($ownerAsArray);
    }

    private function productToArray(Product $product)
    {
        return [
            'name' => $product->getName(),
        ];
    }

}