<?php

namespace MyApp\Bundle\ProductBundle\Controller;

use MyApp\Domain\Owner;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Domain\Exception\Owner\InvalidOwnerNameException;
use MyApp\Application\Command\Owner\CreateOwnerCommand;

class OwnerController extends Controller
{

    public function showAction()
    {
        $showOwnersCommandHandler = $this->get('myapp.command.handler.show.owners');
        $owners = $showOwnersCommandHandler->handle();

        $ownersAsArray = array_map(function (Owner $o) {
             return $this->ownerToArray($o);
        }, $owners);

        return new JsonResponse($ownersAsArray);
    }

    public function createAction(Request $request): JsonResponse
    {

        $json = json_decode($request->getContent(), true);

        $createOwnerCommand = new CreateOwnerCommand((string)$json['name']);
        $createOwnerCommandHandler = $this->get('myapp.command.handler.create.owner');

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

    private function ownerToArray(Owner $owner)
    {
        return [
            'id' => $owner->getId(),
            'name' => $owner->getName()
        ];
    }

}