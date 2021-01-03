<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductByIdController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function apply(Request $request, int $id): Response
    {
        $json = json_decode($request->getContent(), true);

        $product = $this->em->getRepository("\LaSalle\Film\Domain\Entity\Product")->findOneBy(["id" => $id]);

        var_dump($product);

        $product
            ->setName($json["name"])
            ->setPrice($json["price"])
            ->setDescription($json["description"]);

        $this->em->flush();

        return new Response("", Response::HTTP_NO_CONTENT);
    }
}