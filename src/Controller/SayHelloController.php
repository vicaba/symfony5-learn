<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class SayHelloController
{

    public function __construct(private Environment $twig)
    {}

    public function index(): Response
    {
        $html = $this->twig->render("say_hello.html.twig");

        $response = new Response();
        $response->setContent($html);

        return $response;
    }

}