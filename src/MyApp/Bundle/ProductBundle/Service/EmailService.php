<?php

namespace MyApp\Bundle\ProductBundle\Service;

use MyApp\Component\Product\Application\UseCase\Newproduct\ProductCreated;

class EmailService implements \MyApp\Component\Product\Application\Service\EmailService
{
    private $emailProvider;

    public function __construct($emailProvider)
    {
        $this->emailProvider = $emailProvider;
    }

    public function onProductCreated(ProductCreated $productCreatedEvent)
    {
        $this->sendEmailTo($productCreatedEvent->getProduct()->getOwner()->getName(), "a random content");
    }

    public function sendEmailTo(string $email, string $content)
    {
        echo "An email to $email has been sent with content: $content;\n";
    }
}