<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use LaSalle\Film\Domain\Entity\Owner;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ListOwnersController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function apply(): Response
    {
        $products = $this->em->getRepository("\LaSalle\Film\Domain\Entity\Owner")->findAll();

        $serializedProducts = array_map(function (Owner $p) {
            return $this->ownerToArray($p);
        }, $products);

        return new JsonResponse($serializedProducts);
    }

    private function ownerToArray(Owner $owner): array
    {
        return [
            "id" => $owner->id(),
            "name" => $owner->name(),
        ];
    }
}