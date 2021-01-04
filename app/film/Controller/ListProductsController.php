<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use LaSalle\Film\Domain\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ListProductsController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function apply(): Response
    {
        $products = $this->em->getRepository("\LaSalle\Film\Domain\Entity\Product")->findAll();

        $serializedProducts = array_map(function (Product $p) {
            return $this->productToArray($p);
        }, $products);

        return new JsonResponse($serializedProducts);
    }

    private function productToArray(Product $product): array
    {
        return [
            "id" => $product->id(),
            "name" => $product->name(),
            "price" => $product->price(),
            "description" => $product->description(),
            "owner_id" => $product->owner()->id(),
            "owner_name" => $product->owner()->name()
        ];
    }
}