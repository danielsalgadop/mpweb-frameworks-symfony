<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Doctrine\ORM\Query;
use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteProductController extends Controller
{
    public function executeAction($id)
    {
        $product = $this->getDoctrine()
             ->getRepository(Product::class)
             ->findOneById($id);

        $entity_manager  = $this->getDoctrine()->getManager();

        // $product = $entity_manager
             // ->getReference('\MyApp\Bundle\AppBundle\Entity\Product',$id);
        // $product = $entity_manager->findOneById($id);
             // file_put_contents("/home/dan/filelogs.log",var_export($product,true),FILE_APPEND);



   if (!$product) {
        return new JsonResponse(['status','error','message','product not found']);

        // throw $this->createNotFoundException(
        //     'No product found for id '.$productId
        // );
    }


        $entity_manager->remove($product);
        $entity_manager->flush();
        return new JsonResponse(['dani','crack']);





        /*$products = $this->getDoctrine()->getRepository('\MyApp\Bundle\AppBundle\Entity\Product')->findAll(Query::HYDRATE_ARRAY);

        $productsAsArray = array_map(function (Product $p) {
            return $this->productToArray($p);
        }, $products);

        return new JsonResponse($productsAsArray);*/
    }

/*    private function productToArray(Product $product)
    {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];
    }
*/

}