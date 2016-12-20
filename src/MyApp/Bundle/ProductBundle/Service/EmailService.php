<?php

namespace MyApp\Bundle\ProductBundle\Service;

class EmailService implements \MyApp\Component\Product\Application\Service\EmailService
{
    private $emailProvider;

    public function __construct($emailProvider)
    {
        $this->emailProvider = $emailProvider;
    }

    public function sendEmailTo(string $email, string $content)
    {
        echo "An email to $email has been sent with content: $content;\n";
    }
}