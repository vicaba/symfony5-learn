<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use LaSalle\Film\Domain\Entity\Owner;
use LaSalle\Film\Domain\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOwnerController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function apply(Request $request): Response
    {
        $json = json_decode($request->getContent(), true);

        $name = $json["name"];

        $owner = new Owner($name);

        $this->em->persist($owner);
        $this->em->flush();

        return new Response("", Response::HTTP_CREATED);
    }
}