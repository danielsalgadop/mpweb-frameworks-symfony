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
        $owners = $this->getDoctrine()->getRepository('\MyApp\Bundle\AppBundle\Entity\Owner')->findAll(Query::HYDRATE_ARRAY);

        $ownersAsArray = array_map(function (Owner $o) {
             return $this->ownerToArray($o);
        }, $owners);

        return new JsonResponse($ownersAsArray);
    }

    private function ownerToArray(Owner $owner)
    {
        return [
            'id' => $owner->getId(),
            'name' => $owner->getName()
        ];
    }

}