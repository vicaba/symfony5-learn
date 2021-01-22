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
        $owners = $this->em->getRepository("\LaSalle\Film\Domain\Entity\Owner")->findAll();

        $serializedOwners = array_map(function (Owner $o) {
            return $this->ownerToArray($o);
        }, $owners);

        return new JsonResponse($serializedOwners);
    }

    private function ownerToArray(Owner $owner): array
    {
        return [
            "id" => $owner->id(),
            "name" => $owner->name(),
        ];
    }
}