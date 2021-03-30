<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use LaSalle\Film\Domain\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ListProductsGuiController
{
    public function __construct(
        private EntityManagerInterface $em,
        private Environment $twig
    ) {}

    public function apply(): Response
    {
        $products = $this->em->getRepository("\LaSalle\Film\Domain\Entity\Product")->findAll();

        $html = $this->twig->render("list_products.html.twig", ["products" => $products]);

        $response = new Response();
        $response->headers->add(["Content-Type" => "text/html"]);
        $response->setContent($html);

        return $response;
    }
}