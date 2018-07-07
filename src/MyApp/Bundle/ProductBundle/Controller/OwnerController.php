<?php

namespace MyApp\Bundle\ProductBundle\Controller;

use MyApp\Domain\Owner;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Domain\Exception\Owner\InvalidOwnerNameException;
use MyApp\Application\Command\Owner\CreateOwnerCommand;
use MyApp\Bundle\ProductBundle\Owner\Repository\MySQLOwnerRepository;

class OwnerController extends Controller
{

    public function showAction()
    {
        $owners = $this->getDoctrine()->getRepository('\MyApp\Domain\Owner')->findAll(Query::HYDRATE_ARRAY);

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

    public function createAction(Request $request): JsonResponse
    {

        $json = json_decode($request->getContent(), true);

        $createOwnerCommand = new CreateOwnerCommand((string)$json['name']);
        $createOwnerCommandHandler = $this->get('myapp.command.handler.create.user');

        try {
            $createOwnerCommandHandler->handle($createOwnerCommand);
            $this->get('doctrine.orm.default_entity_manager')->flush();

        } catch (InvalidOwnerNameException $e) {
            return new JsonResponse(
                ['error' => $e->getMessage()],
                400
            );
        }
        return new JsonResponse(
            ['success' => 'Owner Created Correctly'],
            200
        );
    }



}