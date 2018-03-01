<?php

namespace MyApp\Bundle\AppBundle\Controller;


use Doctrine\ORM\Query;
use MyApp\Bundle\AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
// use Doctrine\ORM\EntityManagerInterface;


class CreateProductController extends Controller
{
    public function executeAction()
    {
        $request = Request::createFromGlobals();
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $description = $request->request->get('description');

        // file_put_contents("/tmp/filelogs.log",print_r(date("Y-m-d_h:i:sa").__FILE__." ".__METHOD__." ".__LINE__." [$name]\n",true),FILE_APPEND);
        // file_put_contents("/tmp/filelogs.log",var_export($request,true),FILE_APPEND);
        // return new JsonResponse(['status','name '.$name]);

        $entity_manager  = $this->getDoctrine()->getManager();
        $product = new Product();
        // $product->setName = "name hardcoded";

        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);

        try {

            $entity_manager->persist($product);
            $entity_manager->flush();
        } catch (Exception $e) {
            return new JsonResponse(['status','error','message','Algo ha ido mal en persist']);

        }

        return new JsonResponse(['en','createProduct']);

/*        $product = $this->getDoctrine()
             ->getRepository(Product::class)
             ->findOneById($id);


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

*/



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