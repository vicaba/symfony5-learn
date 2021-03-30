<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use LaSalle\Film\Domain\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function apply(Request $request): Response
    {
        $json = json_decode($request->getContent(), true);

        $name = $json["name"];
        $price = $json["price"];
        $description = $json["description"];
        $ownerId = $json["owner_id"];

        $owner = $this->em->getReference("\LaSalle\Film\Domain\Entity\Owner", $ownerId);

        $product = new Product($name, $price, $description, $owner);

        $this->em->persist($product);
        $this->em->flush();

        return new Response("", Response::HTTP_CREATED);
    }
}