<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class RoutingTestController
{

    public function __construct(private Environment $twig)
    {}

    //#[Route("/{parameter}/", name: "constraint", requirements: ["parameter" => "\d+"])]
    public function parameterConstraint(string $parameter): Response
    {
        $html = $this->twig->render("routing_test.html.twig", [
            "variable" => "constraint route, param value: $parameter"
        ]);

        $response = new Response();
        $response->setContent($html);

        return $response;
    }

    //#[Route("/{parameter}/", name: "parameter")]
    public function parameter(string $parameter): Response
    {
        $html = $this->twig->render("routing_test.html.twig", [
            "variable" => "parameter route (no-constraint), param value: $parameter"
        ]);

        $response = new Response();
        $response->setContent($html);

        return $response;
    }

}