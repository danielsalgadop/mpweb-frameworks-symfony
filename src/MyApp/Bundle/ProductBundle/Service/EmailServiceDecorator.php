<?php

namespace MyApp\Bundle\ProductBundle\Service;


use MyApp\Component\Product\Application\Service\EmailService;
use MyApp\Component\Product\Application\UseCase\Newproduct\ProductCreated;

class EmailServiceDecorator implements EmailService
{

    private $decoratedEmailService;

    public function __construct(EmailService $decoratedEmailService)
    {
        $this->decoratedEmailService = $decoratedEmailService;
    }

    public function onProductCreated(ProductCreated $productCreatedEvent)
    {
        $this->sendEmailTo($productCreatedEvent->getProduct()->getOwner()->getName(), "a random content");
    }

    public function sendEmailTo(string $email, string $content)
    {
        echo "Decorated email Service says:<br>";
        $this->decoratedEmailService->sendEmailTo($email, $content);
        echo "Decorator email service says:<br>";
        echo "An email to $email has been sent!!<br>";
    }
}