<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Application\Command\Owner\CreateOwnerCommand;
use MyApp\Application\CommandHandler\Owner\CreateOwnerCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\Domain\Exception\Owner\InvalidOwnerNameException;

use MyApp\Bundle\ProductBundle\Owner\Repository\MySQLOwnerRepository;

class CreateOwnerController extends Controller
{

    public function execute(Request $request): JsonResponse
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