<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Application\Command\Owner\CreateOwnerCommand;
use MyApp\Application\CommandHandler\Owner\CreateOwnerCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\Domain\Exception\Owner\InvalidOwnerNameException;

// use MyApp\Bundle\ProductBundle\Owner\Repository\OwnerRepository;
use MyApp\Bundle\ProductBundle\Owner\Repository\MySQLOwnerRepository;

class CreateOwnerController extends Controller
{

    public function execute(Request $request): JsonResponse
    {

        $json = json_decode($request->getContent(), true);

        $createOwnerCommand = new CreateOwnerCommand((string)$json['name']);
        $entityManager = $this->getDoctrine()->getManager();

        $ownerRepostory = new MySQLOwnerRepository($entityManager);
        try {
            $createOwnerCommandHandler = new CreateOwnerCommandHandler($ownerRepostory);
            // $owner = $createOwnerCommandHandler->handle($createOwnerCommand);
            $createOwnerCommandHandler->handle($createOwnerCommand);

        } catch (InvalidOwnerNameException $e) {
            return new JsonResponse(
                ['error' => $e->getMessage()],
                400
            );
        }

        $entityManager->flush();

        return new JsonResponse(
            ['success' => 'Owner Created Correctly'],
            200
        );
    }

}