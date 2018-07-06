<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MyApp\Application\Command\Owner\CreateOwnerCommand;
use MyApp\Application\CommandHandler\Owner\CreateOwnerCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use MyApp\Bundle\ProductBundle\Owner\Repository\OwnerRepository;

class CreateOwnerController extends Controller
{

    public function execute(Request $request): Response
    {

        $json = json_decode($request->getContent(), true);

        $createOwnerCommand = new CreateOwnerCommand((string)$json['name']);
        $entityManager = $this->getDoctrine()->getManager();


        // $ownerRepostory = new OwnerRepository;
        $createOwnerCommandHandler = new CreateOwnerCommandHandler($entityManager);
        $createOwnerCommandHandler->handle($createOwnerCommand);
        file_put_contents("/home/dsalgado/mylogs/filelogs.log",__METHOD__.' '.__LINE__."\n",FILE_APPEND);
        return new Response('', 201);


    }

}