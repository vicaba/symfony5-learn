<?php
declare(strict_types=1);

namespace LaSalle\App\Film\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductByIdController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function apply(int $id): Response
    {
        $product = $this->em->getReference("\LaSalle\Film\Domain\Entity\Product", $id);

        $this->em->remove($product);
        $this->em->flush();

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}