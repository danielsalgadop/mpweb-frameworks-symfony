<?php

namespace MyApp\Bundle\ProductBundle\Command;


use MyApp\Component\Product\Application\UseCase\Newproduct\NewProductUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProductCommand extends Command
{

    private $newProductUseCase;

    public function __construct(NewProductUseCase $newProductUseCase, $name = null)
    {
        parent::__construct($name);
        $this->newProductUseCase = $newProductUseCase;
    }

    protected function configure()
    {
        $this
            ->setName("product:create")
            ->setDescription("Create a product")
            ->addArgument(
                "name"
                , InputArgument::REQUIRED
                , "The user name")
            ->addArgument(
                "price"
                , InputArgument::REQUIRED
                , "The product price"
            )->addArgument(
              "description",
                InputArgument::REQUIRED,
                "The product description"
            )->addArgument(
                "ownerId",
                InputArgument::REQUIRED,
                "The product owner id"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument("name");
        $price = $input->getArgument("price");
        $description = $input->getArgument("description");
        $ownerId = $input->getArgument("ownerId");
        $this->newProductUseCase->execute(
            $name,
            $price,
            $description,
            $ownerId
        );
        $output->writeln("Access granted.");
    }
}